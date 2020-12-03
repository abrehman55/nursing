<?php

use Illuminate\Support\Facades\Route;

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

Route::view('login', 'login')->name('login');
Route::post('login', 'App\Http\Controllers\AuthController@login')->name('login');


Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth:admin'], function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::resource('nurse', 'Admin\NurseController');
    Route::get('logout', 'AuthController@logout')->name('logout');
});