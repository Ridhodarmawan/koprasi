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

Route::post('/ajax', 'PenjualanController@ajax');

Route::post('/stok', 'PenjualanController@stok');

Route::get('/about', 'MyController@showAbout');


Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function() {
	//Route Diisi disini....
	Route::resource('anggotas', 'AnggotaController');
	Route::resource('barangs', 'BarangController');
	Route::resource('penjualans', 'PenjualanController');
	Route::resource('satuans', 'SatuanController');
});


