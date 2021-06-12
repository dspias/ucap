<?php

use Illuminate\Support\Facades\Route;

Route::prefix('university')->name('university.')->group(function () {
    include_once 'dashboard/dashboard.php';
    include_once 'application/application.php';
    include_once 'faculty/faculty.php';
    include_once 'program/program.php';
    include_once 'representative/representative.php';
    include_once 'finance/finance.php';
    include_once 'settings/settings.php';
});
