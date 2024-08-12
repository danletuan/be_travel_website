<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ForgotPasswordController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
});


Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
Route::post('/token', [ForgotPasswordController::class, 'checkToken']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);

// Lấy toàn bộ bài viết
Route::get('/posts', [NewsController::class, 'index']);
// Lấy chi tiết bài viết
Route::get('/posts/{id}', [NewsController::class, 'show']);
// Lấy bài viết theo status
Route::get('/posts/status/{status}', [NewsController::class, 'getPostsByStatus']);
// Thêm bài viết
Route::post('/posts', [NewsController::class, 'store']);
// Sửa bài viết thông thường
Route::put('/posts/{id}', [NewsController::class, 'update']);
// Sửa bài viết và lưu nháp
Route::put('/posts/draft/{id}', [NewsController::class, 'updateDraft']);



