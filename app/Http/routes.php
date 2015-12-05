<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

# Homepage Routes

Route::get('/', [
    'uses' => '\Schoo\Http\Controllers\HomeController@index',
    'as'   => 'index'
]);

/* Traditional sign up and log in */
Route::get('/signup', 'Auth\AuthController@getRegister');
Route::post('/signup', 'Auth\AuthController@postRegister');
Route::get('/login', [
  'uses' => 'Auth\AuthController@getLogin',
  'as'    => 'login'
]);
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');
/* Social media authentication */
Route::get('auth/{github}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{github}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('auth/{twitter}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{twitter}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('auth/{facebook}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{facebook}/callback', 'Auth\AuthController@handleProviderCallback');