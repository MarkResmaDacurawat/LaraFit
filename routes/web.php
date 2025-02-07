<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::prefix('activities')->middleware('auth')->group(function () {
    Route::get('/', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/store', [ActivityController::class, 'store'])->name('activities.store');
    Route::delete('/{id}/delete', [ActivityController::class, 'destroy'])->name('activities.destroy');
});

Route::prefix('workouts')->middleware('auth')->group(function () {
    Route::get('/', [WorkoutController::class, 'index'])->name('workouts.index');
    Route::get('/create', [WorkoutController::class, 'create'])->name('workouts.create');
    Route::post('/store', [WorkoutController::class, 'store'])->name('workouts.store');
    Route::delete('/{id}/delete', [WorkoutController::class, 'destroy'])->name('workouts.destroy');
});

Route::get('/goals', function () {
    return view('pages.goals');
})->name('goals');

Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile');