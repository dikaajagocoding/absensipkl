<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\PesertaPkl;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    // Halaman daftar absensi
    public function index(Request $request)
    {
        $pesertaPkl = PesertaPkl::where('status', 'aktif')->get();
        $selectedPeserta = $request->get('peserta_id');
        $bulan = $request->get('bulan', Carbon::now()->format('Y-m'));
        
        $absensis = Absensi::query();
        
        if ($selectedPeserta) {
            $absensis->where('peserta_pkl_id', $selectedPeserta);
        }
        
        // Filter by month
        $absensis = $absensis->whereYear('tanggal', Carbon::parse($bulan . '-01')->year)
                 ->whereMonth('tanggal', Carbon::parse($bulan . '-01')->month)
                 ->orderBy('tanggal', 'desc')
                 ->paginate(20);
        
        return view('absensi.index', [
            'absensis' => $absensis,
            'pesertaPkl' => $pesertaPkl,
            'selectedPeserta' => $selectedPeserta,
            'bulan' => $bulan,
        ]);
    }

    // Halaman input absensi
    public function create()
    {
        $pesertaPkl = PesertaPkl::where('status', 'aktif')->get();
        return view('absensi.create', ['pesertaPkl' => $pesertaPkl]);
    }

    // Simpan absensi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'peserta_pkl_id' => 'required|exists:peserta_pkl,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'status' => 'required|in:hadir,sakit,izin,alpa',
            'keterangan' => 'nullable|string',
        ]);

        Absensi::create($validated);

        return redirect()->route('absensi.index')
                        ->with('success', 'Absensi berhasil dicatat');
    }

    // Edit absensi
    public function edit(Absensi $absensi)
    {
        $pesertaPkl = PesertaPkl::where('status', 'aktif')->get();
        return view('absensi.edit', [
            'absensi' => $absensi,
            'pesertaPkl' => $pesertaPkl,
        ]);
    }

    // Update absensi
    public function update(Request $request, Absensi $absensi)
    {
        $validated = $request->validate([
            'peserta_pkl_id' => 'required|exists:peserta_pkl,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'status' => 'required|in:hadir,sakit,izin,alpa',
            'keterangan' => 'nullable|string',
        ]);

        $absensi->update($validated);

        return redirect()->route('absensi.index')
                        ->with('success', 'Absensi berhasil diperbarui');
    }

    // Hapus absensi
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->route('absensi.index')
                        ->with('success', 'Absensi berhasil dihapus');
    }

    // Laporan absensi
    public function laporan(Request $request)
    {
        $pesertaPkl = PesertaPkl::where('status', 'aktif')->get();
        $bulan = $request->get('bulan', Carbon::now()->format('Y-m'));
        
        $laporan = [];
        
        foreach ($pesertaPkl as $peserta) {
            $absensis = Absensi::where('peserta_pkl_id', $peserta->id)
                ->whereYear('tanggal', Carbon::parse($bulan . '-01')->year)
                ->whereMonth('tanggal', Carbon::parse($bulan . '-01')->month)
                ->get();
            
            $laporan[] = [
                'peserta' => $peserta,
                'hadir' => $absensis->where('status', 'hadir')->count(),
                'sakit' => $absensis->where('status', 'sakit')->count(),
                'izin' => $absensis->where('status', 'izin')->count(),
                'alpa' => $absensis->where('status', 'alpa')->count(),
                'total_hari_kerja' => $this->countHariKerja($bulan),
            ];
        }
        
        return view('absensi.laporan', [
            'laporan' => $laporan,
            'bulan' => $bulan,
        ]);
    }

    private function countHariKerja($bulan)
    {
        $hariKerja = 0;
        $bulanObj = Carbon::parse($bulan . '-01');
        $daysInMonth = $bulanObj->daysInMonth;
        
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $date = Carbon::parse($bulan . '-' . str_pad($i, 2, '0', STR_PAD_LEFT));
            // Hitung hari kerja (Senin-Jumat)
            if ($date->dayOfWeek >= 1 && $date->dayOfWeek <= 5) {
                $hariKerja++;
            }
        }
        
        return $hariKerja;
    }
}
