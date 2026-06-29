<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'nocache'])
    ->name('dashboard');

// Profil Dasawisma
Route::middleware(['auth', 'nocache', 'role:admin,kader'])->group(function () {

    Route::get('/profil', [App\Http\Controllers\ProfilDasawismaController::class, 'edit'])
        ->name('profil.edit');

    Route::post('/profil', [App\Http\Controllers\ProfilDasawismaController::class, 'update'])
        ->name('profil.update');

});

// User & RT
Route::middleware(['auth', 'nocache', 'role:admin,kader'])->group(function () {

    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('rts', \App\Http\Controllers\RtController::class);

});

// Data Keluarga
Route::middleware(['auth', 'nocache', 'readonly'])->group(function () {

    Route::get('/keluarga/export-excel', [KeluargaController::class, 'exportExcel'])
        ->name('keluarga.exportExcel');

    Route::get('/keluarga/export-pdf', [KeluargaController::class, 'exportPdf'])
        ->name('keluarga.exportPdf');

    Route::get('/keluarga/cetak', [KeluargaController::class, 'cetak'])
        ->name('keluarga.cetak');

    Route::get('/keluarga/{id}/export-pdf-detail', [KeluargaController::class, 'exportPdfDetail'])
        ->name('keluarga.exportPdfDetail');

    Route::get('/keluarga/{id}/cetak-detail', [KeluargaController::class, 'cetakDetail'])
        ->name('keluarga.cetakDetail');

    Route::resource('keluarga', KeluargaController::class);

});

// Profile User
Route::middleware(['auth', 'nocache'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';