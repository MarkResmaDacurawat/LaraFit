<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodLogController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ProfileController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


Route::prefix('activities')->middleware('auth')->group(function () {
    Route::get('/', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/store', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('/{id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
    Route::put('/{id}/update', [ActivityController::class, 'update'])->name('activities.update');
    Route::delete('/{id}/delete', [ActivityController::class, 'destroy'])->name('activities.destroy');
});

Route::prefix('workouts')->middleware('auth')->group(function () {
    Route::get('/', [WorkoutController::class, 'index'])->name('workouts.index');
    Route::get('/create', [WorkoutController::class, 'create'])->name('workouts.create');
    Route::post('/store', [WorkoutController::class, 'store'])->name('workouts.store');
    Route::get('/{id}/edit', [WorkoutController::class, 'edit'])->name('workouts.edit');
    Route::put('/{id}/update', [WorkoutController::class, 'update'])->name('workouts.update');
    Route::delete('/{id}/delete', [WorkoutController::class, 'destroy'])->name('workouts.destroy');
});

Route::prefix('goals')->middleware('auth')->group(function () {
    Route::get('/', [GoalController::class, 'index'])->name('goals.index');
    Route::get('/create', [GoalController::class, 'create'])->name('goals.create');
    Route::post('/store', [GoalController::class, 'store'])->name('goals.store');
    Route::get('/{goal}/edit', [GoalController::class, 'edit'])->name('goals.edit');
    Route::patch('/{goal}', [GoalController::class, 'update'])->name('goals.update');
    Route::delete('/{id}/delete', [GoalController::class, 'destroy'])->name('goals.destroy');
});

Route::prefix('food_logs')->middleware('auth')->group(function () {
    Route::get('/', [FoodLogController::class, 'index'])->name('food_logs.index');
    Route::get('/create', [FoodLogController::class, 'create'])->name('food_logs.create');
    Route::post('/store', [FoodLogController::class, 'store'])->name('food_logs.store');
    Route::get('/{foodLog}/edit', [FoodLogController::class, 'edit'])->name('food_logs.edit');
    Route::put('/{id}/update', [FoodLogController::class, 'update'])->name('food_logs.update');
    Route::delete('/{id}/delete', [FoodLogController::class, 'destroy'])->name('food_logs.destroy');
});