<?php

use App\Http\Controllers\Guest\Homepage\HomepageController;
use Illuminate\Support\Facades\Route;


Route::prefix('')->name('homepage.')->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('index');
    Route::post('/change_lang/{lang}', [HomepageController::class, 'changeLang'])->name('change_lang');
});
