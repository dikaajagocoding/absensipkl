<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Peralatan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    // Halaman daftar peminjaman
    public function index(Request $request)
    {
        $peralatan = Peralatan::where('status', 'tersedia')->get();
        $selectedPeralatan = $request->get('peralatan_id');
        $status = $request->get('status', 'dipinjam');
        
        $peminjaman = Peminjaman::query();
        
        if ($selectedPeralatan) {
            $peminjaman->where('peralatan_id', $selectedPeralatan);
        }
        
        if ($status) {
            $peminjaman->where('status', $status);
        }
        
        $peminjaman = $peminjaman->orderBy('tanggal_peminjaman', 'desc')
                                 ->paginate(20);
        
        return view('peminjaman.index', [
            'peminjaman' => $peminjaman,
            'peralatan' => $peralatan,
            'selectedPeralatan' => $selectedPeralatan,
            'status' => $status,
        ]);
    }

    // Halaman input peminjaman
    public function create()
    {
        $peralatan = Peralatan::where('status', 'tersedia')->get();
        return view('peminjaman.create', ['peralatan' => $peralatan]);
    }

    // Simpan peminjaman baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'peralatan_id' => 'required|exists:peralatan,id',
            'peminjam_nama' => 'required|string|max:255',
            'peminjam_no_induk' => 'required|string|max:255',
            'tanggal_peminjaman' => 'required|date',
            'keperluan' => 'nullable|string',
            'status' => 'required|in:dipinjam,dikembalikan',
            'catatan' => 'nullable|string',
        ]);

        Peminjaman::create($validated);

        return redirect()->route('peminjaman.index')
                        ->with('success', 'Peminjaman berhasil dicatat');
    }

    // Edit peminjaman
    public function edit(Peminjaman $peminjaman)
    {
        $peralatan = Peralatan::where('status', 'tersedia')->get();
        return view('peminjaman.edit', [
            'peminjaman' => $peminjaman,
            'peralatan' => $peralatan,
        ]);
    }

    // Update peminjaman
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'peralatan_id' => 'required|exists:peralatan,id',
            'peminjam_nama' => 'required|string|max:255',
            'peminjam_no_induk' => 'required|string|max:255',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'nullable|date|after_or_equal:tanggal_peminjaman',
            'keperluan' => 'nullable|string',
            'status' => 'required|in:dipinjam,dikembalikan',
            'catatan' => 'nullable|string',
        ]);

        $peminjaman->update($validated);

        return redirect()->route('peminjaman.index')
                        ->with('success', 'Peminjaman berhasil diperbarui');
    }

    // Hapus peminjaman
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')
                        ->with('success', 'Data peminjaman berhasil dihapus');
    }

    // Laporan peminjaman
    public function laporan(Request $request)
    {
        $peralatan = Peralatan::all();
        $selectedPeralatan = $request->get('peralatan_id');
        
        $peminjaman = Peminjaman::query();
        
        if ($selectedPeralatan) {
            $peminjaman->where('peralatan_id', $selectedPeralatan);
        }
        
        $peminjaman = $peminjaman->orderBy('tanggal_peminjaman', 'desc')->get();
        
        return view('peminjaman.laporan', [
            'peminjaman' => $peminjaman,
            'peralatan' => $peralatan,
            'selectedPeralatan' => $selectedPeralatan,
        ]);
    }
}
