<?php

use App\Http\Controllers\University\Settings\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
});
