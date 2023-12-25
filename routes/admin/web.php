<?php

use App\Http\Controllers\admin\MatchController;
use App\Http\Controllers\admin\CompetitionController;
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
Route::prefix('admin')->middleware('check.is.admin')->name('admin.')->group(function(){
    Route::get('competition', [CompetitionController::class, 'index'])->name('index');
    Route::match(['get', 'post'], 'update-competiton', [CompetitionController::class, 'updateCompetition'])->name('update-competition');
    Route::delete('competition/destroy/{id}', [CompetitionController::class, 'destroy'])->name('competition.destroy');
    Route::post('competition/force-delete/{id}', [CompetitionController::class, 'forceDelete'])->name('competition.force.delete');
    Route::post('competition/restore/{id}', [CompetitionController::class, 'restore'])->name('competition.restore');
    Route::post('competition/update/{id}', [CompetitionController::class, 'update'])->name('competition.update');
    Route::post('competition/slug/', [CompetitionController::class, 'createSlug'])->name('competition.createSlug');
    Route::get('competition/detail/{id}', [CompetitionController::class, 'detail'])->name('competition.detail');
});