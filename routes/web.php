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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/vacancy/create', 'VacancyController@create');
Route::get('/vacancy/edit/{id}', 'VacancyController@edit');
Route::post('/vacancy/edit/{id}', 'VacancyController@update');
Route::get('/vacancy', 'VacancyController@index');
Route::post('/vacancy/create', 'VacancyController@save');

Route::get('/vacancy/delete/{id}', 'VacancyController@delete');
Route::post('/vacancy/delete/{id}', 'VacancyController@doDelete');



Route::get('/matches', 'MatchesController@getMatches');
Route::get('/matches/payed', 'MatchesController@getPayedMatches');




Route::get('/home', 'HomeController@index');

Route::get('/matches', 'MatchesController@index');

Route::get('/account/dangerzone', 'AccountController@dangerzone');
Route::post('/account/dangerzone', 'AccountController@dangerzone');

Route::get('/account', 'SettingsController@settings');
Route::post('/account/save', 'SettingsController@settingsSave');

Route::get('/account/email', 'SettingsController@email');
Route::post('/account/email/save', 'SettingsController@emailSave');

Route::get('/account/password', 'SettingsController@password');
Route::post('/account/password/save', 'SettingsController@passwordSave');

Route::group(["userable_type" => "App/Admin"], function() {
    Route::get("/administrator/viewusers", 'AdministratorController@viewusers');
    Route::get("/administrator/viewcv/{userid}", 'AdministratorController@viewcvs');
    Route::get("/administrator/viewvacancy/{userid}", 'AdministratorController@viewvacancy');
    Route::get("/administrator/viewcompetences", "AdministratorController@viewcompetences");

    Route::get("/administrator/category", 'CategoryController@index');

    Route::get("/administrator/category/create", 'CategoryController@create');
    Route::post("/administrator/category/create", 'CategoryController@doCreate');

    Route::get("/administrator/category/edit/{id}", 'CategoryController@edit');
    Route::post("/administrator/category/edit/{id}", 'CategoryController@doEdit');

    Route::get("/administrator/category/delete/{id}", 'CategoryController@delete');
    Route::post("/administrator/category/delete/{id}", 'CategoryController@doDelete');
});

Route::get('/cv', 'CVController@index');

Route::get('/cv/create', 'CVController@create');
Route::post('/cv/create', 'CVController@doCreate');

Route::get('/cv/edit/{id}', 'CVController@edit');
Route::post('/cv/edit/{id}', 'CVController@doEdit');

Route::get('/cv/delete/{id}', 'CVController@delete');
Route::post('/cv/delete/{id}', 'CVController@doDelete');
