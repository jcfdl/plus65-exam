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
// Auth::routes();
// routes
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home.index');
Route::post('/register', 'HomeController@register');
Route::post('/check', 'HomeController@check');
// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/administrator', 'AdministratorsController@index')->name('admin.home');
	Route::post('/administrator/add', 'AdministratorsController@create')->name('admin.create');
	Route::post('/administrator/draw', 'AdministratorsController@draw')->name('admin.draw');
	Route::get('/administrator/{id}/delete', 'AdministratorsController@destroy')->name('admin.delete');
	// prizes
	Route::get('/administrator/prizes', 'AdministratorPrizesController@index')->name('admin.prizes');
	Route::post('/administrator/prizes/add', 'AdministratorPrizesController@create')->name('admin.prizes.create');
	Route::get('/administrator/prizes/{id}/edit', 'AdministratorPrizesController@edit')->name('admin.prizes.edit');
	Route::patch('/administrator/prizes/{id}/update', 'AdministratorPrizesController@update');
	Route::get('/administrator/prizes/{id}/delete', 'AdministratorPrizesController@destroy')->name('admin.prizes.delete');
});
