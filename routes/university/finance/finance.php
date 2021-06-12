<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\University\Finance\FinanceController;


Route::prefix('finance')->name('finance.')->group(function () {
    Route::get('/status', [FinanceController::class, 'index'])->name('index');

    Route::get('/payments/history', [FinanceController::class, 'history'])->name('history');
    Route::get('/payments/history/details/{invoice_id}', [FinanceController::class, 'details'])->name('details');

    Route::get('/payments/request', [FinanceController::class, 'paymentRequest'])->name('request');

    Route::get('/settings', [FinanceController::class, 'setting'])->name('setting');
});