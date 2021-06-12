<?php

use App\Http\Controllers\Student\Documents\AditionalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Documents\DocumentsController;
use App\Http\Controllers\Student\Documents\LanguageController;

Route::prefix('documents')->name('documents.')->group(function () {
    Route::get('/', [DocumentsController::class, 'index'])->name('index');

    // education file handlling routes
    Route::post('/upload/education', [DocumentsController::class, 'uploadEducation'])->name('upload_education');
    Route::get('/download/education/{model_id}', [DocumentsController::class, 'downloadEducation'])->name('download_education');
    Route::get('/destroy/education/{model_id}', [DocumentsController::class, 'destroyEducation'])->name('destroy_education');

    // documents handling routes
    Route::post('/upload/{type}', [DocumentsController::class, 'upload'])->name('upload');
    Route::get('/download/{type}', [DocumentsController::class, 'download'])->name('download');
    Route::get('/destroy/{type}', [DocumentsController::class, 'destroy'])->name('destroy');


    // language file handlling routes
    Route::post('languge/upload', [LanguageController::class, 'uploadLanguage'])->name('upload_language');
    Route::get('language/download/{model_id}', [LanguageController::class, 'downloadLanguage'])->name('download_language');
    Route::get('language/destroy/{model_id}', [LanguageController::class, 'destroyLanguage'])->name('destroy_language');


    // aditional file handlling routes
    Route::post('aditional/upload', [AditionalController::class, 'uploadAditional'])->name('upload_aditional');
    Route::get('aditional/download/{model_id}', [AditionalController::class, 'downloadAditional'])->name('download_aditional');
    Route::get('aditional/destroy/{model_id}', [AditionalController::class, 'destroyAditional'])->name('destroy_aditional');
});
