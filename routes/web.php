<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;

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
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/datamaster/packing', function () {
    return view('dashboard.datamaster.packing');
});
Route::get('/datamaster/service', function () {
    return view('dashboard.datamaster.service');
});
Route::get('/datamaster/asuransi', function () {
    return view('dashboard.datamaster.asuransi');
});
Route::get('/datamaster/disposisi', function () {
    return view('dashboard.datamaster.disposisi');
});
Route::get('/datadestinasi/kota', function () {
    return view('dashboard.datadestinasi.kota');
});
Route::get('/datadestinasi/kecamatan', function () {
    return view('dashboard.datadestinasi.kecamatan');
});
Route::get('/datadestinasi/destinasi', function () {
    return view('dashboard.datadestinasi.destinasi');
});
Route::get('/datapelanggan/level', function () {
    return view('dashboard.datapelanggan.level');
});
Route::prefix('datamaster')->group(function () {
    Route::resource('barang', BarangController::class);
});
