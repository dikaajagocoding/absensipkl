<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peminjaman;
use App\Models\Peralatan;
use Carbon\Carbon;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peralatan = Peralatan::all();
        
        $peminjaman_data = [
            [
                'peralatan_id' => 1,
                'peminjam_nama' => 'Kapten Bambang Suryanto',
                'peminjam_no_induk' => '12345001',
                'tanggal_peminjaman' => Carbon::parse('2025-11-15'),
                'tanggal_pengembalian' => Carbon::parse('2025-11-25'),
                'keperluan' => 'Presentasi briefing operasional',
                'status' => 'dikembalikan',
                'catatan' => 'Baik, tidak ada masalah',
            ],
            [
                'peralatan_id' => 2,
                'peminjam_nama' => 'Sersan Joni Maulana',
                'peminjam_no_induk' => '12345002',
                'tanggal_peminjaman' => Carbon::parse('2025-11-20'),
                'tanggal_pengembalian' => null,
                'keperluan' => 'Briefing training TNI',
                'status' => 'dipinjam',
                'catatan' => 'Digunakan untuk training internal',
            ],
            [
                'peralatan_id' => 3,
                'peminjam_nama' => 'Kopral Rini Handoko',
                'peminjam_no_induk' => '12345003',
                'tanggal_peminjaman' => Carbon::parse('2025-11-10'),
                'tanggal_pengembalian' => Carbon::parse('2025-11-15'),
                'keperluan' => 'Cetak dokumen administratif',
                'status' => 'dikembalikan',
                'catatan' => 'Kelancaran cetak terjaga',
            ],
            [
                'peralatan_id' => 4,
                'peminjam_nama' => 'Mayor Ahmad Hidayat',
                'peminjam_no_induk' => '12345004',
                'tanggal_peminjaman' => Carbon::parse('2025-11-22'),
                'tanggal_pengembalian' => null,
                'keperluan' => 'Operasional patroli keamanan',
                'status' => 'dipinjam',
                'catatan' => 'Perjalanan dinas ke Bandung',
            ],
            [
                'peralatan_id' => 5,
                'peminjam_nama' => 'Sersan Budi Santoso',
                'peminjam_no_induk' => '12345005',
                'tanggal_peminjaman' => Carbon::parse('2025-11-18'),
                'tanggal_pengembalian' => Carbon::parse('2025-11-25'),
                'keperluan' => 'Patroli rutin wilayah',
                'status' => 'dikembalikan',
                'catatan' => 'Motor dalam kondisi baik',
            ],
            [
                'peralatan_id' => 6,
                'peminjam_nama' => 'Letnan Siti Nurhaliza',
                'peminjam_no_induk' => '12345006',
                'tanggal_peminjaman' => Carbon::parse('2025-11-20'),
                'tanggal_pengembalian' => null,
                'keperluan' => 'Penggunaan ruang kerja baru',
                'status' => 'dipinjam',
                'catatan' => 'Meja kerja untuk divisi baru',
            ],
            [
                'peralatan_id' => 7,
                'peminjam_nama' => 'Kopral Rina Wijaya',
                'peminjam_no_induk' => '12345007',
                'tanggal_peminjaman' => Carbon::parse('2025-11-19'),
                'tanggal_pengembalian' => Carbon::parse('2025-11-25'),
                'keperluan' => 'Ruang rapat sementara',
                'status' => 'dikembalikan',
                'catatan' => 'Kursi dalam kondisi baik',
            ],
            [
                'peralatan_id' => 8,
                'peminjam_nama' => 'Kapten Yonif 407',
                'peminjam_no_induk' => '12345008',
                'tanggal_peminjaman' => Carbon::parse('2025-11-01'),
                'tanggal_pengembalian' => null,
                'keperluan' => 'Penyimpanan dokumen rahasia',
                'status' => 'dipinjam',
                'catatan' => 'Penggunaan permanen untuk arsip',
            ],
            [
                'peralatan_id' => 9,
                'peminjam_nama' => 'Serda Handoko',
                'peminjam_no_induk' => '12345009',
                'tanggal_peminjaman' => Carbon::parse('2025-10-15'),
                'tanggal_pengembalian' => Carbon::parse('2025-10-20'),
                'keperluan' => 'Perjalanan dinas ke Jakarta',
                'status' => 'dikembalikan',
                'catatan' => 'Brankas berisi dokumen penting',
            ],
            [
                'peralatan_id' => 10,
                'peminjam_nama' => 'Kopral Mayor Suryanto',
                'peminjam_no_induk' => '12345010',
                'tanggal_peminjaman' => Carbon::parse('2025-11-01'),
                'tanggal_pengembalian' => null,
                'keperluan' => 'Kebutuhan operasional lapangan',
                'status' => 'dipinjam',
                'catatan' => 'Seragam untuk anggota baru',
            ],
        ];
        
        foreach ($peminjaman_data as $p) {
            Peminjaman::create($p);
        }
    }
}
