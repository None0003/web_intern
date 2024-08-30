<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

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

Route::middleware('web')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::get('/user', [AuthController::class, 'me']);
});

Route::prefix('posts')->group(function() {
    Route::get('/', [PostController::class, 'index']);
    Route::post('/', [PostController::class, 'store']);
    Route::get('/id={id}', [PostController::class, 'showByID']);
    Route::get('/{slug}', [PostController::class, 'showBySlug']);
    Route::put('/{slug}', [PostController::class, 'update']);
    Route::delete('/{slug}', [PostController::class, 'destroy']);
});

// Route::prefix('posts')->middleware('web')->group(function () {
    
// });


