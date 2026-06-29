<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;

// 1. Halaman Login (Tampil saat pertama kali buka web)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// 2. Proses Login (Menerima data dari form)
Route::post('/login', [AuthController::class, 'login']);

// 3. Proses Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- NANTI KITA AKAN BUAT DASHBOARDNYA ---
// Untuk sementara, kita buat halaman dummy dulu agar saat login berhasil tidak error (404)

Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/siswa/dashboard', function () {
    return 'Halo Siswa! Halaman ini sedang dalam pembangunan.';
});

Route::middleware('auth')->group(function () {
    Route::resource('/kelas', KelasController::class);
});