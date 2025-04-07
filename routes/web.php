<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangKeluarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/data/barang', [BarangController::class, 'index'])->name('data.barang');
Route::get('/data/barang/create', [BarangController::class, 'create'])->name('data.barang.create');
Route::post('/data/barang', [BarangController::class, 'store'])->name('data.barang.store');
Route::get('/data/barang/{id}/edit', [BarangController::class, 'edit'])->name('data.barang.edit');
Route::put('/data/barang/{id}', [BarangController::class, 'update'])->name('data.barang.update');
Route::delete('/data/barang/{id}', [BarangController::class, 'destroy'])->name('data.barang.destroy');
