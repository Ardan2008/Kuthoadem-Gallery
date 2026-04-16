<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use Illuminate\Session\Middleware\StartSession;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Gunakan format array secara konsisten
Route::post('login', [AuthController::class, 'login']);
Route::middleware([StartSession::class])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('auth', [AuthController::class, 'index']);
Route::post('auth', [AuthController::class, 'store']);
Route::put('auth/{id}', [AuthController::class, 'update']);
Route::delete('auth/{id}', [AuthController::class, 'destroy']);