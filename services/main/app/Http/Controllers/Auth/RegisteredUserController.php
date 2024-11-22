<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Identity\Role;
use App\Http\Controllers\Controller;
use App\Models\Role as ModelsRole;
use App\Models\Tenant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return themeView('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'domain' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $tenant = Tenant::create();

        $tenant->domains()->create([
            'domain' => $request->domain . '.' . config('app.domain'),
            'name' => $request->domain,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tenant_id' => $tenant->id,
            'password' => Hash::make($request->password),
        ]);

        $vernderRole = ModelsRole::findByName(Role::VENDER->value);

        $user->assignRole($vernderRole);

        event(new Registered($user));

        return redirect()->route(RouteServiceProvider::LOGIN)->domain($tenant->domain->domain);

    }
}
