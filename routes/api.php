<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::get('cart', [CartController::class, 'index']);
Route::post('cart', [CartController::class, 'addToCart']);
Route::put('cart/{id}', [CartController::class, 'updateCartItem']);
Route::delete('cart/{id}', [CartController::class, 'removeCartItem']);
