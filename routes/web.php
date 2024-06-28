<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('/pegawai/form', [PegawaiController::class, 'create']);
    Route::get('/pegawai/form/{id}', [PegawaiController::class, 'edit']);
    Route::post('/pegawai/store', [PegawaiController::class, 'store']);
    Route::post('/pegawai/update/{id}', [PegawaiController::class, 'update']);
    Route::get('/pegawai/delete/{id}', [PegawaiController::class, 'destroy']);
});

require __DIR__.'/auth.php';
