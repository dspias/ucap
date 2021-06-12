<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\University\Program\ProgramController;

Route::prefix('program')->name('program.')->group(function () {
    Route::get('/all', [ProgramController::class, 'all'])->name('all');
    Route::get('/active', [ProgramController::class, 'active'])->name('active');
    Route::get('/inactive', [ProgramController::class, 'inactive'])->name('inactive');
    Route::get('/create', [ProgramController::class, 'create'])->name('create');
    Route::get('/{page}/show/{id}', [ProgramController::class, 'edit'])->name('edit');

    Route::post('/store', [ProgramController::class, 'store'])->name('store');
    Route::post('/update/{program_id}', [ProgramController::class, 'update'])->name('update');

    Route::post('/requirement/add/{program_id}', [ProgramController::class, 'addRequirement'])->name('requirement.add');
    Route::post('/requirement/remove', [ProgramController::class, 'removeRequirement'])->name('requirement.remove');

    Route::post('/feature/add/{program_id}', [ProgramController::class, 'addFeature'])->name('feature.add');
    Route::post('/feature/remove', [ProgramController::class, 'removeFeature'])->name('feature.remove');

    Route::post('/session/add/{program_id}', [ProgramController::class, 'addSession'])->name('session.add');
    Route::post('/session/remove', [ProgramController::class, 'removeSession'])->name('session.remove');

    Route::post('/language/add/{program_id}', [ProgramController::class, 'addLanguage'])->name('language.add');
    Route::post('/language/remove/{program_id}', [ProgramController::class, 'removeLanguage'])->name('language.remove');

    Route::post('/curriculum/add/{program_id}', [ProgramController::class, 'addCurriculum'])->name('curriculum.add');
    Route::post('/curriculum/update', [ProgramController::class, 'updateCurriculum'])->name('curriculum.update');
    Route::get('/curriculum/remove/{curriculum_id}', [ProgramController::class, 'removeCurriculum'])->name('curriculum.remove');

    Route::get('/change_status/{id}', [ProgramController::class, 'change_status'])->name('change_status');
});
