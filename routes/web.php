<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\NewsController;

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

// Đăng nhập
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Đăng xuất
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//  reset password
Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/{slug}', [NewsController::class, 'show'])->name('news.show');

