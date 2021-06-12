<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Profile\ProfileController;


Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
});
