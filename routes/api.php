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
Route::get('/home','Dashboard\Api\Stats\StatsController@index');
Route::get('/users','Dashboard\Api\Users\UserController@index');
Route::get('/users','Dashboard\Api\Users\UserController@index');
Route::get('/works','Dashboard\Api\Works\WorkController@index');
Route::get('/images','Dashboard\Api\Images\ImageController@index');
Route::get('/comments','Dashboard\Api\Comments\CommentController@index');