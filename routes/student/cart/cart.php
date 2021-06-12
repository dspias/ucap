<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Cart\CartController;


Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::get('/remove/{program_id}', [CartController::class, 'remove'])->name('remove');
    Route::get('/payment', [CartController::class, 'payment'])->name('payment');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
});
