<?php

use App\Http\Controllers\centralDomainController;
use App\Http\Middleware\LocaleMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware([LocaleMiddleware::class])->group(function () {

Route::get('/',[centralDomainController::class, 'welcome'] );
Route::get('setLocale/{locale}',[centralDomainController::class, 'setLocale'])->name('setLocale');


 require __DIR__.'/centralDomainAuth.php';
});