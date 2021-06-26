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
    return redirect('login');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/users', 'UsersController@index');

Route::group(['prefix' => 'salesdata'], function () { 
	Route::get('/', 'DatabaseController@index');
	Route::get('/import', 'DatabaseController@import');
	Route::post('/import', 'DatabaseController@importsubmit');
});





