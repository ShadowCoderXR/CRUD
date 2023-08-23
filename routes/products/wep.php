<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


route::get('products' , [ProductController::class, 'index'])->name('products.index');
route::get('products/create' , [ProductController::class, 'create'])->name('products.create');
route::post('products' , [ProductController::class, 'store'])->name('products.store');
route::get('products/{id}' , [ProductController::class, 'show'])->name('products.show');
route::get('products/{id}/edit' , [ProductController::class, 'edit'])->name('products.edit');
route::put('products/{id}' , [ProductController::class, 'update'])->name('products.update');
route::delete('products/{id}' , [ProductController::class, 'destroy'])->name('products.destroy');
