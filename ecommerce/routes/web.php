<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

//all route use one controller :)
Route::group(['controller' => ProductController::class], function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
    Route::get('/products/{id}/show', 'show')->name('products.show');
    Route::get('/products/{id}/edit', 'edit')->name('products.edit');
    Route::post('/products/{id}/update', 'update')->name('products.update');
    Route::get('/products/{id}/delete', 'destroy')->name('products.destroy');
});





// if you don't understand do this 

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{id}/show', [ProductController::class, 'show'])->name('products.show');
// Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
// Route::get('/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
