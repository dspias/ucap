<?php

use Illuminate\Support\Facades\Route;

Route::prefix('student')->name('student.')->middleware('isprofile')->group(function () {
    include_once 'chatroom/chatroom.php';
    include_once 'dashboard/dashboard.php';
    include_once 'application/application.php';
    include_once 'documents/documents.php';
    include_once 'cart/cart.php';
});
Route::prefix('student')->name('student.')->group(function () {
    include_once 'profile/profile.php';
    include_once 'settings/settings.php';

    include_once 'compare/compare.php';
});
