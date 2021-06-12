<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Settings\Offer\OfferController;

Route::prefix('offer')->name('offer.')->group(function () {
    Route::get('/', [OfferController::class, 'index'])->name('index');
    Route::get('/create', [OfferController::class, 'create'])->name('create');
});