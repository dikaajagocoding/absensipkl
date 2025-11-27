@extends('layouts.app')

@section('title', 'Manajemen Peserta PKL')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">👥 Manajemen Peserta PKL</h5>
            <a href="{{ route('peserta-pkl.create') }}" class="btn btn-light btn-sm">➕ Tambah Peserta</a>
        </div>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link @if($status == 'aktif') active @endif" 
                   href="{{ route('peserta-pkl.index', ['status' => 'aktif']) }}">
                   ✓ Aktif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($status == 'selesai') active @endif" 
                   href="{{ route('peserta-pkl.index', ['status' => 'selesai']) }}">
                   ✓ Selesai
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($status == 'berhenti') active @endif" 
                   href="{{ route('peserta-pkl.index', ['status' => 'berhenti']) }}">
                   ✕ Berhenti
                </a>
            </li>
        </ul>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>No. Induk</th>
                        <th>Sekolah</th>
                        <th>Jurusan</th>
                        <th>Tgl Mulai</th>
                        <th>Tgl Selesai</th>
                        <th>Pembimbing</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesertaPkl as $peserta)
                        <tr>
                            <td><strong>{{ $peserta->nama }}</strong></td>
                            <td>{{ $peserta->nomor_induk }}</td>
                            <td>{{ $peserta->sekolah }}</td>
                            <td>{{ $peserta->jurusan }}</td>
                            <td>{{ $peserta->tanggal_mulai->format('d/m/Y') }}</td>
                            <td>{{ $peserta->tanggal_selesai->format('d/m/Y') }}</td>
                            <td>{{ $peserta->pembimbing ?? '-' }}</td>
                            <td>
                                <a href="{{ route('peserta-pkl.edit', $peserta) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('peserta-pkl.destroy', $peserta) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-3">
                                Tidak ada data peserta
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pesertaPkl->hasPages())
            <nav aria-label="Page navigation">
                {{ $pesertaPkl->links() }}
            </nav>
        @endif
    </div>
</div>
@endsection
