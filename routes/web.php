<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| USER (PUBLIC)
|--------------------------------------------------------------------------
*/

// Beranda
Route::get('/', function () {
    $products = Product::latest()->get();
    return view('beranda.index', compact('products'));
})->name('home');

// Produk user (lihat + detail)
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::get('/produk/{product}', [ProductController::class, 'show'])->name('produk.show');

// Order produk (login wajib)
Route::post('/produk/{product}/pesan', [ProductController::class, 'order'])
    ->middleware('auth')
    ->name('produk.order');

/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------
        | CATEGORY (ADMIN)
        |--------------------------
        */
        Route::get('/kategori', [CategoryController::class, 'index'])
            ->name('kategori.index');

        Route::get('/kategori/create', [CategoryController::class, 'create'])
            ->name('kategori.create');

        Route::post('/kategori', [CategoryController::class, 'store'])
            ->name('kategori.store');

        Route::get('/kategori/{id}/edit', [CategoryController::class, 'edit'])
            ->name('kategori.edit');

        Route::put('/kategori/{id}', [CategoryController::class, 'update'])
            ->name('kategori.update');

        Route::delete('/kategori/{id}', [CategoryController::class, 'destroy'])
            ->name('kategori.destroy');

        /*
        |--------------------------
        | PRODUCT (ADMIN)
        |--------------------------
        */

        // ❗ PENTING: pakai index biasa, bukan adminIndex
        Route::get('/produk', [ProductController::class, 'index'])
            ->name('produk.index');

        Route::get('/produk/create', [ProductController::class, 'create'])
            ->name('produk.create');

        Route::post('/produk', [ProductController::class, 'store'])
            ->name('produk.store');

        Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])
            ->name('produk.edit');

        Route::put('/produk/{id}', [ProductController::class, 'update'])
            ->name('produk.update');

        Route::delete('/produk/{id}', [ProductController::class, 'destroy'])
            ->name('produk.destroy');
    });

require __DIR__.'/auth.php';