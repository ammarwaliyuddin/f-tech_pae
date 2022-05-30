<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PackingController;
use App\Http\Controllers\AsuransiController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\KotaController;
use App\Models\Packing;

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
    // barang
    Route::resource('barang', BarangController::class);
    Route::get('barang-list', [BarangController::class,'list']);

    // service
    Route::resource('service', ServiceController::class);

    // Packing
    Route::resource('packing', PackingController::class);

    // asuransi
    Route::resource('asuransi', AsuransiController::class);

    // disposisi
    Route::resource('disposisi', DisposisiController::class);

    //kota
    Route::resource('kota', KotaController::class);
});


