@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">✏️ Edit Peminjaman Peralatan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('peminjaman.update', $peminjaman) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="peralatan_id" class="form-label">Pilih Peralatan <span class="text-danger">*</span></label>
                <select class="form-select @error('peralatan_id') is-invalid @enderror" id="peralatan_id" name="peralatan_id" required>
                    <option value="">-- Pilih Peralatan --</option>
                    @foreach($peralatan as $p)
                        <option value="{{ $p->id }}" @selected(old('peralatan_id', $peminjaman->peralatan_id) == $p->id)>
                            {{ $p->nama_peralatan }} ({{ $p->kode_peralatan }})
                        </option>
                    @endforeach
                </select>
                @error('peralatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="peminjam_nama" class="form-label">Nama Peminjam <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('peminjam_nama') is-invalid @enderror" id="peminjam_nama" 
                               name="peminjam_nama" value="{{ old('peminjam_nama', $peminjaman->peminjam_nama) }}" required>
                        @error('peminjam_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="peminjam_no_induk" class="form-label">No. Induk / NIP <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('peminjam_no_induk') is-invalid @enderror" id="peminjam_no_induk" 
                               name="peminjam_no_induk" value="{{ old('peminjam_no_induk', $peminjaman->peminjam_no_induk) }}" required>
                        @error('peminjam_no_induk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" id="tanggal_peminjaman" 
                               name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman', $peminjaman->tanggal_peminjaman->format('Y-m-d')) }}" required>
                        @error('tanggal_peminjaman')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" id="tanggal_pengembalian" 
                               name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian', $peminjaman->tanggal_pengembalian?->format('Y-m-d')) }}">
                        @error('tanggal_pengembalian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <textarea class="form-control @error('keperluan') is-invalid @enderror" id="keperluan" 
                          name="keperluan" rows="3">{{ old('keperluan', $peminjaman->keperluan) }}</textarea>
                @error('keperluan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="dipinjam" @selected(old('status', $peminjaman->status) == 'dipinjam')>Sedang Dipinjam</option>
                    <option value="dikembalikan" @selected(old('status', $peminjaman->status) == 'dikembalikan')>Sudah Dikembalikan</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" 
                          name="catatan" rows="2">{{ old('catatan', $peminjaman->catatan) }}</textarea>
                @error('catatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">💾 Simpan</button>
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">← Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
