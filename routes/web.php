<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AbsensiDosenController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;



Route::get('/', function () {
    return view('welcome');
});


//  routes/web.php
// Route::resource('dosen', DosenController::class);

// Route::resource('mhs', MahasiswaController::class);

// Route::resource('matakuliah', MatakuliahController::class);

// Route::resource('absensi', AbsensiController::class);
// Route::resource('absensi', AbsensiController::class)->except(['show']);

// Route::middleware(['auth', 'role:dosen'])->group(function () {
//     Route::get('/absensi/input', [AbsensiDosenController::class, 'create'])->name('dosen.absensi.create');
//     Route::post('/absensi/input', [AbsensiDosenController::class, 'store'])->name('dosen.absensi.store');
// });

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);



