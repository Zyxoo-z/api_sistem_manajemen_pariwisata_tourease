<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::with(['booking.user', 'booking.paket'])->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Data payment berhasil diambil',
            'data' => $payment
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'metode_pembayaran' => 'required|string|max:100',
            'jumlah_bayar' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'status_pembayaran' => 'required|in:pending,paid,failed',
        ]);

        $payment = Payment::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Payment berhasil ditambahkan',
            'data' => $payment->load(['booking.user', 'booking.paket'])
        ], 201);
    }

    public function show(string $id)
    {
        $payment = Payment::with(['booking.user', 'booking.paket'])->find($id);

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail payment berhasil diambil',
            'data' => $payment
        ]);
    }

    public function update(Request $request, string $id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'metode_pembayaran' => 'required|string|max:100',
            'jumlah_bayar' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'status_pembayaran' => 'required|in:pending,paid,failed',
        ]);

        $payment->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Payment berhasil diupdate',
            'data' => $payment->load(['booking.user', 'booking.paket'])
        ]);
    }

    public function destroy(string $id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment tidak ditemukan'
            ], 404);
        }

        $payment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Payment berhasil dihapus'
        ]);
    }
    public function getByBooking($booking_id)
{
    $payment = Payment::with(['booking.user', 'booking.paket'])
        ->where('booking_id', $booking_id)
        ->latest()
        ->get();

    if ($payment->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'Payment booking tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Data payment berdasarkan booking berhasil diambil',
        'data' => $payment
    ]);
}
}