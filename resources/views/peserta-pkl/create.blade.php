@extends('layouts.app')

@section('title', 'Tambah Peserta PKL')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">➕ Tambah Peserta PKL Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('peserta-pkl.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" 
                       value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nomor_induk" class="form-label">Nomor Induk <span class="text-danger">*</span></label>
                <input type="text" name="nomor_induk" id="nomor_induk" class="form-control @error('nomor_induk') is-invalid @enderror" 
                       value="{{ old('nomor_induk') }}" placeholder="Contoh: PKL001" required>
                @error('nomor_induk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sekolah" class="form-label">Sekolah/Lembaga <span class="text-danger">*</span></label>
                <input type="text" name="sekolah" id="sekolah" class="form-control @error('sekolah') is-invalid @enderror" 
                       value="{{ old('sekolah') }}" placeholder="Nama sekolah atau lembaga" required>
                @error('sekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan/Program Studi <span class="text-danger">*</span></label>
                <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" 
                       value="{{ old('jurusan') }}" placeholder="Contoh: Teknik Komputer dan Jaringan" required>
                @error('jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" 
                               value="{{ old('tanggal_mulai') }}" required>
                        @error('tanggal_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" 
                               value="{{ old('tanggal_selesai') }}" required>
                        @error('tanggal_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="pembimbing" class="form-label">Pembimbing (Opsional)</label>
                <input type="text" name="pembimbing" id="pembimbing" class="form-control @error('pembimbing') is-invalid @enderror" 
                       value="{{ old('pembimbing') }}" placeholder="Nama pembimbing">
                @error('pembimbing')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('peserta-pkl.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">💾 Simpan Peserta</button>
            </div>
        </form>
    </div>
</div>
@endsection
