<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::with(['user', 'paket.destinasi', 'payment', 'reviews'])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data booking berhasil diambil',
            'data' => $booking
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'paket_id' => 'required|exists:pakets,id',
            'tanggal_booking' => 'required|date',
            'jumlah_peserta' => 'required|integer|min:1',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $paket = Paket::findOrFail($validated['paket_id']);
        $totalHarga = $paket->harga * $validated['jumlah_peserta'];

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'paket_id' => $validated['paket_id'],
            'tanggal_booking' => $validated['tanggal_booking'],
            'jumlah_peserta' => $validated['jumlah_peserta'],
            'total_harga' => $totalHarga,
            'status' => $validated['status'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking berhasil ditambahkan',
            'data' => $booking->load(['user', 'paket.destinasi'])
        ], 201);
    }

    public function show(string $id)
    {
        $booking = Booking::with(['user', 'paket.destinasi', 'payment', 'reviews'])
            ->find($id);

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail booking berhasil diambil',
            'data' => $booking
        ]);
    }

    public function update(Request $request, string $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'paket_id' => 'required|exists:pakets,id',
            'tanggal_booking' => 'required|date',
            'jumlah_peserta' => 'required|integer|min:1',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $paket = Paket::findOrFail($validated['paket_id']);
        $totalHarga = $paket->harga * $validated['jumlah_peserta'];

        $booking->update([
            'paket_id' => $validated['paket_id'],
            'tanggal_booking' => $validated['tanggal_booking'],
            'jumlah_peserta' => $validated['jumlah_peserta'],
            'total_harga' => $totalHarga,
            'status' => $validated['status'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking berhasil diupdate',
            'data' => $booking->load(['user', 'paket.destinasi'])
        ]);
    }

    public function destroy(string $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking tidak ditemukan'
            ], 404);
        }

        $booking->delete();

        return response()->json([
            'success' => true,
            'message' => 'Booking berhasil dihapus'
        ]);
    }
    public function getByUser($user_id)
{
    $booking = Booking::with(['user', 'paket.destinasi', 'payment', 'reviews'])
        ->where('user_id', $user_id)
        ->latest()
        ->get();

    if ($booking->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'Booking untuk user ini tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Data booking berdasarkan user berhasil diambil',
        'data' => $booking
    ]);
}

public function myBooking()
{
    $booking = Booking::with(['user', 'paket.destinasi', 'payment', 'reviews'])
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return response()->json([
        'success' => true,
        'message' => 'Data booking user login berhasil diambil',
        'data' => $booking
    ]);
}

public function reviewByBooking($id)
{
    $booking = Booking::with(['reviews.user'])->find($id);

    if (!$booking) {
        return response()->json([
            'success' => false,
            'message' => 'Booking tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Data review berdasarkan booking berhasil diambil',
        'data' => $booking
    ]);
}

public function paymentByBooking($id)
{
    $booking = Booking::with(['payment'])->find($id);

    if (!$booking) {
        return response()->json([
            'success' => false,
            'message' => 'Booking tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Data payment berdasarkan booking berhasil diambil',
        'data' => $booking
    ]);
}
    
}