<?php

use Illuminate\Support\Facades\Route;

Route::prefix('centre')->name('centre.')->group(function () {
    include_once 'dashboard/dashboard.php';
});
