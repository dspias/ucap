<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\University\Representative\RepresentativeController;

Route::prefix('representative')->name('representative.')->group(function () {
    Route::get('/all', [RepresentativeController::class, 'all'])->name('all');
    Route::get('/active', [RepresentativeController::class, 'active'])->name('active');
    Route::get('/inactive', [RepresentativeController::class, 'inactive'])->name('inactive');
    Route::get('/create', [RepresentativeController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [RepresentativeController::class, 'edit'])->name('edit');
    Route::get('/{page}/show/{id}', [RepresentativeController::class, 'show'])->name('show');

    Route::get('/change_status/{id}', [RepresentativeController::class, 'change_status'])->name('change_status');

    Route::post('/store', [RepresentativeController::class, 'store'])->name('store');
    Route::post('/update/{id}', [RepresentativeController::class, 'update'])->name('update');
});
