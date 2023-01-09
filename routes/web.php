<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\LoginController::class, 'index'])->name('home');
Route::get('/', 'App\Http\Controllers\MainController@index');
Route::get('/bai-viet/{id}', 'App\Http\Controllers\Api\v1\BaivietController@show');
