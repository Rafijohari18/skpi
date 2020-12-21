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

// 
Route::get('/program/studi', 'App\Http\Controllers\Admin\ProgramStudiController@index')->name('studi.index');
Route::post('/program/studi/store', 'App\Http\Controllers\Admin\ProgramStudiController@store')->name('studi.store');
Route::put('program/studi/{id}/update', 'App\Http\Controllers\Admin\ProgramStudiController@update')->name('studi.update');
Route::delete('program/studi/delete/{id}', 'App\Http\Controllers\Admin\ProgramStudiController@destroy')->name('studi.destroy');

//kelas
Route::get('/kelas', 'App\Http\Controllers\Admin\KelasController@index')->name('kelas.index');
Route::post('/kelas/store', 'App\Http\Controllers\Admin\KelasController@store')->name('kelas.store');
Route::put('kelas/{id}/update', 'App\Http\Controllers\Admin\KelasController@update')->name('kelas.update');
Route::delete('kelas/delete/{id}', 'App\Http\Controllers\Admin\KelasController@destroy')->name('kelas.destroy');

//gelar
Route::get('/gelar', 'App\Http\Controllers\Admin\GelarController@index')->name('gelar.index');
Route::post('/gelar/store', 'App\Http\Controllers\Admin\GelarController@store')->name('gelar.store');
Route::put('gelar/{id}/update', 'App\Http\Controllers\Admin\GelarController@update')->name('gelar.update');
Route::delete('gelar/delete/{id}', 'App\Http\Controllers\Admin\GelarController@destroy')->name('gelar.destroy');


//jenjang
Route::get('/jenjang', 'App\Http\Controllers\Admin\JenjangPendidikanController@index')->name('jenjang.index');
Route::post('/jenjang/store', 'App\Http\Controllers\Admin\JenjangPendidikanController@store')->name('jenjang.store');
Route::put('jenjang/{id}/update', 'App\Http\Controllers\Admin\JenjangPendidikanController@update')->name('jenjang.update');
Route::delete('jenjang/delete/{id}', 'App\Http\Controllers\Admin\JenjangPendidikanController@destroy')->name('jenjang.destroy');

//matkul
Route::get('/matkul', 'App\Http\Controllers\Admin\MatkulController@index')->name('matkul.index');
Route::post('/matkul/store', 'App\Http\Controllers\Admin\MatkulController@store')->name('matkul.store');
Route::put('matkul/{id}/update', 'App\Http\Controllers\Admin\MatkulController@update')->name('matkul.update');
Route::delete('matkul/delete/{id}', 'App\Http\Controllers\Admin\MatkulController@destroy')->name('matkul.destroy');

// mahasiswa
Route::get('/mahasiswa', 'App\Http\Controllers\Admin\MahasiswaController@index')->name('mahasiswa.index');
Route::get('/mahasiswa/create', 'App\Http\Controllers\Admin\MahasiswaController@create')->name('mahasiswa.create');
Route::post('/mahasiswa/store', 'App\Http\Controllers\Admin\MahasiswaController@store')->name('mahasiswa.store');
Route::get('mahasiswa/{id}/edit', 'App\Http\Controllers\Admin\MahasiswaController@edit')->name('mahasiswa.edit');
Route::put('mahasiswa/{id}/update', 'App\Http\Controllers\Admin\MahasiswaController@update')->name('mahasiswa.update');
Route::delete('mahasiswa/delete/{id}', 'App\Http\Controllers\Admin\MahasiswaController@destroy')->name('mahasiswa.destroy');

//deskriptor
Route::get('/deskriptor', 'App\Http\Controllers\Admin\deskriptorController@index')->name('deskriptor.index');
Route::post('/deskriptor/store', 'App\Http\Controllers\Admin\deskriptorController@store')->name('deskriptor.store');
Route::put('deskriptor/{id}/update', 'App\Http\Controllers\Admin\deskriptorController@update')->name('deskriptor.update');
Route::delete('deskriptor/delete/{id}', 'App\Http\Controllers\Admin\deskriptorController@destroy')->name('deskriptor.destroy');

Route::get('profile/perguruan/tinggi', 'App\Http\Controllers\Admin\ProfileKampusController@index')->name('profile.kampus.index');
Route::post('profile/perguruan/tinggi/update', 'App\Http\Controllers\Admin\ProfileKampusController@update')->name('profile.kampus.update');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
