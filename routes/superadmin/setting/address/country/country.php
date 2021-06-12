<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Settings\Address\CountryController;

Route::prefix('country')->name('country.')->group(function () {
    Route::get('/', [CountryController::class, 'index'])->name('index');
    Route::post('/store', [CountryController::class, 'store'])->name('store');
    Route::get('/change_status/{id}', [CountryController::class, 'change_status'])->name('change_status');
});
