<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use Illuminate\Http\Request;

class PeralatanController extends Controller
{
    // Daftar peralatan
    public function index(Request $request)
    {
        $status = $request->get('status', 'tersedia');
        $peralatan = Peralatan::where('status', $status)
                              ->orderBy('created_at', 'desc')
                              ->paginate(15);

        return view('peralatan.index', [
            'peralatan' => $peralatan,
            'status' => $status,
        ]);
    }

    // Form tambah peralatan
    public function create()
    {
        return view('peralatan.create');
    }

    // Simpan peralatan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_peralatan' => 'required|string|max:255',
            'kode_peralatan' => 'required|string|unique:peralatan',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string|max:255',
            'merek' => 'nullable|string|max:255',
            'tanggal_perolehan' => 'required|date',
            'tanggal_maintenance' => 'nullable|date',
            'lokasi_penyimpanan' => 'required|string|max:255',
            'status' => 'nullable|in:tersedia,rusak,hilang',
        ]);

        // Set default status ke 'tersedia' jika tidak ada
        $validated['status'] = $validated['status'] ?? 'tersedia';

        Peralatan::create($validated);

        return redirect()->route('peralatan.index')
                        ->with('success', 'Peralatan berhasil ditambahkan');
    }

    // Form edit peralatan
    public function edit(Peralatan $peralatan)
    {
        return view('peralatan.edit', ['peralatan' => $peralatan]);
    }

    // Update peralatan
    public function update(Request $request, Peralatan $peralatan)
    {
        $validated = $request->validate([
            'nama_peralatan' => 'required|string|max:255',
            'kode_peralatan' => 'required|string|unique:peralatan,kode_peralatan,' . $peralatan->id,
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string|max:255',
            'merek' => 'nullable|string|max:255',
            'tanggal_perolehan' => 'required|date',
            'tanggal_maintenance' => 'nullable|date',
            'lokasi_penyimpanan' => 'required|string|max:255',
            'status' => 'required|in:tersedia,rusak,hilang',
        ]);

        $peralatan->update($validated);

        return redirect()->route('peralatan.index')
                        ->with('success', 'Peralatan berhasil diperbarui');
    }

    // Hapus peralatan
    public function destroy(Peralatan $peralatan)
    {
        $peralatan->delete();

        return redirect()->route('peralatan.index')
                        ->with('success', 'Peralatan berhasil dihapus');
    }
}
