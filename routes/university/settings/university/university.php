<?php

use App\Http\Controllers\University\Settings\UniversityController;
use Illuminate\Support\Facades\Route;

Route::prefix('university')->name('university.')->group(function () {
    Route::get('/', [UniversityController::class, 'index'])->name('index');
    Route::post('/update', [UniversityController::class, 'update'])->name('update');
});
