<?php

declare(strict_types=1);

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\CheckTenantForMaintenanceMode;
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

    Route::middleware(
        CheckTenantForMaintenanceMode::class
    )->group(function () {
        
        Route::get('/search', [SiteController::class, 'search'])->name('searchPage');

        Route::get('/', [SiteController::class, 'index'])->name('homePage');
        Route::get('/contact', [SiteController::class, 'contactPage'])->name('contactPage');
        Route::get('/about', [SiteController::class, 'aboutPage'])->name('aboutPage');
        Route::get('/term', [SiteController::class, 'termPage'])->name('termPage');
        

        Route::get('/category/{category}', [SiteController::class, 'category'])->name('categoryPage');

        
        Route::get('/product/{product}', [SiteController::class, 'product'])->name('productPage');
    });



    require __DIR__ . '/auth.php';
    require __DIR__ . '/guest.php';
});
