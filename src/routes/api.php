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

Route::prefix('auth')->namespace('Api\Auth')->group(function(){

	Route::post('register', 'RegisterController@register')->name('register');
	
	Route::post('login', 'LoginController@login')->name('login');

	Route::post('logout', 'LogoutController@logout')->name('logout')->middleware(['auth:api']);

	Route::post('send-verification-code', 'PasswordController@sendVerificationCode')->name('send-verification-code');

	Route::post('reset-password', 'PasswordController@resetPassword')->name('reset-password');

	Route::post('change-password', 'PasswordController@changePassword')->name('change-password')->middleware(['auth:api']);
});

Route::middleware(['auth:api'])
->namespace('Api')
->group(function () {

	Route::apiResources([
		'brands'		=> 'BrandController',
		'products'		=> 'ProductController',
	]);

	Route::apiResource('users', 'UserController')->except(['store', 'update']);
});
