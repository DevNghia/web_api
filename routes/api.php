<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::resource('/User', 'App\Http\Controllers\Api\v1\UserController')->only(['index']);
    Route::resource('/category', 'App\Http\Controllers\Api\v1\CategoryPostController');
});
Route::prefix('v2')->group(function () {
    // Route::resource('User', 'App\Http\Controllers\Api\v2\UserController')->only(['show']);
    Route::get('/User', 'App\Http\Controllers\Api\v2\UserController@show');
});