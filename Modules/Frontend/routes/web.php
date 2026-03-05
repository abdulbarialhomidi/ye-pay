<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\FrontendController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('frontends', FrontendController::class)->names('frontend');
});

/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/')->name('frontend.')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
});