<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DestinasiController;
use App\Http\Controllers\Api\PaketController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\PaymentController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Protected Routes (JWT)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->group(function () {

    // Auth
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

    // Destinasi
    // Route::apiResource('destinasi', DestinasiController::class);

    // Paket
    // Route::apiResource('paket', PaketController::class);

    // Booking
    // Route::apiResource('booking', BookingController::class);

    // Review
    // Route::apiResource('review', ReviewController::class);

    // Payment
    // Route::apiResource('payment', PaymentController::class);

});