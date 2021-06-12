<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\FAQ\FAQController;


Route::prefix('faq')->name('faq.')->group(function () {
    Route::get('/', [FAQController::class, 'index'])->name('index');
});
