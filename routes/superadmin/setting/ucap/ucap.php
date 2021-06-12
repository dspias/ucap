<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\Settings\UCAP\UCAPController;
use App\Http\Controllers\SuperAdmin\Settings\UCAP\Website\WebsiteController;
use App\Http\Controllers\SuperAdmin\Settings\UCAP\Application\ApplicationController;

Route::prefix('ucap')->name('ucap.')->group(function () {
    // Route::get('/', [UCAPController::class, 'index'])->name('index');

    Route::get('/general', [UCAPController::class, 'general'])->name('general.index');
    Route::post('/general', [UCAPController::class, 'generalStore'])->name('general.store');

    Route::get('/contact', [UCAPController::class, 'contact'])->name('contact.index');
    Route::post('/contact', [UCAPController::class, 'contactStore'])->name('contact.store');

    Route::get('/email', [UCAPController::class, 'email'])->name('email.index');
    Route::post('/email', [UCAPController::class, 'emailStore'])->name('email.store');

    Route::get('/website', [WebsiteController::class, 'index'])->name('website.index');
    Route::post('/website/store', [WebsiteController::class, 'store'])->name('website.store');

    Route::post('/website/faq/store', [WebsiteController::class, 'faqStore'])->name('website.faq.store');
    Route::post('/website/faq/update', [WebsiteController::class, 'faqUpdate'])->name('website.faq.update');
    Route::get('/website/faq/delete/{key}', [WebsiteController::class, 'faqDelete'])->name('website.faq.delete');


    Route::get('/application', [ApplicationController::class, 'index'])->name('application.index');
    Route::post('/application/store', [ApplicationController::class, 'store'])->name('application.store');
});
