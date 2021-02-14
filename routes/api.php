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
    Route::post('user/verify', 'UserController@verify');


    // Route::post('nurse/register', 'NurseController@store');
    // Route::post('nurse/login', 'NurseAuthController@login');

    Route::post('get/profile', 'UserController@getProfile');
    Route::post('get/nurse/profile', 'UserController@getProfile');


    Route::post('all/categories', 'CategoryController@show');

    Route::post('get/stripe/keys', 'StripeController@getkey');

    Route::group(['middleware' => 'auth:api'], function () {

        Route::post('auth/profile', 'UserController@authProfile');
        Route::post('add/favorite', 'UserController@addFavorite');
        Route::post('get/favorites', 'UserController@getFavorite');
        Route::post('nurse/rating', 'UserController@nurse_rating');

        Route::post('enter/balance', 'UserController@update_amount');



        Route::post('nurse/update', 'UserController@updateNurse');

        Route::post('user/update', 'UserController@updateUser');
        Route::post('fetch/jobs', 'JobController@fetch_jobs');//All jobs
        Route::post('apply/request', 'ApplyController@apply');

        Route::post('job/store', 'JobController@store');
        Route::post('job/destroy', 'JobController@destroy');
        Route::post('job/update', 'JobController@update');

        Route::post('job/details', 'JobController@details');

        Route::post('nearby/nurse', 'LocationController@nearbyNurses');
        Route::post('nearby/hospital', 'LocationController@nearbyHospitals');
        
        Route::post('jobs', 'JobController@jobs');//Auth User jobs
        Route::post('closed/jobs','JobController@userClosedJobs'); //Auth user cloased jobs

        Route::post('user/jobs', 'JobController@userJobs');//Any User jobs
        Route::post('closed/jobs','JobController@userClosedJobs');


        Route::post('hire/request', 'HireController@request');
        Route::post('hire/request/accept', 'HireController@acceptRequest');
        Route::post('hire/now', 'HireController@now');
        Route::post('hire/complete', 'HireController@complete');
        Route::post('hire/reject', 'HireController@reject');

        Route::post('chat/index', 'User\ChatController@index');
        Route::post('message/index', 'User\MessageController@index');
        Route::post('message/send', 'User\MessageController@store');
        Route::post('chat/delete', 'User\ChatController@delete');

        Route::post('hospital/card/credential','UserController@hospital_card');
        Route::post('nurse/card/credential','UserController@nurse_card');

        Route::post('get/wallet/','UserController@getWalet');

        Route::post('reject/request','HireController@RejectHireRequest');
    });
});
