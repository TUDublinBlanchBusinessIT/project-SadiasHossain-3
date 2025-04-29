<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Home
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
// Registration Routes
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);  // POST for storing the new user

// Login Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// Logout - POST (secure method)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Optional: Prevent accidental GET logout route access
Route::get('/logout', function () {
    return redirect('/login');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Jobs routes (only for authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::resource('jobs', JobController::class)->names([
        'index'   => 'jobs.index',
        'create'  => 'jobs.create',
        'store'   => 'jobs.store',
        'edit'    => 'jobs.edit',
        'update'  => 'jobs.update',
        'show'    => 'jobs.show',
        'destroy' => 'jobs.destroy',
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('notes', App\Http\Controllers\NoteController::class)->names([
        'index' => 'notes.index',
        'create' => 'notes.create',
        'store' => 'notes.store',
        'edit' => 'notes.edit',
        'update' => 'notes.update',
        'show' => 'notes.show',
        'destroy' => 'notes.destroy',
    ]);
});

// Notes routes (protected)
Route::middleware(['auth'])->group(function () {
    Route::resource('notes', NoteController::class)->middleware('auth');

});