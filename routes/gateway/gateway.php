<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/gateway')->name('gateway.')->group(function () {
    include_once 'stripe/stripe.php';
});
