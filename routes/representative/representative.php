<?php

use Illuminate\Support\Facades\Route;

Route::prefix('representative')->name('representative.')->group(function () {
    include_once 'live_chat/live_chat.php';
    
    include_once 'dashboard/dashboard.php';
    include_once 'university/university.php';
    include_once 'application/application.php';
    include_once 'settings/settings.php';
});
