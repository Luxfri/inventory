<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

// ================= AUTH =================
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ================= HALAMAN UTAMA SETELAH LOGIN =================
Route::get('/', function () {
    return redirect()->route('products.index');
})->middleware('auth');

Route::middleware('auth')->group(function () {

    // ---------- PRODUCTS ----------
    // Staff & admin: boleh lihat, tambah, edit
    Route::resource('products', ProductController::class)->except(['destroy']);

    // Hanya admin: hapus produk
    Route::delete('products/{product}', [ProductController::class, 'destroy'])
        ->middleware('admin')
        ->name('products.destroy');

    // ---------- CATEGORIES ----------
    // Staff & admin: boleh lihat & tambah
    Route::get('categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::post('categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    // Hanya admin: edit, update, hapus kategori
    Route::middleware('admin')->group(function () {
        Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])
            ->name('categories.edit');

        Route::put('categories/{category}', [CategoryController::class, 'update'])
            ->name('categories.update');

        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])
            ->name('categories.destroy');
    });

});