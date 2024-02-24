<?php

declare(strict_types=1);

use App\Http\Middleware\SetThemeForTenant;
use Facades\App\CurrentTheme;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Middleware\ScopeSessions;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    //    Livewire::setUpdateRoute(function ($handle) {
    //     return Route::post('/maintenant/livewire/update', $handle);
    // });


    Route::get('/', function () {
        //config(['view.paths'=>[resource_path('newTheme')]]);
        //dd(config('view.paths'));
        return view('index');
    })->middleware(SetThemeForTenant::class);
 

    require __DIR__.'/auth.php';
    require __DIR__.'/guest.php';


    // Route::get('/', function () {
    //     return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    // });

});
