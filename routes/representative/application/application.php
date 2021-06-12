<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Representative\Application\ApplicationController;


Route::prefix('application')->name('application.')->group(function () {
    Route::get('/assigned', [ApplicationController::class, 'assigned'])->name('assigned');
    Route::get('/completed', [ApplicationController::class, 'completed'])->name('completed');
    Route::get('/rejected', [ApplicationController::class, 'rejected'])->name('rejected');

    Route::get('/{page}/show/{app_id}', [ApplicationController::class, 'show'])->name('show');
});
