<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\Faculty\FacultyController;


Route::prefix('faculty')->name('faculty.')->group(function () {
    Route::get('/', [FacultyController::class, 'index'])->name('index');
    Route::get('/show/{faculty_id}/{faculty_name}', [FacultyController::class, 'show'])->name('show');
});
