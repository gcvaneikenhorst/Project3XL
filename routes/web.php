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

Route::get('/account', 'SettingsController@settings');
Route::post('/account/save', 'SettingsController@settingsSave');

Route::get('/account/email', 'SettingsController@email');
Route::post('/account/email/save', 'SettingsController@emailSave');

Route::get('/account/password', 'SettingsController@password');
Route::post('/account/password/save', 'SettingsController@passwordSave');
Route::get("/administrator/viewusers", 'AdministratorController@viewusers')
    ->where(["userable_type" => "App/Admin"]);

Route::group(["userable_type" => "App/Admin"], function() {
});