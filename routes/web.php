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

Auth::routes();

    Route::get('dashboard', 'ViewController@dashboard')->name('dashboard');

    Route::get('register', 'ViewController@inscription')->name('register');

    Route::get('/', 'ViewController@inscription')->name('inscription');

    Route::get('maps', 'ViewController@maps')->name('maps');

    Route::get('notifications', 'ViewController@notifications')->name('notifications');

    Route::get('table', 'ViewController@table')->name('table');

    Route::get('user', 'ViewController@user')->name('user');

    Route::get('forgot_password', 'ViewController@forgot_password')->name('forgot_password');

    Route::get('home', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home');
