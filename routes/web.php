<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\Admin\TentangController;
use App\Http\Controllers\Admin\VisiController;
use App\Http\Controllers\Admin\MisiController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\ForgotPasswordController; 
use App\Http\Controllers\Auth\ResetPasswordController;

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

Route::get('/', [LandingPageController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('tamu/produk', [ProdukController::class, 'produkView'])->name('tamu.produk.view');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('tamu.forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'submitForgotRequest'])->name('tamu.forgot-password.submit');

// Rute untuk halaman reset password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');



// Route untuk role-based dashboard
Route::middleware(['auth'])->group(function () {
    // Dashboard untuk Admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // Route untuk Tentang
    Route::get('admin/tentang', [TentangController::class, 'index'])->name('admin.tentang.index');
    Route::post('admin/tentang', [TentangController::class, 'store'])->name('admin.tentang.store');
    Route::put('admin/tentang/{tentang}', [TentangController::class, 'update'])->name('admin.tentang.update');
    Route::delete('admin/tentang/{tentang}', [TentangController::class, 'destroy'])->name('admin.tentang.destroy');

    // Route untuk Visi
    Route::get('admin/visi', [VisiController::class, 'index'])->name('admin.visi.index');
    Route::post('admin/visi', [VisiController::class, 'store'])->name('admin.visi.store');
    Route::put('admin/visi/{visi}', [VisiController::class, 'update'])->name('admin.visi.update');
    Route::delete('admin/visi/{visi}', [VisiController::class, 'destroy'])->name('admin.visi.destroy');

    // Route untuk Misi
    Route::get('admin/misi', [MisiController::class, 'index'])->name('admin.misi.index');
    Route::post('admin/misi', [MisiController::class, 'store'])->name('admin.misi.store');
    Route::put('admin/misi/{misi}', [MisiController::class, 'update'])->name('admin.misi.update');
    Route::delete('admin/misi/{misi}', [MisiController::class, 'destroy'])->name('admin.misi.destroy');

    // Route untuk Galeri
    Route::get('admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri.index');
    Route::post('admin/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::put('admin/galeri/{galeri}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('admin/galeri/{galeri}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    // Route untuk Produk
    Route::get('admin/produk', [ProdukController::class, 'index'])->name('admin.produk.index');
    Route::post('admin/produk', [ProdukController::class, 'store'])->name('admin.produk.store');
    Route::put('admin/produk/{produk}', [ProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('admin/produk/{produk}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');

    // Route untuk Pesanan
       Route::get('/admin/pesanan', [PesananController::class, 'index'])->name('admin.pesanan.index');
       Route::post('/admin/pesanan/{id}/update-status', [PesananController::class, 'updateStatus'])->name('admin.pesanan.updateStatus');
    });

    // Dashboard untuk Tamu
    Route::middleware(['tamu'])->group(function () {
        Route::get('/tamu', [TamuController::class, 'index'])->name('tamu.dashboard');

        
        Route::get('/tamu/pesanan/create', [PesananController::class, 'create'])->name('tamu.pesanan.create');
        Route::post('/tamu/pesanan/store', [PesananController::class, 'store'])->name('tamu.pesanan.store');
        Route::get('/tamu/pesanan/riwayat', [PesananController::class, 'riwayat'])->name('tamu.pesanan.riwayat');
        Route::get('/tamu/pesanan/{id}/nota', [PesananController::class, 'nota'])->name('tamu.pesanan.nota')->middleware('auth');
    });
});
