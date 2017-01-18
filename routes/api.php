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
    Route::group(["middleware" => 'App\Http\Middleware\AdminMiddleware'], function() {
        Route::get('/matches', 'MatchesController@getMatches');
        Route::get('/matches/payed', 'MatchesController@getPayedMatches');
        Route::get('/cv/{id}', 'MatchesController@getCVinfo');
        Route::post('/pay', 'MatchesController@pay');
    });

    Route::group(["middleware" => 'App\Http\Middleware\AdminMiddleware'], function() {
        Route::post("/administrator/updateuser/{userid}", 'AdministratorController@updateUserData');
        Route::post("/administrator/updatecv/{cvid}", 'AdministratorController@updateCVData');
        Route::post("/administrator/updatevacancy/{vacancyid}", 'AdministratorController@updateVacancyData');
        Route::post('/administrator/updatecompetence/{competenceid}', 'AdministratorController@updateCompetenceData');
        Route::post('/administrator/createcompetence', 'AdministratorController@createCompetence');
        Route::delete("/administrator/deleteuser/{userid}", 'AdministratorController@deleteUser');
        Route::delete("/administrator/deletecv/{cvid}", 'AdministratorController@deleteCV');
        Route::delete("/administrator/deletevacancy/{vacancyid}", 'AdministratorController@deleteVacancy');
        Route::delete("/administrator/deletecompetence/{competenceid}", 'AdministratorController@deleteCompetence');
    });
    //});



});

//Route::group(["userable_type" => "App/Admin"], function() {
//});




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


