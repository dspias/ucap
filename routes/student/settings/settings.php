<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\Settings\SettingsController;


Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/profile', [SettingsController::class, 'profile'])->name('profile');
    Route::post('/profile_update', [SettingsController::class, 'profileUpdate'])->name('profile.update');

    Route::get('/education', [SettingsController::class, 'education'])->name('education');
    Route::post('/education/store', [SettingsController::class, 'educationStore'])->name('education.store');
    Route::post('/education/update', [SettingsController::class, 'educationUpdate'])->name('education.update');
    Route::get('/education/destroy/{id}', [SettingsController::class, 'educationDestroy'])->name('education.destroy');

    Route::get('/reference', [SettingsController::class, 'reference'])->name('reference');
    Route::post('/reference/store', [SettingsController::class, 'referenceStore'])->name('reference.store');
    Route::post('/reference/update', [SettingsController::class, 'referenceUpdate'])->name('reference.update');
    Route::get('/reference/destroy/{id}', [SettingsController::class, 'referenceDestroy'])->name('reference.destroy');

    Route::get('/', [SettingsController::class, 'language'])->name('language');
    Route::post('/language/store', [SettingsController::class, 'languageStore'])->name('language.store');
    Route::post('/language/update', [SettingsController::class, 'languageUpdate'])->name('language.update');
    Route::get('/language/destroy/{id}', [SettingsController::class, 'languageDestroy'])->name('language.destroy');

    Route::get('/security', [SettingsController::class, 'security'])->name('security');
    Route::post('/change_password', [SettingsController::class, 'change_password'])->name('change_password');
});
