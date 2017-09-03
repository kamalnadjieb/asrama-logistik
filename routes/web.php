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
    return view('welcome');
});

$proyek = '/logistik/proyek';

Route::resource('logistik/barang', 'BarangController');
// Route::any('/logistik/barang', 'BarangController@showAll');

// Route::any('/logistik/barang/tambah', 'BarangController@addForm');

// Route::post('/logistik/barang/tambah/do', 'BarangController@addItem');

// Route::any('/logistik/barang/update/{id}', 'BarangController@updateForm');

// Route::post('/logistik/barang/update/{id}/do', 'BarangController@updateItem');

Route::any('/logistik/proyek', 'ProyekController@showAll');

Route::any('/logistik/proyek/tambah', 'ProyekController@addForm');

Route::any($proyek.'/page/{page}', ['uses'=> 'ProyekController@show']);

Route::any($proyek.'/search/{key}/{page}', ['uses' => 'ProyekController@search']);

Route::any('logistik/proyek/{id}', ['uses' =>'ProyekController@showProyekById']);

Route::post('/logistik/proyek/tambah/do', 'ProyekController@addProject');

Route::any('/logistik/proyek/debug/{id}', 'ProyekController@debug');
