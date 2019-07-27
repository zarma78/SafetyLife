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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Auth\LoginController@__construct');

Route::post('register', 'API\UserController@register');



    Route::prefix('users')->group(function () {
        Route::get('all', 'ReadController@ListUsersJsonAll');
        Route::get('enable', 'ReadController@ListUsersJsonEnable');
        Route::get('id_all', 'ReadController@ListUsersByIdAll');
        Route::get('id_enable', 'ReadController@ListUserByIdEnable');
        Route::get('first_name_all', 'ReadController@ListUsersByFirstNameAll');
        Route::get('first_name_enable', 'ReadController@ListUsersByFirstNameEnable');
        Route::get('last_name_all' , 'ReadController@ListUsersByLastNameAll');
        Route::get('last_name_enable' , 'ReadController@ListUsersByLastNameEnable');
        Route::get('hopital_all', 'ReadController@ListUsersByHopitalAll');
        Route::get('hopital_enable', 'ReadController@ListUsersByHopitalEnable');
        Route::get('allergie', 'ReadController@ListUserByAllergie')->name("users allergie");
        Route::put('update', 'UpdateController@UpdateUsers')->name("update_users");
    });
    Route::prefix('hopital')->group(function () {
        Route::get('', 'ReadController@ListHopital');
        Route::get('id', 'ReadController@ListHopitalById');
        Route::get('name', 'ReadController@ListHopitalByName');
        Route::post('create', 'CreateController@CreateHopital');
    });
    Route::prefix('allergie')->group(function () {
        Route::get('', 'ReadController@ListAllergieJson');
        Route::get('id', 'ReadController@ListAllergieById')->name("allergie by id");
        Route::get('name', 'ReadController@ListAllergieByName');
        Route::get('users', 'ReadController@ListAllergieByUsers');
        Route::post('create', 'CreateController@CreateAllergie');
        Route::put('update', 'UpdateController@UpdateAllergie');
    });

    Route::prefix('history')->group(function (){
        Route::get('', 'ReadController@ListHistoryJson');
        Route::get('id', 'ReadController@ListHistoryById');
        Route::get('users', 'ReadController@ListHistoryByUser');
    });

    Route::prefix('info')->group(function () {
        Route::get('', 'ReadController@ListInfoJson');
        Route::get('id', 'ReadController@ListInfoById');
        Route::get('users', 'ReadController@ListInfoByUser');
        Route::post('create', 'CreateController@CreateInfo');
        Route::put('update', 'UpdateController@UpdateInfo');
    });

    Route::prefix('personne')->group(function () {
        Route::get('', 'ReadController@ListPersonneJson');
        Route::get('id', 'ReadController@ListPersonneById');
        Route::get('first_name', 'ReadController@ListPersonneByFirstName');
        Route::get('last_name', 'ReadController@ListPersonneByLastName');
        Route::get('users', 'ReadController@ListPersonneByUsers');
        Route::post('create', 'CreateController@CreatePersonne');
        Route::put('update', 'UpdateController@UpdatePersonne');
    });
    Route::prefix('alerte')->group(function () {
        Route::get('', 'ReadController@ListAlerteJson');
        Route::post('create', 'CreateController@CreateAlerte');
    });
Route::group(['middleware' => 'auth:api'], function() {
});

