<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Dashboard\DashboardController;


Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});
