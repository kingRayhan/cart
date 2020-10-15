<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);
Route::get('/categories/{category}/products', [CategoryController::class, 'productsOfCategory'])->name('categories.products');
