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
Route::group(['middleware' => ['checkactivestatus']], function () {
	Route::get('/dashboard', 'DashboardController@index');
	Route::group(['middleware' => ['check-permission:superadmin']], function () {
		Route::get('/users', 'UsersController@index');
		Route::post('users/getall', 'UsersController@getAll')->name('users.getall');
		Route::post('users/getmodal', 'UsersController@getModal')->name('users.getmodal');
		Route::post('users/store', 'UsersController@store')->name('users.store');
		Route::get('users/delete/{id}', 'UsersController@destroy')->name('users.destroy');
		Route::post('users/changestatus', 'UsersController@changeStatus')->name('users.changestatus');
	});
	Route::group(['prefix' => 'salesdata','middleware' => ['check-permission:superadmin']], function () {
		Route::get('/', 'DatabaseController@index');
		Route::post('/getall', 'DatabaseController@getAll')->name('salesdata.getall');
		Route::get('/import', 'DatabaseController@import');
		Route::post('/import', 'DatabaseController@importsubmit');
		Route::get('/importcategories', 'DatabaseController@importcategories');
		Route::post('/importcategories', 'DatabaseController@importcategoriessubmit');
		Route::get('/exportdata', 'DatabaseController@exportdata');
		Route::post('/deletemultiple', 'DatabaseController@deleteMultiple');
	});

	Route::group(['prefix' => 'report'], function () {
		Route::get('/', 'ReportController@index');
	});
});




