<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VotingController;
use App\Models\Laporan;

// Guest routes
Route::get('/', function () {
    return view('auth.login');
});

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Routes for SDM role and Penyedia Makan
Route::middleware(['auth', 'verified', 'role:SDM|Penyedia Makan'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/voting-detail', [VotingController::class, 'detail'])->name('voting.detail');
    Route::get('/voting-user-detail/{id}', [VotingController::class, 'userdetail'])->name('voting.user-detail');

    Route::get('/makanan-detail', [MakananController::class, 'detail'])->name('makanan.detail');
    Route::get('/makanan-user-detail/{id}', [MakananController::class, 'userdetail'])->name('makanan.user-detail');

    Route::get('/bar-chart', 'ChartController@barChart');

    Route::get('/get-menu/{restaurantName}', [MakananController::class, 'getMenuByRestaurant'])->name('menu.get-menu');
    Route::get('keuangan/get-makanan-by-keuangan/{id}', [KeuanganController::class, 'getMakananbyKeuangan']);

    Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan.index');
    Route::post('/laporan/cetak', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetak');

    Route::resource('keuangan', KeuanganController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('voting', VotingController::class);
    Route::resource('makanan', MakananController::class);
    Route::resource('user', UserController::class);
    Route::resource('laporan', LaporanController::class);
});

// Routes for Karyawan role
Route::middleware(['auth', 'verified', 'role:Karyawan|SDM'])->group(function () {
    Route::get('/beranda', function () {
        return view('web.beranda');
    })->name('beranda');

    Route::resource('menu', MenuController::class);
    Route::post('/pilih-restoran', [MenuController::class, 'pilihRestoran'])->name('pilih.restoran');
    Route::post('/pilih-makanan', [MenuController::class, 'pilihMakanan'])->name('pilih.makanan');
});

// Authentication routes
require __DIR__ . '/auth.php';
