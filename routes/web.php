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
