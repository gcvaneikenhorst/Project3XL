<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['prefix' => 'auth', 'middleware' => 'auth:api'], function () {
    Route::get('/matches', 'MatchesController@getMatches');
    Route::get('/matches/payed', 'MatchesController@getPayedMatches');
});

Route::post("/administrator/updateuser/{userid}", 'AdministratorController@updateUserData');
Route::post("/administrator/updatecv/{cvid}", 'AdministratorController@updateCVData');
Route::post("/administrator/updatevacancy/{vacancyid}", 'AdministratorController@updateVacancyData');
Route::delete("/administrator/deleteuser/{userid}", 'AdministratorController@deleteUser');
Route::delete("/administrator/deletecv/{cvid}", 'AdministratorController@deleteCV');
Route::delete("/administrator/deletevacancy/{vacancyid}", 'AdministratorController@deleteVacancy');
//Route::group(["userable_type" => "App/Admin"], function() {
//});




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


