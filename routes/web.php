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
    return view('auth/login');
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

Route::resource('/nilai', App\Http\Controllers\NilaiController::class);

Route::resource('gsiswa', \App\Http\Controllers\GSiswaController::class)
    ->middleware('auth');

Route::resource('report', \App\Http\Controllers\ReportController::class)
    ->middleware('auth');

// Route::resource('nilai_uas', \App\Http\Controllers\UasController::class)
//     ->middleware('auth');
Route::get('nilai_uas', [App\Http\Controllers\UasController::class, 'index']);
Route::post('/guru/uasUpdate', [App\Http\Controllers\UasController::class, 'nilaiUas']);
