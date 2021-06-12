<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Settings\Address\CityController;

Route::prefix('city')->name('city.')->group(function () {
    Route::get('/', [CityController::class, 'index'])->name('index');
    Route::post('/store', [CityController::class, 'store'])->name('store');
    Route::post('/update', [CityController::class, 'update'])->name('update');
    Route::get('/change_status/{id}', [CityController::class, 'change_status'])->name('change_status');
});
