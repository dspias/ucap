<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\Contact\ContactController;


Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/sendmail', [ContactController::class, 'sendmail'])->name('sendmail');
});
