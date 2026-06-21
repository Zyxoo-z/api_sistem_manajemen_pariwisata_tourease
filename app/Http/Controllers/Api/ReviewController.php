<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $review = Review::with(['user', 'booking'])->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Data review berhasil diambil',
            'data' => $review
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
        ]);

        $review = Review::create([
            'booking_id' => $validated['booking_id'],
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'komentar' => $validated['komentar'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review berhasil ditambahkan',
            'data' => $review->load(['user', 'booking'])
        ], 201);
    }

    public function show(string $id)
    {
        $review = Review::with(['user', 'booking'])->find($id);

        if (!$review) {
            return response()->json([
                'success' => false,
                'message' => 'Review tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail review berhasil diambil',
            'data' => $review
        ]);
    }

    public function update(Request $request, string $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'success' => false,
                'message' => 'Review tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
        ]);

        $review->update([
            'booking_id' => $validated['booking_id'],
            'rating' => $validated['rating'],
            'komentar' => $validated['komentar'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review berhasil diupdate',
            'data' => $review->load(['user', 'booking'])
        ]);
    }

    public function destroy(string $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'success' => false,
                'message' => 'Review tidak ditemukan'
            ], 404);
        }

        $review->delete();

        return response()->json([
            'success' => true,
            'message' => 'Review berhasil dihapus'
        ]);
    }
    public function getByUser($user_id)
{
    $review = Review::with(['user', 'booking'])
        ->where('user_id', $user_id)
        ->latest()
        ->get();

    if ($review->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'Review user tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Data review berdasarkan user berhasil diambil',
        'data' => $review
    ]);
}

public function getByBooking($booking_id)
{
    $review = Review::with(['user', 'booking'])
        ->where('booking_id', $booking_id)
        ->latest()
        ->get();

    if ($review->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'Review booking tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Data review berdasarkan booking berhasil diambil',
        'data' => $review
    ]);
}
}