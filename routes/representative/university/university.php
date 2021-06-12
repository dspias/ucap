<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Representative\University\UniversityController;


Route::prefix('my_university')->name('university.')->group(function () {
    Route::get('/', [UniversityController::class, 'index'])->name('index');
    Route::get('/{uni_id}/{faculty_id}', [UniversityController::class, 'faculty'])->name('faculty');
});
