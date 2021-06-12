<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\About\AboutController;


Route::prefix('about')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('index');
});
