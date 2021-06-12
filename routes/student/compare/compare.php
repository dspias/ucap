<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Compare\CompareController;


Route::prefix('compare')->name('compare.')->group(function () {
    Route::get('/', [CompareController::class, 'index'])->name('index');

    Route::get('/addremove/{program_id}', [CompareController::class, 'addremove'])->name('addremove');
    Route::get('/clear', [CompareController::class, 'clear'])->name('clear');
});
