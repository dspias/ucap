<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Application\ApplicationController;


Route::prefix('application')->name('application.')->group(function () {
    Route::get('/', [ApplicationController::class, 'index'])->name('index');
    Route::get('/show/{id}/{application_id}', [ApplicationController::class, 'show'])->name('show');
});
