<?php

use Illuminate\Support\Facades\Route;

Route::prefix('settings')->name('settings.')->group(function () {
    include_once 'profile/profile.php';
    include_once 'security/security.php';
});
