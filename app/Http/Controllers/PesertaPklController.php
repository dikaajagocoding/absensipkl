<?php

namespace App\Http\Controllers;

use App\Models\PesertaPkl;
use Illuminate\Http\Request;

class PesertaPklController extends Controller
{
    // Daftar peserta
    public function index(Request $request)
    {
        $status = $request->get('status', 'aktif');
        $pesertaPkl = PesertaPkl::where('status', $status)
                                ->orderBy('created_at', 'desc')
                                ->paginate(15);

        return view('peserta-pkl.index', [
            'pesertaPkl' => $pesertaPkl,
            'status' => $status,
        ]);
    }

    // Form tambah peserta
    public function create()
    {
        return view('peserta-pkl.create');
    }

    // Simpan peserta baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_induk' => 'required|string|unique:peserta_pkl',
            'sekolah' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'pembimbing' => 'nullable|string|max:255',
        ]);

        PesertaPkl::create($validated);

        return redirect()->route('peserta-pkl.index')
                        ->with('success', 'Peserta PKL berhasil ditambahkan');
    }

    // Form edit peserta
    public function edit(PesertaPkl $pesertaPkl)
    {
        return view('peserta-pkl.edit', ['pesertaPkl' => $pesertaPkl]);
    }

    // Update peserta
    public function update(Request $request, PesertaPkl $pesertaPkl)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_induk' => 'required|string|unique:peserta_pkl,nomor_induk,' . $pesertaPkl->id,
            'sekolah' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'pembimbing' => 'nullable|string|max:255',
            'status' => 'required|in:aktif,selesai,berhenti',
        ]);

        $pesertaPkl->update($validated);

        return redirect()->route('peserta-pkl.index')
                        ->with('success', 'Data peserta berhasil diperbarui');
    }

    // Hapus peserta
    public function destroy(PesertaPkl $pesertaPkl)
    {
        $pesertaPkl->delete();

        return redirect()->route('peserta-pkl.index')
                        ->with('success', 'Peserta berhasil dihapus');
    }
}
