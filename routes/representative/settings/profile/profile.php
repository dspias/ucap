<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Representative\Settings\ProfileController;

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::get('/edit/{user_id}', [ProfileController::class, 'edit'])->name('edit');
    Route::post('/update', [ProfileController::class, 'update'])->name('update');
});
