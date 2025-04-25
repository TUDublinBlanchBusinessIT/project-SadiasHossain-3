<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Home
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

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

