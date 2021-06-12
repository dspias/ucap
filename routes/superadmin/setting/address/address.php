<?php

use Illuminate\Support\Facades\Route;

Route::prefix('address')->name('address.')->group(function () {
    include_once 'country/country.php';
    include_once 'state/state.php';
    include_once 'city/city.php';
});