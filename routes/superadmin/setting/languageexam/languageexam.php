<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Settings\LanguageExam\LanguageExamController;

Route::prefix('languageexam')->name('languageexam.')->group(function () {
    Route::get('/', [LanguageExamController::class, 'index'])->name('index');
    Route::post('/store', [LanguageExamController::class, 'store'])->name('store');
    Route::post('/update', [LanguageExamController::class, 'update'])->name('update');
    Route::get('/change_status/{id}', [LanguageExamController::class, 'change_status'])->name('change_status');
});
