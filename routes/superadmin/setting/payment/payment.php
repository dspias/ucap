<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Settings\Payment\PaymentController;

Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('index');
    Route::post('/store', [PaymentController::class, 'store'])->name('store');
    Route::post('/update', [PaymentController::class, 'update'])->name('update');
    Route::get('/change_status/{id}', [PaymentController::class, 'change_status'])->name('change_status');
});
