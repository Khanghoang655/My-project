<?php

use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->middleware('check.is.admin')->name('admin.')->group(function() {
    Route::get('index', [MatchController::class, 'index'])->name('index');
    Route::match(['get', 'post'], 'update-matches', [MatchController::class, 'updateMatch'])->name('update-matches');
    Route::delete('matches/destroy/{id}', [MatchController::class, 'destroy'])->name('matches.destroy');
    Route::post('matches/force-delete/{id}', [MatchController::class, 'forceDelete'])->name('matches.force.delete');
    Route::post('matches/restore/{id}', [MatchController::class, 'restore'])->name('matches.restore');
    Route::post('matches/update/{id}', [MatchController::class, 'update'])->name('matches.update');
    Route::post('matches/slug/', [MatchController::class, 'createSlug'])->name('matches.createSlug');
    Route::get('matches/detail/{id}', [MatchController::class, 'detail'])->name('matches.detail');
});
