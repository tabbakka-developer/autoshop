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

Route::group(['middleware' => ['api'], 'namespace' => 'Api'], function () {
    Route::prefix('auth')->group(function () {
        Route::post('registration', "AuthController@registration");
        Route::post('login', "AuthController@login");
        Route::middleware(['auth:api'])->group(function () {
            Route::get('me', "AuthController@me");
            Route::post('logout', "AuthController@logout");
        });
    });

    Route::prefix('cars-data')->group(function () {
        Route::get('makers', "CarMakersController@index");
    });

    Route::prefix('ads')->group(function () {
        Route::get('/', "AdsController@list");
    });
});

