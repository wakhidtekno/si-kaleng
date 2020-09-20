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

Route::get('/', 'PageController@guestHome')->middleware('guest')->name('guest.home');
Route::get('/pesan', 'PageController@getPesan')->middleware('auth')->name('pesan.index');
Route::post('/pesan', 'PageController@pesan')->middleware('guest')->name('pesan.store');

Route::get('/login', 'AuthController@getLogin')->middleware('guest')->name('login');
Route::post('/login', 'AuthController@postLogin')->middleware('guest')->name('post-login');
Route::get('/edit-password','AuthController@editPassword')->middleware('auth')->name('edit-password');
Route::patch('/update-password','AuthController@updatePassword')->middleware('auth')->name('update-password');
Route::get('/logout','AuthController@logout')->middleware('auth')->name('logout');

Route::get('/home','PageController@home')->middleware('auth')->name('home');

Route::resource('kaleng', 'KalengController');
Route::resource('munfik', 'MunfikController');
Route::resource('admin', 'AdminController');
Route::resource('petugas', 'PetugasController');
Route::resource('saldo', 'SaldoController')->except(['create','show','edit','update','destroy']);
Route::resource('transaksi', 'TransaksiController')->except(['create','show','edit','update','destroy']);

Route::put('/penerimaan/{penerimaan}/konfirmasi', 'PenerimaanController@konfirmasi')->name('penerimaan.konfirmasi');
Route::get('/penerimaan/laporan', 'PenerimaanController@laporan')->name('penerimaan.laporan');
Route::resource('penerimaan', 'PenerimaanController');


Route::resource('penyaluran', 'PenyaluranController');
