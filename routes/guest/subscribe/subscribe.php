<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\Subscribe\SubscribeController;


Route::prefix('newsletter')->name('newsletter.')->group(function () {
    Route::get('/subscribers', [SubscribeController::class, 'index'])->name('index')->middleware('superadmin');
    Route::post('/store', [SubscribeController::class, 'store'])->name('store');
});
