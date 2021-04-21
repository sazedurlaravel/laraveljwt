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
    Route::get('/index','App\Http\Controllers\UserController@index');
    Route::post('register', 'App\Http\Controllers\UserController@register');
    Route::post('login', 'App\Http\Controllers\UserController@authenticate');
    Route::get('open', 'App\Http\Controllers\DataController@open');

    Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::get('closed', 'App\Http\Controllers\DataController@closed');
    });
