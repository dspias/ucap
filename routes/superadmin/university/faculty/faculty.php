<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\University\FacultyController;


Route::prefix('all/faculty')->name('faculty.')->group(function () {

    // ===============< Faculty >===============
    Route::get('/{uni_id}/{faculty_id}', [FacultyController::class, 'show'])->name('show');

    Route::get('/edit/{uni_id}/{faculty_id}', [FacultyController::class, 'edit'])->name('edit');


    Route::post('/store/{uni_id}', [FacultyController::class, 'store'])->name('store');

    Route::post('/update/{faculty_id}', [FacultyController::class, 'update'])->name('update');


    Route::get('/change_status/{id}', [FacultyController::class, 'change_status'])->name('change_status');



    // ===============< program >===============
    include_once 'program/program.php';
});
