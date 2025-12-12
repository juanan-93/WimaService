<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/productos', [ProductsController::class, 'products'])->name('products.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Categories
    
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('index');
        Route::post('/', [CategoriesController::class, 'store'])->name('store');
        Route::get('/all', [CategoriesController::class, 'getAll'])->name('all');
        Route::get('/{category}', [CategoriesController::class, 'show'])->name('show');
        Route::put('/{category}', [CategoriesController::class, 'update'])->name('update');
        Route::delete('/{category}', [CategoriesController::class, 'destroy'])->name('destroy');
        Route::patch('/{category}/toggle-active', [CategoriesController::class, 'toggleActive'])->name('toggle-active');
    });
});

require __DIR__.'/auth.php';
