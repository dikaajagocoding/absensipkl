@extends('layouts.app')

@section('title', 'Laporan Peminjaman')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">📊 Laporan Peminjaman Peralatan</h5>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="peralatan_id" class="form-label">Filter Peralatan</label>
                    <select name="peralatan_id" id="peralatan_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Peralatan</option>
                        @foreach($peralatan as $p)
                            <option value="{{ $p->id }}" @if($selectedPeralatan == $p->id) selected @endif>
                                {{ $p->nama_peralatan }} ({{ $p->kode_peralatan }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Peralatan</th>
                        <th>Peminjam</th>
                        <th>No. Induk</th>
                        <th>Tgl Peminjaman</th>
                        <th>Tgl Pengembalian</th>
                        <th>Durasi (hari)</th>
                        <th>Keperluan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman as $p)
                        <tr>
                            <td>
                                <strong>{{ $p->peralatan->nama_peralatan }}</strong><br>
                                <small class="text-muted">{{ $p->peralatan->kode_peralatan }}</small>
                            </td>
                            <td>{{ $p->peminjam_nama }}</td>
                            <td>{{ $p->peminjam_no_induk }}</td>
                            <td>{{ $p->tanggal_peminjaman->format('d/m/Y') }}</td>
                            <td>{{ $p->tanggal_pengembalian?->format('d/m/Y') ?? '-' }}</td>
                            <td>
                                @if($p->tanggal_pengembalian)
                                    {{ $p->tanggal_pengembalian->diffInDays($p->tanggal_peminjaman) }} hari
                                @else
                                    {{ now()->diffInDays($p->tanggal_peminjaman) }} hari (sedang dipinjam)
                                @endif
                            </td>
                            <td>{{ $p->keperluan ?? '-' }}</td>
                            <td>
                                @if($p->status == 'dipinjam')
                                    <span class="badge bg-warning">⏳ Sedang Dipinjam</span>
                                @else
                                    <span class="badge bg-success">✓ Dikembalikan</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-3">
                                Tidak ada data peminjaman
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">← Kembali</a>
            <button onclick="window.print()" class="btn btn-info">🖨️ Cetak</button>
        </div>
    </div>
</div>
@endsection
