<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Student\StudentController;


Route::prefix('student')->name('student.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/show/{student_id}', [StudentController::class, 'show'])->name('show');


    Route::get('/ban/{student_id}', [StudentController::class, 'ban'])->name('ban');
    // Route::get('/create', [StudentController::class, 'create'])->name('create');
    // Route::get('/edit/{student_id}', [StudentController::class, 'edit'])->name('edit');

    Route::get('/download/{id}/{type}', [StudentController::class, 'downloadFile'])->name('download');
    Route::get('/education/downlod/{model_id}', [StudentController::class, 'educationDownload'])->name('education_download');
});
