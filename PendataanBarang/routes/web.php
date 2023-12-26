<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('sidebar');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::resource('dashboard', DashboardController::class)->middleware(['auth']);
Route::resource('barang', BarangController::class)->middleware(['auth']);
Route::resource('barangMasuk', BarangMasukController::class)->middleware(['auth']);
Route::resource('barangKeluar', BarangKeluarController::class)->middleware(['auth']);
Route::resource('laporan', LaporanController::class)->middleware(['auth']);
Route::resource('pengguna', UserController::class)->middleware(['auth']);
Route::get('/tahun', [LaporanController::class, 'getDataByYear'])->name('tahun');
Route::get('/cetaktahun', [LaporanController::class, 'printByYear'])->name('cetaktahun');
Route::get('/indexbulan', [LaporanController::class, 'indexMonth'])->name('indexbulan');
Route::get('/cetakbulan', [LaporanController::class, 'printByMonth'])->name('cetakbulan');
Route::get('/bulan', [LaporanController::class, 'getDataByMonth'])->name('bulan');
Route::get('/indexhari', [LaporanController::class, 'indexDay'])->name('indexhari');
Route::get('/hari', [LaporanController::class, 'getDataByDay'])->name('hari');
Route::get('/cetakhari', [LaporanController::class, 'printByDay'])->name('cetakhari');

require __DIR__.'/auth.php';
