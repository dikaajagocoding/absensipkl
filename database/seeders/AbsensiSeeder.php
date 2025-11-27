<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Absensi;
use App\Models\PesertaPkl;
use Carbon\Carbon;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pesertaPkl = PesertaPkl::all();
        
        // Buat data absensi untuk bulan ini
        $today = Carbon::now();
        $startOfMonth = $today->clone()->startOfMonth();
        $endOfMonth = $today->clone()->endOfMonth();
        
        $statuses = ['hadir', 'hadir', 'hadir', 'hadir', 'sakit', 'izin', 'alpa'];
        
        for ($date = $startOfMonth->clone(); $date <= $endOfMonth; $date->addDay()) {
            // Skip weekends (Sabtu & Minggu)
            if ($date->dayOfWeek == 0 || $date->dayOfWeek == 6) {
                continue;
            }
            
            foreach ($pesertaPkl as $peserta) {
                // Probabilitas: 80% hadir, 10% sakit, 5% izin, 5% alpa
                $rand = rand(1, 100);
                if ($rand <= 80) {
                    $status = 'hadir';
                } elseif ($rand <= 90) {
                    $status = 'sakit';
                } elseif ($rand <= 95) {
                    $status = 'izin';
                } else {
                    $status = 'alpa';
                }
                
                // Cek apakah sudah ada data di hari ini
                $exists = Absensi::where('peserta_pkl_id', $peserta->id)
                    ->whereDate('tanggal', $date)
                    ->exists();
                
                if (!$exists) {
                    Absensi::create([
                        'peserta_pkl_id' => $peserta->id,
                        'tanggal' => $date->toDateString(),
                        'jam_masuk' => $status == 'hadir' ? '08:00' : null,
                        'jam_keluar' => $status == 'hadir' ? '16:00' : null,
                        'status' => $status,
                        'keterangan' => $status == 'sakit' ? 'Sakit (ada surat)' : ($status == 'izin' ? 'Izin keluarga' : ''),
                    ]);
                }
            }
        }
    }
}
