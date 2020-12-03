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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {


    Route::post('user/register', 'UserController@store');
    Route::post('user/login', 'AuthController@login');

    // Route::post('nurse/register', 'NurseController@store');
    // Route::post('nurse/login', 'NurseAuthController@login');

    Route::post('get/profile', 'UserController@getProfile');
    Route::post('get/nurse/profile', 'UserController@getProfile');


    Route::post('all/categories', 'CategoryController@show');

    Route::group(['middleware' => 'auth:api'], function () {

        Route::post('auth/profile', 'UserController@authProfile');
        Route::post('add/favorite', 'UserController@addFavorite');
        Route::post('get/favorites', 'UserController@getFavorite');
        Route::post('nurse/rating', 'UserController@nurse_rating');



        Route::post('nurse/update', 'UserController@updateNurse');

        Route::post('user/update', 'UserController@updateUser');
        Route::post('fetch/jobs', 'JobController@fetch_jobs');
        Route::post('apply/request', 'ApplyController@apply');

        Route::post('job/store', 'JobController@store');
        Route::post('job/destroy', 'JobController@destroy');
        Route::post('job/update', 'JobController@update');

        Route::post('nearby/nurse', 'LocationController@nearbyNurses');
        Route::post('nearby/hospital', 'LocationController@nearbyHospitals');


        Route::post('hire/request', 'HireController@request');


        Route::post('chat/index', 'User\ChatController@index');
        Route::post('message/index', 'User\MessageController@index');
        Route::post('message/send', 'User\MessageController@store');
        Route::post('chat/delete', 'User\ChatController@delete');
    });
});
