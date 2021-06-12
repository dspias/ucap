<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\Country\CountryController;


Route::prefix('country')->name('country.')->group(function () {
    Route::get('/', [CountryController::class, 'index'])->name('index');
    Route::get('/show/{id}/{name}', [CountryController::class, 'show'])->name('show');
});
