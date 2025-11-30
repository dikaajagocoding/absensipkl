<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peralatan;
use Carbon\Carbon;

class PeralatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peralatan = [
            [
                'nama_peralatan' => 'Laptop Dell XPS 13',
                'kode_peralatan' => 'LT001',
                'deskripsi' => 'Laptop untuk keperluan administrasi dan dokumentasi',
                'kategori' => 'Elektronik',
                'merek' => 'Dell',
                'tanggal_perolehan' => Carbon::parse('2023-05-15'),
                'tanggal_maintenance' => Carbon::parse('2025-06-15'),
                'lokasi_penyimpanan' => 'Ruang Administrasi',
                'status' => 'tersedia',
            ],
            [
                'nama_peralatan' => 'Proyektor Epson EB-S05',
                'kode_peralatan' => 'PR001',
                'deskripsi' => 'Proyektor untuk presentasi dan briefing',
                'kategori' => 'Elektronik',
                'merek' => 'Epson',
                'tanggal_perolehan' => Carbon::parse('2022-11-20'),
                'tanggal_maintenance' => Carbon::parse('2025-04-20'),
                'lokasi_penyimpanan' => 'Ruang Briefing',
                'status' => 'tersedia',
            ],
            [
                'nama_peralatan' => 'Printer HP LaserJet Pro',
                'kode_peralatan' => 'PR002',
                'deskripsi' => 'Printer untuk dokumen administratif',
                'kategori' => 'Elektronik',
                'merek' => 'HP',
                'tanggal_perolehan' => Carbon::parse('2023-02-10'),
                'tanggal_maintenance' => Carbon::parse('2025-08-10'),
                'lokasi_penyimpanan' => 'Ruang Administrasi',
                'status' => 'tersedia',
            ],
            [
                'nama_peralatan' => 'Kendaraan Operasional Hummer',
                'kode_peralatan' => 'KD001',
                'deskripsi' => 'Kendaraan operasional untuk mobilisasi',
                'kategori' => 'Kendaraan',
                'merek' => 'Hummer',
                'tanggal_perolehan' => Carbon::parse('2021-03-18'),
                'tanggal_maintenance' => Carbon::parse('2025-09-18'),
                'lokasi_penyimpanan' => 'Garasi Kendaraan',
                'status' => 'tersedia',
            ],
            [
                'nama_peralatan' => 'Kendaraan Roda Dua Motorbike',
                'kode_peralatan' => 'KD002',
                'deskripsi' => 'Sepeda motor untuk patroli',
                'kategori' => 'Kendaraan',
                'merek' => 'Honda',
                'tanggal_perolehan' => Carbon::parse('2023-07-22'),
                'tanggal_maintenance' => Carbon::parse('2025-07-22'),
                'lokasi_penyimpanan' => 'Garasi Kendaraan',
                'status' => 'tersedia',
            ],
            [
                'nama_peralatan' => 'Meja Kerja Besi',
                'kode_peralatan' => 'FR001',
                'deskripsi' => 'Meja kerja untuk kantor',
                'kategori' => 'Furnitur',
                'merek' => 'Lokal',
                'tanggal_perolehan' => Carbon::parse('2020-01-12'),
                'tanggal_maintenance' => null,
                'lokasi_penyimpanan' => 'Ruang Administrasi',
                'status' => 'tersedia',
            ],
            [
                'nama_peralatan' => 'Kursi Kantor Ergonomis',
                'kode_peralatan' => 'FR002',
                'deskripsi' => 'Kursi kantor untuk kenyamanan kerja',
                'kategori' => 'Furnitur',
                'merek' => 'Modern',
                'tanggal_perolehan' => Carbon::parse('2022-06-08'),
                'tanggal_maintenance' => null,
                'lokasi_penyimpanan' => 'Ruang Administrasi',
                'status' => 'tersedia',
            ],
            [
                'nama_peralatan' => 'Lemari Arsip Besi',
                'kode_peralatan' => 'FR003',
                'deskripsi' => 'Lemari untuk penyimpanan dokumen',
                'kategori' => 'Furnitur',
                'merek' => 'Lokal',
                'tanggal_perolehan' => Carbon::parse('2021-09-05'),
                'tanggal_maintenance' => null,
                'lokasi_penyimpanan' => 'Ruang Administrasi',
                'status' => 'tersedia',
            ],
            [
                'nama_peralatan' => 'Brankas Besi Pengaman',
                'kode_peralatan' => 'FW001',
                'deskripsi' => 'Brankas untuk menyimpan barang berharga',
                'kategori' => 'Keamanan',
                'merek' => 'Chubb',
                'tanggal_perolehan' => Carbon::parse('2021-12-01'),
                'tanggal_maintenance' => Carbon::parse('2025-12-01'),
                'lokasi_penyimpanan' => 'Ruang Kas',
                'status' => 'tersedia',
            ],
            [
                'nama_peralatan' => 'Seragam Dinas PDU',
                'kode_peralatan' => 'SR001',
                'deskripsi' => 'Seragam dinas untuk operasional lapangan',
                'kategori' => 'Perlengkapan',
                'merek' => 'TNI Standard',
                'tanggal_perolehan' => Carbon::parse('2024-01-10'),
                'tanggal_maintenance' => null,
                'lokasi_penyimpanan' => 'Gudang Perlengkapan',
                'status' => 'tersedia',
            ],
        ];

        foreach ($peralatan as $p) {
            Peralatan::create($p);
        }
    }
}
