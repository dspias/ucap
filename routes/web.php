<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';


/*===================================
========< Guest Routes >=======
===================================*/
Route::middleware(['web'])->group(function () {
    include_once 'guest/guest.php';
});


/*===================================
========< SuperAdmin Routes >=======
===================================*/
Route::middleware(['auth', 'superadmin'])->group(function () {
    include_once 'superadmin/superadmin.php';
});


/*===================================
========< centre Routes >=======
===================================*/
Route::middleware(['auth', 'centre'])->group(function () {
    include_once 'centre/centre.php';
});


/*===================================
========< university Routes >=======
===================================*/
Route::middleware(['auth', 'university'])->group(function () {
    include_once 'university/university.php';
});


/*===================================
========< representative Routes >=======
===================================*/
Route::middleware(['auth', 'representative'])->group(function () {
    include_once 'representative/representative.php';
});


/*===================================
========< student Routes >=======
===================================*/
Route::middleware(['auth', 'student'])->group(function () {
    include_once 'student/student.php';
});



/*===================================
========< Gateway Routes >=======
===================================*/
Route::middleware(['web'])->group(function () {
    include_once 'gateway/gateway.php';
});
