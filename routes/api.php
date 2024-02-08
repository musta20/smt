<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/isDomainAvilable/{domain}', function (Request $request) {
    $domain = DB::table('domains')->where('name', $request->domain)->first();
    if (!$domain) {
        return response()->json('the domain name is available', 200);
    }
    return response()->json('domain is already taken', 404);
});
