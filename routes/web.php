<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Role
Route::middleware(['auth', 'verified'])->group(function () {
})->middleware('role:SDM')->name('dashboard');

Route::group(['middleware' => 'role:SDM'], function () {
    Route::get('/voting-detail', [VotingController::class, 'detail'])->name('voting.detail');
    Route::get('/voting-user-detail/{id}', [VotingController::class, 'userdetail'])->name('voting.user-detail');

    Route::get('/makanan-detail', [MakananController::class, 'detail'])->name('makanan.detail');
    Route::get('/makanan-user-detail/{id}', [MakananController::class, 'userdetail'])->name('makanan.user-detail');

    Route::get('/bar-chart', 'ChartController@barChart');
    Route::get('/get-menu/{restaurantName}', 'MakananController@getMenuByRestaurant');

    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
    Route::get('/keuangan-detail', [KeuanganController::class, 'detail'])->name('keuangan.detail');

    Route::get('/makanans/{id}', [KeuanganController::class, 'getMakananByKeuangan']);

    Route::resource('keuangan', KeuanganController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('voting', VotingController::class);
    Route::resource('makanan', MakananController::class);
    Route::resource('user', UserController::class);
});

Route::group(['middleware' => 'role:Karyawan'], function () {
    Route::get('/beranda', function () {
        return view('web.beranda');
    })->name('beranda');
    Route::resource('menu', MenuController::class);
    Route::post('/pilih-restoran', [MenuController::class, 'pilihRestoran'])->name('pilih.restoran');
    Route::post('/pilih-makanan', [MenuController::class, 'pilihMakanan'])->name('pilih.makanan');
});


require __DIR__ . '/auth.php';
