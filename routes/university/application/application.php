<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\University\Application\ApplicationController;


Route::prefix('application')->name('application.')->group(function () {
    Route::get('/all', [ApplicationController::class, 'all'])->name('all');
    Route::get('/processing', [ApplicationController::class, 'processing'])->name('processing');
    Route::get('/accepted', [ApplicationController::class, 'accepted'])->name('accepted');
    Route::get('/pending', [ApplicationController::class, 'pending'])->name('pending');
    Route::get('/rejected', [ApplicationController::class, 'rejected'])->name('rejected');
    Route::get('/{page}/show/{id}', [ApplicationController::class, 'show'])->name('show');
    Route::get('/{page}/show/student/{student_id}', [ApplicationController::class, 'student'])->name('student');

    Route::post('/assign_rep', [ApplicationController::class, 'assignRep'])->name('assign_rep');
    Route::post('/reject_with_reason/{program_id}', [ApplicationController::class, 'rejectWithReason'])->name('reject_with_reason');
});
Route::prefix('student')->name('student.')->group(function () {

    Route::get('/download/{id}/{type}', [ApplicationController::class, 'downloadFile'])->name('download');
    Route::get('/education/downlod/{model_id}', [ApplicationController::class, 'educationDownload'])->name('education_download');
});
