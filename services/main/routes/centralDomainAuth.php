<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);
});

//tenant/login
//tenant/admin
//tenant/logout
//tenant/restpass
//tenant/send_email_pass
//tenant/verfiy_email
//maindomain/register
