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

use App\Spotify\Client;

Route::get('/', 'FeedController@index');
Route::name('profile')->get('/profile', 'UserController@show')->middleware('auth');
Route::name('user')->get('/@{user}', 'UserController@show');
Route::name('user.follow')->post('@{user}/follow', 'FollowController@create');
Route::name('user.unfollow')->delete('@{user}/unfollow', 'FollowController@destroy');

Route::name('login')->get('login', 'AuthController@redirect');
Route::name('logout')->post('logout', 'AuthController@logout');
Route::name('spotify.callback')->get('spotify/callback', 'AuthController@callback');
