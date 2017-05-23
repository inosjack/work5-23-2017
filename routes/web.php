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


Route::get('/login', 'AdminLoginController@showLoginForm')->name('login');

Route::get('/logout', 'AdminLoginController@logout')->name('logout');

Route::get('/', 'AdminLoginController@showLoginForm');

Route::post('/login', 'AdminLoginController@authenticate')->name('post.login');

Route::get('/home', 'HomeController@index')->name('home');


//Music

//upload music
Route::post('/bhajan/audio/upload', 'AudioBhajanController@upload')->name('audio.bhajan.upload');


Route::get('/bhajan/audio', 'AudioBhajanController@index')->name('audio.bhajan');
Route::get('/bhajan/audio/ajax', 'AudioBhajanController@ajax')->name('audio.bhajan.ajax');
