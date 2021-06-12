<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Centre\CentreController;


Route::prefix('centre')->name('centre.')->group(function () {
    Route::get('/ucap_centre/all', [CentreController::class, 'index'])->name('index');
    Route::get('/ucap_centre/create', [CentreController::class, 'create'])->name('create');
    Route::get('/ucap_centre/edit/{id}', [CentreController::class, 'edit'])->name('edit');
    Route::get('/{page}/show/{id}', [CentreController::class, 'show'])->name('show');


    Route::get('/change_status/{id}', [CentreController::class, 'change_status'])->name('change_status');

    Route::post('/ucap_centre/store', [CentreController::class, 'store'])->name('store');
    Route::post('/ucap_centre/update/{id}', [CentreController::class, 'update'])->name('update');
});
