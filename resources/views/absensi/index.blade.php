@extends('layouts.app')

@section('title', 'Daftar Absensi')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">📋 Daftar Absensi</h5>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('absensi.create') }}" class="btn btn-primary">
                    ➕ Tambah Absensi Baru
                </a>
            </div>
        </div>

        <form method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="peserta_id" class="form-label">Pilih Peserta</label>
                    <select name="peserta_id" id="peserta_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Peserta</option>
                        @foreach($pesertaPkl as $peserta)
                            <option value="{{ $peserta->id }}" @if($selectedPeserta == $peserta->id) selected @endif>
                                {{ $peserta->nama }} ({{ $peserta->nomor_induk }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="bulan" class="form-label">Pilih Bulan</label>
                    <input type="month" name="bulan" id="bulan" class="form-control" value="{{ $bulan }}" onchange="this.form.submit()">
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Peserta</th>
                        <th>No. Induk</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($absensis as $absensi)
                        <tr>
                            <td>{{ $absensi->tanggal->format('d/m/Y') }}</td>
                            <td>{{ $absensi->pesertaPkl->nama }}</td>
                            <td>{{ $absensi->pesertaPkl->nomor_induk }}</td>
                            <td>{{ $absensi->jam_masuk ?? '-' }}</td>
                            <td>{{ $absensi->jam_keluar ?? '-' }}</td>
                            <td>
                                @switch($absensi->status)
                                    @case('hadir')
                                        <span class="badge bg-success">✓ Hadir</span>
                                        @break
                                    @case('sakit')
                                        <span class="badge bg-warning">🏥 Sakit</span>
                                        @break
                                    @case('izin')
                                        <span class="badge bg-info">📋 Izin</span>
                                        @break
                                    @case('alpa')
                                        <span class="badge bg-danger">✕ Alpa</span>
                                        @break
                                @endswitch
                            </td>
                            <td>{{ $absensi->keterangan ?? '-' }}</td>
                            <td>
                                <a href="{{ route('absensi.edit', $absensi) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('absensi.destroy', $absensi) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-3">
                                Tidak ada data absensi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($absensis->hasPages())
            <nav aria-label="Page navigation">
                {{ $absensis->links() }}
            </nav>
        @endif
    </div>
</div>
@endsection
