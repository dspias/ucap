<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\University\Faculty\FacultyController;

Route::prefix('faculty')->name('faculty.')->group(function () {
    Route::get('/all', [FacultyController::class, 'all'])->name('all');
    Route::get('/active', [FacultyController::class, 'active'])->name('active');
    Route::get('/inactive', [FacultyController::class, 'inactive'])->name('inactive');
    Route::get('/create', [FacultyController::class, 'create'])->name('create');
    Route::get('/{page}/show/{id}', [FacultyController::class, 'show'])->name('show');

    Route::post('/store', [FacultyController::class, 'store'])->name('store');
    Route::post('/update/{id}', [FacultyController::class, 'update'])->name('update');

    Route::get('/change_status/{id}', [FacultyController::class, 'change_status'])->name('change_status');
});
