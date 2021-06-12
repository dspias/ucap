<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\Search\SearchController;


Route::prefix('search')->name('search.')->group(function () {
    Route::get('/', [SearchController::class, 'index'])->name('index');
});
