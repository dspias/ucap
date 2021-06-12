<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Representative\LiveChat\LiveChatController;


Route::prefix('live_chat')->name('live_chat.')->group(function () {
    Route::get('/', [LiveChatController::class, 'index'])->name('index');
});
