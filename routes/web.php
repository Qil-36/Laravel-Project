<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| PUBLIC (TOKO / PELANGGAN)
|--------------------------------------------------------------------------
*/
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/produk', [PageController::class, 'produk'])->name('produk');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/keranjang', [PageController::class, 'keranjang'])->name('keranjang');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');

/*
|--------------------------------------------------------------------------
| DASHBOARD (UNTUK BREEZE) - BIAR LOGIN GA ERROR
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect()->route('admin.products.index');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', fn () => redirect()->route('admin.products.index'))->name('index');

        Route::resource('products', ProductController::class);
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');
    });

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (BREEZE)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';