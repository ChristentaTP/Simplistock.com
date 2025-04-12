<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController ;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\BarangMasukController;
use App\Http\Controllers\Admin\BarangKeluarController;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboardController;
use App\Http\Controllers\Pegawai\BarangKeluarController as PegawaiBarangKeluarController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PegawaiMiddleware;

// Halaman utama (opsional)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Login & Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//karena Route::middleware([PegawaiMiddleware::class])ini pemanggilan midelware langsung pake nama kelasnya aja jangan pake tipe string  end poin


Route::middleware([PegawaiMiddleware::class])->prefix('pegawai')->name('pegawai.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [PegawaiDashboardController::class, 'index'])->name('dashboard');
    Route::get('/barang-keluar', [PegawaiBarangKeluarController::class, 'index'])->name('barangkeluar.index');
    Route::post('/barang-keluar', [PegawaiBarangKeluarController::class, 'store'])->name('barangkeluar.store');
        });


// Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
Route::middleware([AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // List Barang (read-only)
    Route::get('/list-barang', [BarangController::class, 'index'])->name('listbarang');

    // Barang Masuk (CRUD)
    Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barangmasuk.index');
    Route::get('/barang-masuk/create', [BarangMasukController::class, 'create'])->name('barangmasuk.create');
    Route::post('/barang-masuk', [BarangMasukController::class, 'store'])->name('barangmasuk.store');
    Route::get('/barang-masuk/edit', [BarangMasukController::class, 'edit'])->name('barangmasuk.edit');
    Route::put('/barang-masuk/update', [BarangMasukController::class, 'update'])->name('barangmasuk.update');
    Route::delete('/barang-masuk/delete', [BarangMasukController::class, 'destroy'])->name('barangmasuk.destroy');

    // Barang Keluar (CRUD + stok berkurang)
    Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barangkeluar.index');
    Route::get('/barang-keluar/create', [BarangKeluarController::class, 'create'])->name('barangkeluar.create');
    Route::post('/barang-keluar', [BarangKeluarController::class, 'store'])->name('barangkeluar.store');
    Route::get('/barang-keluar/{id}/edit', [BarangKeluarController::class, 'edit'])->name('barangkeluar.edit');
    Route::put('/barang-keluar/{id}', [BarangKeluarController::class, 'update'])->name('barangkeluar.update');
    Route::delete('/barang-keluar/{id}', [BarangKeluarController::class, 'destroy'])->name('barangkeluar.destroy');
});
