<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('client.index');
})->name('home');

Route::get('admin', function () {
    if (Auth::check() && Auth::user()->isAdmin()) {
        return view('admin.admin')->with('msg', 'chào mừng bạn quay lại');
    } else {
        return back()->with('error', 'Bạn không được cấp quyền truy cập.');
    }
})->middleware(['auth', 'verified'])->name('admin-index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
require __DIR__.'/admin/web.php';
require __DIR__.'/client/web.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
