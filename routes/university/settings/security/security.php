<?php

use App\Http\Controllers\University\Settings\SecurityController;
use Illuminate\Support\Facades\Route;

Route::prefix('security')->name('security.')->group(function () {
    Route::get('/', [SecurityController::class, 'index'])->name('index');
    Route::post('/change_password', [SecurityController::class, 'change_password'])->name('change_password');
});
