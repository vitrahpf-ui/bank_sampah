<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route Halaman Admin (Dilindungi middleware isAdmin)
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Route Halaman Petugas (Dilindungi middleware isPetugas)
Route::middleware(['auth', 'isPetugas'])->group(function () {
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.dashboard');
});

// Route Halaman Nasabah (Dilindungi middleware isNasabah)
// Route Khusus Nasabah
Route::middleware(['auth', 'isNasabah'])->prefix('nasabah')->name('nasabah.')->group(function () {
    // Jalur utama /nasabah dan /nasabah/dashboard sama-sama mengarah ke method dashboard()
    Route::get('/', [NasabahController::class, 'dashboard']);
    Route::get('/dashboard', [NasabahController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/riwayat', [NasabahController::class, 'riwayat'])->name('riwayat');
    Route::get('/kalkulator', [NasabahController::class, 'kalkulator'])->name('kalkulator');
    Route::get('/tarik_saldo', [NasabahController::class, 'tarik_saldo'])->name('tarik_saldo'); 
    Route::get('/notifikasi', [NasabahController::class, 'notifikasi'])->name('notifikasi');
});