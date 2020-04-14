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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/home','Dashboard\Api\Stats\StatsController@index');
Route::get('/users','Dashboard\Api\Users\UserController@index');

//Route::post('/users/update','Dashboard\Api\Users\UserController@update');
//Route::post('/users/update','Dashboard\Api\Users\UserController@update');

Route::get('/works','Dashboard\Api\Works\WorkController@index');
Route::get('/images','Dashboard\Api\Images\ImageController@index');
Route::get('/comments','Dashboard\Api\Comments\CommentController@index');
Route::get('/comments/del/{id}','Dashboard\Api\Comments\CommentController@destroy');
Route::get('/works/del/{id}','Dashboard\Api\Works\WorkController@destroy');
Route::get('/images/del/{id}','Dashboard\Api\Images\ImageController@destroy');
