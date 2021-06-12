<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gateway\StripeController;


Route::prefix('stripe')->name('stripe.')->group(function () {
    Route::get('/', [StripeController::class, 'index'])->name('index');
    Route::post('/transaction', [StripeController::class, 'makePayment'])->name('make_payment');

    Route::post('/dropboxupload', [StripeController::class, 'dropboxupload'])->name('dropboxupload');
    Route::get('/dropboxuploadshow', [StripeController::class, 'dropboxuploadshow'])->name('dropboxuploadshow');
});
