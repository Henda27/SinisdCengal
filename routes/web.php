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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::resource('guru', \App\Http\Controllers\GuruController::class)
    ->middleware('auth');


Route::resource('mapel', \App\Http\Controllers\MapelController::class)
    ->middleware('auth');

Route::resource('siswa', \App\Http\Controllers\SiswaController::class)
    ->middleware('auth');

Route::resource('gsiswa', \App\Http\Controllers\GSiswaController::class)
    ->middleware('auth');

Route::resource('gnilai', \App\Http\Controllers\GNilaiController::class)
    ->middleware('auth');

Route::resource('gtarap', \App\Http\Controllers\GTarafController::class)
    ->middleware('auth');
