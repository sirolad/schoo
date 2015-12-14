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
Route::get('/signup', 'AuthController@getRegister');
Route::post('/signup', 'AuthController@postRegister');
Route::get('/login', [
  'uses' => 'AuthController@getLogin',
  'as'    => 'login'
]);
Route::post('/login', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@getLogout');
/* Social media authentication */
Route::get('auth/{github}', 'AuthController@redirectToProvider');
Route::get('auth/{github}/callback', 'AuthController@handleProviderCallback');
Route::get('auth/{twitter}', 'AuthController@redirectToProvider');
Route::get('auth/{twitter}/callback', 'AuthController@handleProviderCallback');
Route::get('auth/{facebook}', 'AuthController@redirectToProvider');
Route::get('auth/{facebook}/callback', 'AuthController@handleProviderCallback');

/* Course routes using resource */
Route::resource('courses', 'CourseController');

Route::delete('courses/{id}/delete', 'CourseController@destroy');


/* Profile Settings Route */
Route::get('/profile', ['middleware' => 'auth', 'uses' => 'ProfileController@index']);
Route::post('/profile', 'ProfileController@edit');

Route::post('/profile/avatar', 'ProfileController@update');

/* Section Routes for courses*/
Route::get('computer-science', 'HomeController@getComputer');
Route::get('languages', 'HomeController@getLanguages');
Route::get('general-knowledge', 'HomeController@getGeneral');
Route::get('personal-development', 'HomeController@getPersonal');
Route::get('software-development', 'HomeController@getSoftware');