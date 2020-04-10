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
Auth::routes();

Route::get('/', 'WorkController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/userprofile', 'UserProfileController@index')->name('userprofile')->middleware('auth');
    Route::get('/userprofile/create/work', 'WorkController@create')->name('work.create');
    Route::get('/userprofile/remove/work/id/{id}', 'WorkController@destroy')->name('work.remove');
    Route::get('/userprofile/show/work/id/{id}', 'WorkController@show')->name('work.show');
    Route::get('/userprofile/edit/work/id/{id}', 'WorkController@edit')->name('work.edit');
    Route::post('/userprofile/update/work/id/{id}', 'WorkController@update')->name('work.update');
    Route::post('/userprofile/store/work', 'WorkController@store')->name('work.store');

    Route::get('/userprofile/work/remove/image/id/{id}', 'ImageController@destroy')->name('image.remove');

    Route::post('/save/comment','CommentController@store')->name('comment.store');
    Route::post('/edit/comment/{id}','CommentController@update')->name('comment.edit');
    Route::get('/remove/comment/{id}','CommentController@destroy')->name('comment.remove');

    Route::post('/assessment','WorkController@assessment')->name('work.assessment');


});
