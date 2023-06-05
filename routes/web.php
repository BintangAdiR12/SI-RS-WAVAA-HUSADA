<?php

use App\Http\Controllers\coba;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\Jenis_KamarController;
use App\Http\Controllers\Jenis_PerawatanController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\Pemeriksaan_DokterController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Tenaga_KesehatanController;
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

Route::get('/', [LoginController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('dokter', DokterController::class);
Route::resource('jenis-kamar', Jenis_KamarController::class);
Route::resource('jenis-perawatan', Jenis_PerawatanController::class);
Route::resource('kamar', KamarController::class);
Route::resource('obat', ObatController::class);
Route::resource('pasien', PasienController::class);
Route::resource('pegawai', PegawaiController::class);
Route::resource('pembayaran', PembayaranController::class);
Route::resource('pemeriksaan-dokter', Pemeriksaan_DokterController::class);
Route::resource('pengguna', PenggunaController::class);
Route::resource('tenaga-kesehatan', Tenaga_KesehatanController::class);

Route::get('print-dokter', [DokterController::class, 'print']);
Route::get('print-jenis-kamar', [Jenis_KamarController::class, 'print']);
Route::get('print-jenis-perawatan', [Jenis_PerawatanController::class, 'print']);
Route::get('print-kamar', [KamarController::class, 'print']);
Route::get('print-obat', [ObatController::class, 'print']);
Route::get('print-pasien', [PasienController::class, 'print']);
Route::get('print-pegawai', [PegawaiController::class, 'print']);
Route::get('print-pembayaran', [PembayaranController::class, 'print']);
Route::get('print-pemeriksaan-dokter', [Pemeriksaan_DokterController::class, 'print']);
Route::get('print-pengguna', [PenggunaController::class, 'print']);
Route::get('print-tenaga-kesehatan', [Tenaga_KesehatanController::class, 'print']);
