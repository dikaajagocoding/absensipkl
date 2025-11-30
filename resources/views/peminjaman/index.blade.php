@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">📋 Daftar Peminjaman Peralatan</h5>
            <a href="{{ route('peminjaman.create') }}" class="btn btn-light btn-sm">➕ Input Peminjaman Baru</a>
        </div>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="peralatan_id" class="form-label">Pilih Peralatan</label>
                    <select name="peralatan_id" id="peralatan_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Peralatan</option>
                        @foreach($peralatan as $p)
                            <option value="{{ $p->id }}" @if($selectedPeralatan == $p->id) selected @endif>
                                {{ $p->nama_peralatan }} ({{ $p->kode_peralatan }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Filter Status</label>
                    <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="dipinjam" @selected($status == 'dipinjam')>Sedang Dipinjam</option>
                        <option value="dikembalikan" @selected($status == 'dikembalikan')>Sudah Dikembalikan</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal Pinjam</th>
                        <th>Peralatan</th>
                        <th>Peminjam</th>
                        <th>No. Induk</th>
                        <th>Keperluan</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman as $p)
                        <tr>
                            <td>{{ $p->tanggal_peminjaman->format('d/m/Y') }}</td>
                            <td><strong>{{ $p->peralatan->nama_peralatan }}</strong></td>
                            <td>{{ $p->peminjam_nama }}</td>
                            <td>{{ $p->peminjam_no_induk }}</td>
                            <td>{{ $p->keperluan ?? '-' }}</td>
                            <td>{{ $p->tanggal_pengembalian?->format('d/m/Y') ?? '-' }}</td>
                            <td>
                                @if($p->status == 'dipinjam')
                                    <span class="badge bg-warning">⏳ Sedang Dipinjam</span>
                                @else
                                    <span class="badge bg-success">✓ Dikembalikan</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('peminjaman.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('peminjaman.destroy', $p) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
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

        @if($peminjaman->hasPages())
            <nav aria-label="Page navigation">
                {{ $peminjaman->links() }}
            </nav>
        @endif
    </div>
</div>
@endsection
