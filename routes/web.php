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

Route::get('/receipt', 'receiptController@index')->name('receipt');

Route::get('/pesanan', 'PesananController@index')->name('pesanan');
Route::get('/pesanan-baru', 'PesananController@pesananBaru')->name('pesanan-baru');
Route::post('/submit-pesanan-baru', 'PesananController@submitPesananBaru')->name('submit-pesanan');
Route::get('/pesanan/tambah', 'PesananController@create')->name('pesanan-tambah');
Route::post('/pesanan/simpan', 'PesananController@save')->name('pesanan-simpan');
Route::get('/pesanan/edit/{id}', 'PesananController@edit')->name('pesanan-edit');
Route::post('/pesanan/edit/{id}', 'PesananController@update')->name('pesanan-update');
Route::get('/pesanan/delete/{id}', 'PesananController@delete')->name('pesanan.delete');
