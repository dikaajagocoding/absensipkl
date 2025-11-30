@extends('layouts.app')

@section('title', 'Daftar Peralatan')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">⚙️ Daftar Peralatan Logistik</h5>
            <a href="{{ route('peralatan.create') }}" class="btn btn-light btn-sm">➕ Tambah Peralatan</a>
        </div>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link @if($status == 'tersedia') active @endif" 
                   href="{{ route('peralatan.index', ['status' => 'tersedia']) }}">
                    ✓ Tersedia
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($status == 'rusak') active @endif" 
                   href="{{ route('peralatan.index', ['status' => 'rusak']) }}">
                    ✕ Rusak
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($status == 'hilang') active @endif" 
                   href="{{ route('peralatan.index', ['status' => 'hilang']) }}">
                    ⚠ Hilang
                </a>
            </li>
        </ul>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Kode</th>
                        <th>Nama Peralatan</th>
                        <th>Kategori</th>
                        <th>Merek</th>
                        <th>Tanggal Perolehan</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peralatan as $p)
                        <tr>
                            <td><strong>{{ $p->kode_peralatan }}</strong></td>
                            <td>{{ $p->nama_peralatan }}</td>
                            <td>{{ $p->kategori }}</td>
                            <td>{{ $p->merek ?? '-' }}</td>
                            <td>{{ $p->tanggal_perolehan->format('d/m/Y') }}</td>
                            <td>{{ $p->lokasi_penyimpanan }}</td>
                            <td>
                                @switch($p->status)
                                    @case('tersedia')
                                        <span class="badge bg-success">✓ Tersedia</span>
                                        @break
                                    @case('rusak')
                                        <span class="badge bg-warning">✕ Rusak</span>
                                        @break
                                    @case('hilang')
                                        <span class="badge bg-danger">⚠ Hilang</span>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                <a href="{{ route('peralatan.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('peralatan.destroy', $p) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus peralatan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-3">
                                Tidak ada data peralatan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($peralatan->hasPages())
            <nav aria-label="Page navigation">
                {{ $peralatan->links() }}
            </nav>
        @endif
    </div>
</div>
@endsection
