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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/auth/google', 'Auth\LoginController@auth_google')->name('auth.google');
Route::get('/auth/google/callback', 'Auth\LoginController@auth_google_callback')->name('auth.google.callback');

Route::get('/auth/facebook', 'Auth\LoginController@auth_facebook')->name('auth.facebook');
Route::get('/auth/facebook/callback', 'Auth\LoginController@auth_facebook_callback')->name('auth.facebook.callback');

Route::get('/auth/twitter', 'Auth\LoginController@auth_twitter')->name('auth.twitter');
Route::get('/auth/twitter/callback', 'Auth\LoginController@auth_twitter_callback')->name('auth.twitter.callback');

Route::get('/auth/github', 'Auth\LoginController@auth_github')->name('auth.github');
Route::get('/auth/github/callback', 'Auth\LoginController@auth_github_callback')->name('auth.github.callback');

Route::get('/auth/linkedin', 'Auth\LoginController@auth_linkedin')->name('auth.linkedin');
Route::get('/auth/linkedin/callback', 'Auth\LoginController@auth_linkedin_callback')->name('auth.linkedin.callback');

