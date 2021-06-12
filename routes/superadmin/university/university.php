<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\University\UniversityController;
use App\Http\Controllers\SuperAdmin\University\FacultyController;
use App\Http\Controllers\SuperAdmin\University\ProgramController;


Route::prefix('university')->name('university.')->group(function () {
    Route::get('/', [UniversityController::class, 'index'])->name('index');
    Route::get('/active', [UniversityController::class, 'active'])->name('active');
    Route::get('/inactive', [UniversityController::class, 'inactive'])->name('inactive');
    Route::get('/create', [UniversityController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [UniversityController::class, 'edit'])->name('edit');
    Route::get('/{page}/show/{id}', [UniversityController::class, 'show'])->name('show');

    Route::get('/change_status/{id}', [UniversityController::class, 'change_status'])->name('change_status');

    Route::post('/store', [UniversityController::class, 'store'])->name('store');
    Route::post('/update/{id}', [UniversityController::class, 'update'])->name('update');


    // ===============< Faculty >===============
    include_once 'faculty/faculty.php';
});
