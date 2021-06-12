<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Finance\FinanceController;


Route::prefix('finance')->name('finance.')->group(function () {
    Route::get('/status', [FinanceController::class, 'index'])->name('index');

    Route::get('/payments/all', [FinanceController::class, 'allPayment'])->name('all');
    Route::get('/payments/all/details/{invoice_id}', [FinanceController::class, 'details'])->name('details');

    Route::get('/payments/request', [FinanceController::class, 'paymentRequest'])->name('request');
    Route::get('/payments/request/make_payment/{invoice_id}', [FinanceController::class, 'makePayment'])->name('make.payment');

    Route::get('/settings', [FinanceController::class, 'setting'])->name('setting');


    Route::post('/set/commision', [FinanceController::class, 'setCommisions'])->name('set.commision');

    Route::post('/termcondition/store', [FinanceController::class, 'termconditionStore'])->name('termcondition.store');
    Route::post('/termcondition/update', [FinanceController::class, 'termconditionUpdate'])->name('termcondition.update');
    Route::get('/termcondition/delete/{key}', [FinanceController::class, 'termconditionDelete'])->name('termcondition.delete');
});
