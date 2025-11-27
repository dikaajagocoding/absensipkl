@extends('layouts.app')

@section('title', 'Edit Peserta PKL')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">✏️ Edit Peserta PKL</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('peserta-pkl.update', $pesertaPkl) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                       value="{{ old('nama', $pesertaPkl->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nomor_induk" class="form-label">Nomor Induk <span class="text-danger">*</span></label>
                <input type="text" name="nomor_induk" id="nomor_induk" class="form-control @error('nomor_induk') is-invalid @enderror" 
                       value="{{ old('nomor_induk', $pesertaPkl->nomor_induk) }}" required>
                @error('nomor_induk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sekolah" class="form-label">Sekolah/Lembaga <span class="text-danger">*</span></label>
                <input type="text" name="sekolah" id="sekolah" class="form-control @error('sekolah') is-invalid @enderror" 
                       value="{{ old('sekolah', $pesertaPkl->sekolah) }}" required>
                @error('sekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan/Program Studi <span class="text-danger">*</span></label>
                <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" 
                       value="{{ old('jurusan', $pesertaPkl->jurusan) }}" required>
                @error('jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" 
                               value="{{ old('tanggal_mulai', $pesertaPkl->tanggal_mulai->format('Y-m-d')) }}" required>
                        @error('tanggal_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" 
                               value="{{ old('tanggal_selesai', $pesertaPkl->tanggal_selesai->format('Y-m-d')) }}" required>
                        @error('tanggal_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="pembimbing" class="form-label">Pembimbing (Opsional)</label>
                <input type="text" name="pembimbing" id="pembimbing" class="form-control @error('pembimbing') is-invalid @enderror" 
                       value="{{ old('pembimbing', $pesertaPkl->pembimbing) }}">
                @error('pembimbing')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="aktif" @if(old('status', $pesertaPkl->status) == 'aktif') selected @endif>✓ Aktif</option>
                    <option value="selesai" @if(old('status', $pesertaPkl->status) == 'selesai') selected @endif>✓ Selesai</option>
                    <option value="berhenti" @if(old('status', $pesertaPkl->status) == 'berhenti') selected @endif>✕ Berhenti</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('peserta-pkl.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">💾 Update Peserta</button>
            </div>
        </form>
    </div>
</div>
@endsection
