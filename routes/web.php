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

Route::any('/logistik/barang', 'BarangController@showAll');

Route::any('/logistik/barang/tambah', 'BarangController@addForm');

Route::post('/logistik/barang/tambah/do', 'BarangController@addItem');

Route::any('/logistik/proyek', 'ProyekController@showAll');

Route::any('logistik/proyek/{id}', ['uses' =>'ProyekController@showProyekById']);

Route::any('/logistik/proyek/tambah', 'ProyekController@addForm');

Route::post('/logistik/proyek/tambah/do', 'ProyekController@addProject');

Route::any('/logistik/proyek/debug', 'ProyekController@debug');