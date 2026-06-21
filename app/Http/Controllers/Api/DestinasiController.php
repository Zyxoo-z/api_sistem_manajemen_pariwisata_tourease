<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinasi = Destinasi::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Data destinasi berhasil diambil',
            'data' => $destinasi
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_destinasi' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_tiket' => 'required|numeric|min:0',
        ]);

        $destinasi = Destinasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Destinasi berhasil ditambahkan',
            'data' => $destinasi
        ], 201);
    }

    public function show(string $id)
    {
        $destinasi = Destinasi::find($id);

        if (!$destinasi) {
            return response()->json([
                'success' => false,
                'message' => 'Destinasi tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail destinasi berhasil diambil',
            'data' => $destinasi
        ]);
    }

    public function update(Request $request, string $id)
    {
        $destinasi = Destinasi::find($id);

        if (!$destinasi) {
            return response()->json([
                'success' => false,
                'message' => 'Destinasi tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nama_destinasi' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_tiket' => 'required|numeric|min:0',
        ]);

        $destinasi->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Destinasi berhasil diupdate',
            'data' => $destinasi
        ]);
    }

    public function destroy(string $id)
    {
        $destinasi = Destinasi::find($id);

        if (!$destinasi) {
            return response()->json([
                'success' => false,
                'message' => 'Destinasi tidak ditemukan'
            ], 404);
        }

        $destinasi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Destinasi berhasil dihapus'
        ]);
    }
    public function paketByDestinasi($id)
{
    $destinasi = Destinasi::with('pakets')->find($id);

    if (!$destinasi) {
        return response()->json([
            'success' => false,
            'message' => 'Destinasi tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Data paket berdasarkan destinasi berhasil diambil',
        'data' => $destinasi
    ]);
}
}