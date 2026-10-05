<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ================= HALAMAN AWAL =================
Route::get('/', function () {
    return redirect()->route('products.index');
})->middleware('auth');

// ================= AUTH (tanpa login) =================
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ================= HALAMAN YANG BUTUH LOGIN =================
Route::middleware('auth')->group(function () {

    // ---------- PRODUCTS: staff & admin bisa lihat/tambah/edit, hapus khusus admin ----------
    Route::resource('products', ProductController::class)->except(['destroy']);

    Route::delete('products/{product}', [ProductController::class, 'destroy'])
        ->middleware('admin')
        ->name('products.destroy');

    // ---------- CATEGORIES: staff & admin bisa lihat/tambah, edit/hapus khusus admin ----------

    Route::middleware('admin')->group(function () {
        Route::resource('users', UserController::class)->except(['show', 'edit', 'update']);

        Route::patch('users/{user}/promote', [UserController::class, 'promote'])->name('users.promote');
        Route::patch('users/{user}/demote', [UserController::class, 'demote'])->name('users.demote');
    });

    Route::get('categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::post('categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::middleware('admin')->group(function () {
        Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])
            ->name('categories.edit');

        Route::put('categories/{category}', [CategoryController::class, 'update'])
            ->name('categories.update');

        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])
            ->name('categories.destroy');
    });

    // ---------- USERS: seluruhnya khusus admin ----------
    Route::middleware('admin')->group(function () {
        Route::resource('users', UserController::class)->except(['show', 'edit', 'update']);
    });

});
