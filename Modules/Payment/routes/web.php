<?php

use Illuminate\Support\Facades\Route;
use Modules\Payment\Http\Controllers\PaymentController;
use Modules\Payment\Http\Controllers\PurchaseController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('payments', PaymentController::class)->names('payment');
});
Route::post('/purchase', [PurchaseController::class, 'purchase'])->name('payment.purchase');
// Route::post('/payment/add', [PaymentController::class, 'addToCart'])->name('payment.add');
// Route::get('/payment/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');