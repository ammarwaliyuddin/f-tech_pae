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
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KeuanganController;

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

Route::prefix('datapelanggan')->group(function () {
    // user
    Route::resource('user', UserController::class);
    Route::get('user-list', [UserController::class,'list']);
    Route::post('user-update', [UserController::class,'update']);

});

Route::prefix('datamaster')->group(function () {
    // barang
    Route::resource('barang', BarangController::class);
    Route::get('barang-list', [BarangController::class,'list']);
    Route::post('barang-update', [BarangController::class,'update']);

    // service
    Route::resource('service', ServiceController::class);
    Route::get('service-list', [ServiceController::class,'list']);
    Route::post('service-update', [ServiceController::class,'update']);

    // Packing
    Route::resource('packing', PackingController::class);
    Route::get('packing-list', [PackingController::class,'list']);
    Route::post('packing-update', [PackingController::class,'update']);

    // asuransi
    Route::resource('asuransi', AsuransiController::class);
    Route::get('asuransi-list', [AsuransiController::class,'list']);
    Route::post('asuransi-update', [AsuransiController::class,'update']);

    // disposisi
    Route::resource('disposisi', DisposisiController::class);
    Route::get('disposisi-list', [DisposisiController::class,'list']);
    Route::post('disposisi-update', [DisposisiController::class,'update']);

});

Route::prefix('datadestinasi')->group(function () {
    //kota
    Route::resource('kota', KotaController::class);
    Route::get('kota-list', [KotaController::class,'list']);
    Route::post('kota-update', [KotaController::class,'update']);

    //kecamatan
    Route::resource('kecamatan', KecamatanController::class);
    Route::get('kecamatan-list', [KecamatanController::class,'list']);
    Route::post('kecamatan-update', [KecamatanController::class,'update']);

    //destinasi
    Route::resource('destinasi', DestinasiController::class);
    Route::get('destinasi-list', [DestinasiController::class,'list']);
    Route::post('destinasi-update', [DestinasiController::class,'update']);
});

Route::resource('transaksi', TransaksiController::class);

Route::get('tracking', [TrackingController::class,'index']);
Route::get('tracking-list', [TrackingController::class,'list']);


Route::resource('/keuangan', KeuanganController::class);

Route::prefix('api')->group(function () {
    Route::get('data-barang', [BarangController::class,'data_barang']);
    Route::get('data-packing', [PackingController::class,'data_packing']);
    Route::get('data-service', [ServiceController::class,'data_service']);
    Route::get('data-asuransi', [AsuransiController::class,'data_asuransi']);
    Route::get('data-disposisi', [DisposisiController::class,'data_disposisi']);
    Route::get('data-destinasi', [DestinasiController::class,'data_destinasi']);
    Route::get('data-user', [UserController::class,'data_user']);
    Route::get('data-kota', [KotaController::class,'data_kota']);
    Route::get('data-kecamatan', [KecamatanController::class,'data_kecamatan']);
});


