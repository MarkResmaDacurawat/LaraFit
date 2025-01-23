<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('auth.showLogin');
Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
