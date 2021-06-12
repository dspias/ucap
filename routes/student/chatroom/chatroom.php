<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\ChatRoom\ChatRoomController;


Route::prefix('chatroom')->name('chatroom.')->group(function () {
    Route::get('/', [ChatRoomController::class, 'index'])->name('index');
});
