<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\ResumeCV\ResumeCVController;

Route::prefix('/')->name('guest.')->group(function () {
    include_once 'homepage/homepage.php';
    include_once 'about/about.php';
    include_once 'country/country.php';
    include_once 'university/university.php';
    include_once 'faculty/faculty.php';
    include_once 'program/program.php';
    include_once 'contact/contact.php';
    include_once 'faq/faq.php';
    include_once 'search/search.php';
    include_once 'subscribe/subscribe.php';


    // ===========< View CV / Resume >=========
    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/{student_id_bin}/cv_resume/{student_id_hex}', [ResumeCVController::class, 'viewCV'])->name('cv.resume');
        Route::get('/language_donload/{model_id}', [ResumeCVController::class, 'downloadLanguageFile'])->name('cv.downoad_language');
        Route::get('/education_donload/{model_id}', [ResumeCVController::class, 'downloadEducationFile'])->name('cv.downoad_education');
    });
});
