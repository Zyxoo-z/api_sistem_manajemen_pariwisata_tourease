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
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (JWT)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:api')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | AUTH
    |--------------------------------------------------------------------------
    */
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

    /*
    |--------------------------------------------------------------------------
    | DESTINASI
    |--------------------------------------------------------------------------
    */
    Route::get('/destinasi', [DestinasiController::class, 'index']);
    Route::post('/destinasi', [DestinasiController::class, 'store']);
    Route::get('/destinasi/{id}', [DestinasiController::class, 'show']);
    Route::put('/destinasi/{id}', [DestinasiController::class, 'update']);
    Route::delete('/destinasi/{id}', [DestinasiController::class, 'destroy']);

    // relasi destinasi -> paket
    Route::get('/destinasi/{id}/paket', [DestinasiController::class, 'paketByDestinasi']);

    /*
    |--------------------------------------------------------------------------
    | PAKET
    |--------------------------------------------------------------------------
    */
    Route::get('/paket', [PaketController::class, 'index']);
    Route::post('/paket', [PaketController::class, 'store']);
    Route::get('/paket/{id}', [PaketController::class, 'show']);
    Route::put('/paket/{id}', [PaketController::class, 'update']);
    Route::delete('/paket/{id}', [PaketController::class, 'destroy']);

    // relasi paket -> booking
    Route::get('/paket/{id}/booking', [PaketController::class, 'bookingByPaket']);

    /*
    |--------------------------------------------------------------------------
    | BOOKING
    |--------------------------------------------------------------------------
    */
    Route::get('/booking', [BookingController::class, 'index']);
    Route::post('/booking', [BookingController::class, 'store']);
    Route::get('/booking/{id}', [BookingController::class, 'show']);
    Route::put('/booking/{id}', [BookingController::class, 'update']);
    Route::delete('/booking/{id}', [BookingController::class, 'destroy']);

    // relasi booking
    Route::get('/booking/user/{user_id}', [BookingController::class, 'getByUser']);
    Route::get('/my-booking', [BookingController::class, 'myBooking']);
    Route::get('/booking/{id}/review', [BookingController::class, 'reviewByBooking']);
    Route::get('/booking/{id}/payment', [BookingController::class, 'paymentByBooking']);

    /*
    |--------------------------------------------------------------------------
    | REVIEW
    |--------------------------------------------------------------------------
    */
    Route::get('/review', [ReviewController::class, 'index']);
    Route::post('/review', [ReviewController::class, 'store']);
    Route::get('/review/{id}', [ReviewController::class, 'show']);
    Route::put('/review/{id}', [ReviewController::class, 'update']);
    Route::delete('/review/{id}', [ReviewController::class, 'destroy']);

    // relasi review
    Route::get('/review/user/{user_id}', [ReviewController::class, 'getByUser']);
    Route::get('/review/booking/{booking_id}', [ReviewController::class, 'getByBooking']);

    /*
    |--------------------------------------------------------------------------
    | PAYMENT
    |--------------------------------------------------------------------------
    */
    Route::get('/payment', [PaymentController::class, 'index']);
    Route::post('/payment', [PaymentController::class, 'store']);
    Route::get('/payment/{id}', [PaymentController::class, 'show']);
    Route::put('/payment/{id}', [PaymentController::class, 'update']);
    Route::delete('/payment/{id}', [PaymentController::class, 'destroy']);

    // relasi payment
    Route::get('/payment/booking/{booking_id}', [PaymentController::class, 'getByBooking']);
});