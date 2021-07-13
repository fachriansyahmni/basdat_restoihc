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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/menu', 'MenuController@index')->name('menu');


Route::get('/pesanan', 'PesananController@index')->name('pesanan');
Route::get('/pesanan/tambah', 'PesananController@create')->name('pesanan-tambah');
Route::post('/pesanan/simpan', 'PesananController@save')->name('pesanan-simpan');
