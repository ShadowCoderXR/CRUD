<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Product Routes
|--------------------------------------------------------------------------
*/

/**
 * GET /products
 * Retrieves all products.
 */
route::get('products' , [ProductController::class, 'index'])->name('products.index');

/**
 * GET /products/create
 * Show the form for creating a new product.
 */
route::get('products/create' , [ProductController::class, 'create'])->name('products.create');

/**
 * POST /products
 * Create new product on products table in database.
 */
route::post('products' , [ProductController::class, 'store'])->name('products.store');

/**
 * GET /products/{id}
 * @param id string required Product id. Product: "1"
 * Show product with id.
 */
route::get('products/{id}' , [ProductController::class, 'show'])->name('products.show');

/**
 * GET /products/{id}/edit
 * @param id string required Product id. Product: "1"
 * Show the form for editing the specified product.
 */
route::get('products/{id}/edit' , [ProductController::class, 'edit'])->name('products.edit');

/**
 * PUT /products/{id}
 * @param id string required Product id. Product: "1"
 * Update the specified product in database.
 */
route::put('products/{id}' , [ProductController::class, 'update'])->name('products.update');

/**
 * DELETE /products/{id}
 * @param id string required Product id. Product: "1"
 * Remove the specified product from database.
 */
route::delete('products/{id}' , [ProductController::class, 'destroy'])->name('products.destroy');
