<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\Program\ProgramController;


Route::prefix('program')->name('program.')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])->name('index');
    Route::get('/show/{program_id}/{program_title}', [ProgramController::class, 'show'])->name('show');
    Route::post('/addtocart/{program_id}', [ProgramController::class, 'addToCart'])->name('addtocart');
    Route::get('/changewishlist/{program_id}', [ProgramController::class, 'changeWishlist'])->name('changewishlist');
});
