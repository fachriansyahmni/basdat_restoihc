<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/menu', 'MenuController@index')->name('menu');
Route::post('/new-menu', 'MenuController@newMenu')->name('submit.new-menu');
Route::patch('/edit-menu/{id}', 'MenuController@editMenu')->name('submit.edit-menu');
Route::delete('/hapus-menu/{id}', 'MenuController@hapusMenu')->name('submit.delet-menu');

Route::get('/pesanan', 'PesananController@index')->name('pesanan');
Route::get('/pesanan/tambah', 'PesananController@create')->name('pesanan-tambah');
Route::post('/pesanan/simpan', 'PesananController@save')->name('pesanan-simpan');
Route::get('/pesanan/edit/{id}', 'PesananController@edit')->name('pesanan-edit');
Route::post('/pesanan/edit/{id}', 'PesananController@update')->name('pesanan-update');
Route::get('/pesanan/delete/{id}', 'PesananController@delete')->name('pesanan.delete');

Route::get('/cabang', 'CabangController@index')->name('cabang');
Route::get('/cabang/tambah', 'CabangController@create')->name('cabang.tambah');
Route::post('/cabang/simpan', 'CabangController@save')->name('cabang.simpan');
Route::get('/cabang/edit/{id}', 'CabangController@edit')->name('cabang.edit');
Route::post('/cabang/update/{id}', 'CabangController@update')->name('cabang.update');
Route::get('/cabang/delete/{id}', 'CabangController@delete')->name('cabang.delete');
