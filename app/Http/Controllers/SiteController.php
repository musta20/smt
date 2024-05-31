<?php

namespace App\Http\Controllers;

use App\Enums\Identity\Role as IdentityRole;
use App\Enums\Store\Status;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class SiteController extends Controller
{
    public function index()
    {
        $setting = Setting::where('tenant_id', tenant('id'))->get();
        $product = Product::where('status', Status::PUBLISHED->value)->latest()->take(50)->get();
        $visibleRecored = $setting->where('key', 'visibility')->first();
        $visible = json_decode($visibleRecored->value);
        $CarouselImage = (array) json_decode($setting->where('key', 'CarouselImage')->first()->value);

        return themeView('index', [
            'visible' => $visible,
            'products' => $product,
            'CarouselImage' => $CarouselImage,
        ]);
    }

    public function setLocale(Request $request)
    {
        $locale = $request->locale;

        if (in_array($locale, config('app.available_locales'))) {

            session()->put('locale', $locale);

        }

        return redirect()->back();
    }

    public function profile()
    {
        $user = Auth::user();
        if ($user->hasRole(IdentityRole::VENDER->value)) {
            return Redirect::Route('admin.profile.update');
        }

        return themeView('profile', ['user' => $user]);
    }

    public function termPage()
    {

        return themeView('term');
    }

    public function search(Request $request)
    {
        return themeView('search', ['search' => $request->search]);
    }

    public function contactPage()
    {
        return themeView('contact');
    }

    public function aboutPage()
    {
        return themeView('about');
    }

    public function showRegister(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return themeView('auth.customerRegister');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tenant_id' => tenant('id'),
            'password' => Hash::make($request->password),
        ]);
        $customerRole = Role::findByName(IdentityRole::CUSTOMER->value);

        $user->assignRole($customerRole);

        event(new Registered($user));
        Auth::login($user);

        return redirect('/');
    }

    public function category(Category $category)
    {
        $category->products = $category->products->where('status', Status::PUBLISHED->value);

        return themeView('category', [
            'category' => $category,
        ]);
    }

    public function product(Product $product)
    {

        if ($product->status != Status::PUBLISHED->value) {
            return abort(404);
        }

        $recomendedProduct = Product::where('status', Status::PUBLISHED->value)->latest()->take(5)->get();

        $allRating = [
            5 => count($product->comment->where('rating', 5)),
            4 => count($product->comment->where('rating', 4)),
            3 => count($product->comment->where('rating', 3)),
            2 => count($product->comment->where('rating', 2)),
            1 => count($product->comment->where('rating', 1)),
        ];

        $totalRating = 0;
        $product->visible = json_decode($product->visible);

        if (array_sum($allRating) > 0) {

            $r = array_map(function ($n, $i) {
                return $n * $i;
            }, $allRating, array_keys($allRating));

            $totalRating = array_sum($r) / array_sum($allRating);
        }

        return themeView('product', [
            'product' => $product,
            'totalRating' => $totalRating,
            'allRating' => $allRating,
            'recomendedProduct' => $recomendedProduct,
        ]);
    }
}
