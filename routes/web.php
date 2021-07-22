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
Route::get('menu/export/', 'MenuController@export')->name('menu.export');
Route::post('menu/import/', 'MenuController@import')->name('menu.import');

Route::get('/receipt', 'receiptController@index')->name('receipt');
Route::get('/print-receipt', 'receiptController@printLaporan')->name('print-receipt');

Route::get('/pesanan', 'PesananController@index')->name('pesanan');
Route::get('/pesanan-baru', 'PesananController@pesananBaru')->name('pesanan-baru');
Route::post('/submit-pesanan-baru', 'PesananController@submitPesananBaru')->name('submit-pesanan');
Route::get('/pesanan/tambah', 'PesananController@create')->name('pesanan-tambah');
Route::post('/pesanan/simpan', 'PesananController@save')->name('pesanan-simpan');
Route::get('/pesanan/edit/{id}', 'PesananController@edit')->name('pesanan-edit');
Route::post('/pesanan/edit/{id}', 'PesananController@update')->name('pesanan-update');
Route::get('/pesanan/delete/{id}', 'PesananController@delete')->name('pesanan.delete');
Route::get('/pesanan/export/', 'PesananController@export')->name('pesanan.export');
Route::post('/pesanan/import/', 'PesananController@import')->name('pesanan.import');

Route::get('/receipt/edit/{id}', "ReceiptController@edit")->name('receipt.edit');
Route::post('/receipt/edit-save/{id}', "ReceiptController@update")->name('receipt.edit-save');
Route::get('/receipt/delete/{id}', "ReceiptController@delete")->name('receipt.delete');

Route::get('/cabang', 'CabangController@index')->name('cabang');
Route::get('/cabang/tambah', 'CabangController@create')->name('cabang.tambah');
Route::post('/cabang/simpan', 'CabangController@save')->name('cabang.simpan');
Route::get('/cabang/edit/{id}', 'CabangController@edit')->name('cabang.edit');
Route::post('/cabang/update/{id}', 'CabangController@update')->name('cabang.update');
Route::get('/cabang/delete/{id}', 'CabangController@delete')->name('cabang.delete');
Route::get('/cabang/export/', 'CabangController@export')->name('cabang.export');
Route::post('/cabang/import/', 'CabangController@import')->name('cabang.import');

Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/tambah', 'UserController@create')->name('user.tambah');
Route::post('/user/simpan', 'UserController@save')->name('user.simpan');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('/user/update/{id}', 'UserController@update')->name('user.update');
Route::get('/user/delete/{id}', 'UserController@delete')->name('user.delete');
Route::get('/user/export/', 'UserController@export');
