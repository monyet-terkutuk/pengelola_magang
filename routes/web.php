<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\DashboardController;

// Halaman Utama
Route::get('/', function () {
    return view('auth.login');
});



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// Dashboard Route, hanya untuk yang sudah login
// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Routes untuk CRUD Divisions
Route::resource('divisions', DivisionController::class)->middleware(['auth', 'verified']);

Route::resource('internships', InternshipController::class)->middleware(['auth', 'verified']);

// Routes untuk Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
