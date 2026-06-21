<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::with('destinasi')->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Data paket berhasil diambil',
            'data' => $paket
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'destinasi_id' => 'required|exists:destinasis,id',
            'nama_paket' => 'required|string|max:255',
            'durasi' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
        ]);

        $paket = Paket::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Paket berhasil ditambahkan',
            'data' => $paket
        ], 201);
    }

    public function show(string $id)
    {
        $paket = Paket::with('destinasi')->find($id);

        if (!$paket) {
            return response()->json([
                'success' => false,
                'message' => 'Paket tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail paket berhasil diambil',
            'data' => $paket
        ]);
    }

    public function update(Request $request, string $id)
    {
        $paket = Paket::find($id);

        if (!$paket) {
            return response()->json([
                'success' => false,
                'message' => 'Paket tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'destinasi_id' => 'required|exists:destinasis,id',
            'nama_paket' => 'required|string|max:255',
            'durasi' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
        ]);

        $paket->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Paket berhasil diupdate',
            'data' => $paket
        ]);
    }

    public function destroy(string $id)
    {
        $paket = Paket::find($id);

        if (!$paket) {
            return response()->json([
                'success' => false,
                'message' => 'Paket tidak ditemukan'
            ], 404);
        }

        $paket->delete();

        return response()->json([
            'success' => true,
            'message' => 'Paket berhasil dihapus'
        ]);
    }
}