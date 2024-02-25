<?php

declare(strict_types=1);

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

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

    Route::get('/',[SiteController::class,'index'])->name('homePage');
    Route::get('/product/{product}',[SiteController::class,'product'])->name('productPage');


    require __DIR__ . '/auth.php';
    require __DIR__ . '/guest.php';
});
