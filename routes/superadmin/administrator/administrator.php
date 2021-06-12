<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Administrator\AdministratorController;


Route::prefix('administrator')->name('administrator.')->group(function () {
    Route::get('/admins', [AdministratorController::class, 'index'])->name('index');
    Route::get('/create', [AdministratorController::class, 'create'])->name('create');
    Route::get('/admins/edit/{id}', [AdministratorController::class, 'edit'])->name('edit');
    Route::get('/admins/show/{id}', [AdministratorController::class, 'show'])->name('show');


    Route::get('/admins/change_status/{id}', [AdministratorController::class, 'change_status'])->name('change_status');

    Route::post('/store', [AdministratorController::class, 'store'])->name('store');
    Route::post('/update/{id}', [AdministratorController::class, 'update'])->name('update');
});
