<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\University\UniversityController;


Route::prefix('university')->name('university.')->group(function () {
    Route::get('/', [UniversityController::class, 'index'])->name('index');
    Route::get('/show/{id}/{name}', [UniversityController::class, 'show'])->name('show');
});
