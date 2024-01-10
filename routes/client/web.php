<?php

use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\HomeController\client;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/', function () {
    return view('client.index');
})->name('home');

Route::get('admin', function () {
    if (Auth::check() && Auth::user()->isAdmin()) {
        return view('admin.admin')->with('msg', 'Chào mừng bạn quay lại');
    } else {
        return back()->with('error', 'Bạn không được cấp quyền truy cập.');
    }
})->middleware(['auth', 'verified'])->name('admin-index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search-suggestions', [HomeController::class, 'searchSuggestions'])->name('seacrh');
Route::get('/competition-detail/{id}', [HomeController::class, 'competitionDetail'])->name('competition.detail');
Route::get('/matches-seat/{id}', [HomeController::class, 'matchesSeat'])->name('matches.seat');

