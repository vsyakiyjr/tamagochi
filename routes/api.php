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

Route::post('/tamagochi_registration', 'UserController@tamagochi_registration');
Route::post('/tamagochi_progress', 'UserController@tamagochi_progress');
Route::post('/tamagochi_action', 'UserController@tamagochi_action');