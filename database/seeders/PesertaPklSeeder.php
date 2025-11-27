<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PesertaPkl;
use Carbon\Carbon;

class PesertaPklSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peserta = [
            [
                'nama' => 'Ahmad Hidayat',
                'nomor_induk' => 'PKL001',
                'sekolah' => 'SMK Negeri 1 Garut',
                'jurusan' => 'Teknik Komputer dan Jaringan',
                'tanggal_mulai' => Carbon::parse('2025-01-13'),
                'tanggal_selesai' => Carbon::parse('2025-02-21'),
                'pembimbing' => 'Bapak Bambang',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'nomor_induk' => 'PKL002',
                'sekolah' => 'SMK Negeri 1 Garut',
                'jurusan' => 'Administrasi Perkantoran',
                'tanggal_mulai' => Carbon::parse('2025-01-13'),
                'tanggal_selesai' => Carbon::parse('2025-02-21'),
                'pembimbing' => 'Ibu Siti',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Budi Santoso',
                'nomor_induk' => 'PKL003',
                'sekolah' => 'SMK Negeri 2 Garut',
                'jurusan' => 'Teknik Mesin',
                'tanggal_mulai' => Carbon::parse('2025-01-13'),
                'tanggal_selesai' => Carbon::parse('2025-02-21'),
                'pembimbing' => 'Bapak Joni',
                'status' => 'aktif',
            ],
            [
                'nama' => 'Rina Wijaya',
                'nomor_induk' => 'PKL004',
                'sekolah' => 'SMK Negeri 1 Garut',
                'jurusan' => 'Farmasi',
                'tanggal_mulai' => Carbon::parse('2025-01-13'),
                'tanggal_selesai' => Carbon::parse('2025-02-21'),
                'pembimbing' => 'Ibu Rini',
                'status' => 'aktif',
            ],
        ];

        foreach ($peserta as $p) {
            PesertaPkl::create($p);
        }
    }
}
