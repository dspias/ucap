<?php

use Illuminate\Support\Facades\Route;

Route::prefix('settings')->name('settings.')->group(function () {
    include_once 'ucap/ucap.php';
    include_once 'address/address.php';
    include_once 'offer/offer.php';
    include_once 'payment/payment.php';
    include_once 'languageexam/languageexam.php';
});
