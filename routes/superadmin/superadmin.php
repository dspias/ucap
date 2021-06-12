<?php

use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->name('superadmin.')->group(function () {
    include_once 'dashboard/dashboard.php';
    include_once 'student/student.php';
    include_once 'university/university.php';
    include_once 'representative/representative.php';
    include_once 'application/application.php';
    include_once 'finance/finance.php';
    include_once 'administrator/administrator.php';
    include_once 'centre/centre.php';
    include_once 'setting/setting.php';
});