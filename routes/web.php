<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

// Registration
Route::get('/register', function () {
    return view('register');
})->name('register-page');
Route::post('/register', [AuthController::class, 'register'])->name('register');



// Login Logout
Route::get('/login', function () {
    return view('login');
})->name('login-page');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Forgot Password
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

// Reset Password
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');



// User only routes
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/userDashboard', function () {
        return view('userDashboard');
    })->name('userDashboard');
});



// Admin only routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminDashboard', function () {
        return view('adminDashboard');
    })->name('adminDashboard');
});

