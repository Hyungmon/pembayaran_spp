<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


// Home View

// Siswa
Route::get('/siswa', 'SiswaController@index')->name('siswa');
Route::get('/siswa/create', 'SiswaController@create')->name('siswa.create');
Route::post('/siswa/store', 'SiswaController@store')->name('siswa.store');
Route::get('/siswa/edit/{siswa}', 'SiswaController@edit')->name('siswa.edit');
Route::patch('/siswa/update/{siswa}', 'SiswaController@update')->name('siswa.update');
Route::delete('/siswa/destroy/{siswa}', 'SiswaController@destroy')->name('siswa.destroy');

// Petugas
Route::get('/petugas', 'PetugasController@index')->name('petugas');
Route::get('/petugas/create', 'PetugasController@create')->name('petugas.create');
Route::post('/petugas/store', 'PetugasController@store')->name('petugas.store');
Route::get('/petugas/edit/{petugas}', 'PetugasController@edit')->name('petugas.edit');
Route::patch('/petugas/update/{petugas}', 'PetugasController@update')->name('petugas.update');
Route::delete('/petugas/destroy/{petugas}', 'PetugasController@destroy')->name('petugas.destroy');

// Kelas
Route::get('/kelas', 'KelasController@index')->name('kelas');
Route::get('/kelas/create', 'KelasController@create')->name('kelas.create');
Route::post('/kelas/store', 'KelasController@store')->name('kelas.store');
Route::get('/kelas/edit/{kelas}', 'KelasController@edit')->name('kelas.edit');
Route::patch('/kelas/update/{kelas}', 'KelasController@update')->name('kelas.update');
Route::delete('/kelas/destroy/{kelas}', 'KelasController@destroy')->name('kelas.destroy');

// SPP
Route::get('/spp', 'SppController@index')->name('spp');
Route::get('/spp/create', 'SppController@create')->name('spp.create');
Route::post('/spp/store', 'SppController@store')->name('spp.store');
Route::get('/spp/edit/{spp}', 'SppController@edit')->name('spp.edit');
Route::patch('/spp/update/{spp}', 'SppController@update')->name('spp.update');
Route::delete('/spp/destroy/{spp}', 'SppController@destroy')->name('spp.destroy');

// SPP -> views
Route::get('/pembayaran', 'PembayaranController@index')->name('pembayaran');
Route::get('/pembayaran/petugas', 'PembayaranController@petugas')->name('pembayaran.petugas');
Route::get('/pembayaran/siswa', 'PembayaranController@siswa')->name('pembayaran.siswa');
Route::get('/pembayaran/laporan', 'PembayaranController@laporan')->name('pembayaran.laporan');
Route::get('/pembayaran/laporan/download', 'PembayaranController@downloadLaporan')->name('pembayaran.download');
// SPP -> Create, Update, Delete
Route::get('/pembayaran/create', 'PembayaranController@create')->name('pembayaran.create');
Route::post('/pembayaran/store', 'PembayaranController@store')->name('pembayaran.store');
Route::get('/pembayaran/edit/{pembayaran}', 'PembayaranController@edit')->name('pembayaran.edit');
Route::patch('/pembayaran/update/{pembayaran}', 'PembayaranController@update')->name('pembayaran.update');
Route::delete('/pembayaran/destroy/{pembayaran}', 'PembayaranController@destroy')->name('pembayaran.destroy');


Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/siswa/dashboard', 'SiswaController@dashboard')->name('dashboard.siswa');
Route::get('/siswa/dashboard', function () {
    return view('layouts.siswa');
})->middleware('auth:user_siswa');

Route::get('/petugas/dashboard', 'PetugasController@dashboard')->name('dashboard.petugas');
Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard.admin');
Auth::routes();

Route::get('/siswa/login', function () {
    return view('auth.login_siswa');
})->name('login_siswa');
