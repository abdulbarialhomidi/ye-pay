<?php

use Illuminate\Support\Facades\Route;
use Modules\Cart\Http\Controllers\CartController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('carts', CartController::class)->names('cart');
});

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');