<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Application\ApplicationController;


Route::prefix('application')->name('application.')->group(function () {
    Route::get('/', [ApplicationController::class, 'index'])->name('index');
    Route::get('/processing', [ApplicationController::class, 'processing'])->name('processing');
    Route::get('/approved', [ApplicationController::class, 'approved'])->name('approved');
    Route::get('/pending', [ApplicationController::class, 'pending'])->name('pending');
    Route::get('/rejected', [ApplicationController::class, 'rejected'])->name('rejected');
    Route::get('/{page}/show/{id}/{application_id}', [ApplicationController::class, 'show'])->name('show');


    Route::post('/assign_rep', [ApplicationController::class, 'assignRep'])->name('assign_rep');
    Route::post('/reject_with_reason/{program_id}', [ApplicationController::class, 'rejectWithReason'])->name('reject_with_reason');
});
