<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Settings\Address\StateController;

Route::prefix('state')->name('state.')->group(function () {
    Route::get('/', [StateController::class, 'index'])->name('index');
    Route::post('/store', [StateController::class, 'store'])->name('store');
    Route::post('/update', [StateController::class, 'update'])->name('update');
    Route::get('/change_status/{id}', [StateController::class, 'change_status'])->name('change_status');
});
