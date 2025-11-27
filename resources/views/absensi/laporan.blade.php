@extends('layouts.app')

@section('title', 'Laporan Absensi')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">📊 Laporan Absensi</h5>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-4">
            <div class="row align-items-end">
                <div class="col-md-4">
                    <label for="bulan" class="form-label">Pilih Bulan</label>
                    <input type="month" name="bulan" id="bulan" class="form-control" value="{{ $bulan }}" onchange="this.form.submit()">
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-success" onclick="window.print()">🖨️ Cetak Laporan</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th>Nama Peserta</th>
                        <th>No. Induk</th>
                        <th style="text-align: center">Hadir</th>
                        <th style="text-align: center">Sakit</th>
                        <th style="text-align: center">Izin</th>
                        <th style="text-align: center">Alpa</th>
                        <th style="text-align: center">Total Hari Kerja</th>
                        <th style="text-align: center">Presentase</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporan as $index => $item)
                        @php
                            $totalKehadiran = $item['hadir'] + $item['sakit'] + $item['izin'];
                            $presentase = $item['total_hari_kerja'] > 0 ? round(($item['hadir'] / $item['total_hari_kerja']) * 100, 2) : 0;
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['peserta']->nama }}</td>
                            <td>{{ $item['peserta']->nomor_induk }}</td>
                            <td style="text-align: center; background-color: #d4edda"><strong>{{ $item['hadir'] }}</strong></td>
                            <td style="text-align: center; background-color: #fff3cd"><strong>{{ $item['sakit'] }}</strong></td>
                            <td style="text-align: center; background-color: #d1ecf1"><strong>{{ $item['izin'] }}</strong></td>
                            <td style="text-align: center; background-color: #f8d7da"><strong>{{ $item['alpa'] }}</strong></td>
                            <td style="text-align: center"><strong>{{ $item['total_hari_kerja'] }}</strong></td>
                            <td style="text-align: center">
                                @if($presentase >= 80)
                                    <span class="badge bg-success">{{ $presentase }}%</span>
                                @elseif($presentase >= 60)
                                    <span class="badge bg-warning">{{ $presentase }}%</span>
                                @else
                                    <span class="badge bg-danger">{{ $presentase }}%</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-3">
                                Tidak ada data absensi untuk bulan yang dipilih
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <h6>Keterangan:</h6>
            <ul>
                <li><strong>Presentase</strong> = (Hadir / Total Hari Kerja) × 100%</li>
                <li><strong>Total Hari Kerja</strong> = Jumlah hari Senin - Jumat dalam bulan tersebut</li>
                <li>Data ditampilkan untuk peserta PKL yang masih <strong>aktif</strong></li>
            </ul>
        </div>
    </div>
</div>

<style media="print">
    .sidebar, .navbar, button, form {
        display: none !important;
    }
    .main-content {
        padding: 0 !important;
    }
</style>
@endsection
