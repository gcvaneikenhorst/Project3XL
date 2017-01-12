<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/account/dangerzone', 'AccountController@dangerzone');
Route::post('/account/dangerzone', 'AccountController@dangerzone');

Route::get('/settings', 'SettingsController@index');
Route::post('/settings/save', 'SettingsController@save');
