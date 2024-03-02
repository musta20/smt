<?php

use App\Enums\Identity\Role;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\productController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::middleware(
    'auth'
)->group(function () {

    Route::resource('/comment', CommentController::class);

    Route::get('/profile', [SiteController::class, 'profile'])->name('profilePage');

    Route::group(['middleware' => ['role:'.Role::VENDER->value],'prefix' => '/admin', 'as' => 'admin.'], function () {


        Route::get('/',adminController::class)->name('dashboard');

        Route::resource('/setting', SettingController::class);
        Route::resource('/custmer', CustomerController::class);


        Route::resource('/setting', SettingController::class);
        Route::put('/updateSetting', [SettingController::class,'updateSetting'])->name('setting.updateSetting');

        
        Route::resource('/store', StoreController::class);
        Route::resource('/product', productController::class);
        Route::resource('/category', CategoryController::class);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
