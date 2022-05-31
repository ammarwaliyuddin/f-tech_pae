<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PackingController;
use App\Http\Controllers\AsuransiController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\TransaksiController;

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
    Route::get('service-list', [ServiceController::class,'list']);

    // Packing
    Route::resource('packing', PackingController::class);
    Route::get('packing-list', [PackingController::class,'list']);

    // asuransi
    Route::resource('asuransi', AsuransiController::class);
    Route::get('asuransi-list', [AsuransiController::class,'list']);

    // disposisi
    Route::resource('disposisi', DisposisiController::class);
    Route::get('disposisi-list', [DisposisiController::class,'list']);

});

Route::prefix('datadestinasi')->group(function () {
    //kota
    Route::resource('kota', KotaController::class);
    Route::get('kota-list', [KotaController::class,'list']);

    //kecamatan
    Route::resource('kecamatan', KecamatanController::class);
    Route::get('kecamatan-list', [KecamatanController::class,'list']);

    //destinasi
    Route::resource('destinasi', DestinasiController::class);
    Route::get('destinasi-list', [DestinasiController::class,'list']);
});

// Route::prefix('transaksi') ->group(function () {
//     Route::resource('transaksi', TransaksiController::class);
// });

Route::resource('/transaksi', TransaksiController::class);


