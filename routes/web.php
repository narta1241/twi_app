<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tweets', 'TweetController')->middleware('auth');
Route::resource('favorites', 'FavoriteController')->middleware('auth');
Route::resource('users', 'UserController')->middleware('auth');
Route::get("followers/{pattern}", 'FollowerController@index')->middleware('auth');
Route::resource('followers', 'FollowerController')->middleware('auth');
Route::resource('comments', 'CommentController')->middleware('auth');
Route::resource('timeline', 'TimelineController')->middleware('auth');
Route::resource('retweet', 'RetweetController')->middleware('auth');

if (env('APP_ENV') === 'local') {
    URL::forceScheme('https');
 } 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

