<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::prefix('activities')->middleware('auth')->group(function () {
    Route::get('/', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/create', [ActivityController::class, 'create'])->name('activities.create');
});

Route::get('/goals', function () {
    return view('pages.goals');
})->name('goals');

Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile');