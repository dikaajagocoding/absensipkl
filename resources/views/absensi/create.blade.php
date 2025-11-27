@extends('layouts.app')

@section('title', 'Input Absensi Baru')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">➕ Input Absensi Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="peserta_pkl_id" class="form-label">Peserta PKL <span class="text-danger">*</span></label>
                <select name="peserta_pkl_id" id="peserta_pkl_id" class="form-select @error('peserta_pkl_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Peserta --</option>
                    @foreach($pesertaPkl as $peserta)
                        <option value="{{ $peserta->id }}" @if(old('peserta_pkl_id') == $peserta->id) selected @endif>
                            {{ $peserta->nama }} - {{ $peserta->nomor_induk }}
                        </option>
                    @endforeach
                </select>
                @error('peserta_pkl_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" 
                       value="{{ old('tanggal', date('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_masuk" class="form-label">Jam Masuk</label>
                        <input type="time" name="jam_masuk" id="jam_masuk" class="form-control @error('jam_masuk') is-invalid @enderror" 
                               value="{{ old('jam_masuk') }}">
                        @error('jam_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_keluar" class="form-label">Jam Keluar</label>
                        <input type="time" name="jam_keluar" id="jam_keluar" class="form-control @error('jam_keluar') is-invalid @enderror" 
                               value="{{ old('jam_keluar') }}">
                        @error('jam_keluar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="hadir" @if(old('status') == 'hadir') selected @endif>✓ Hadir</option>
                    <option value="sakit" @if(old('status') == 'sakit') selected @endif>🏥 Sakit</option>
                    <option value="izin" @if(old('status') == 'izin') selected @endif>📋 Izin</option>
                    <option value="alpa" @if(old('status') == 'alpa') selected @endif>✕ Alpa</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" 
                          rows="3" placeholder="Contoh: Izin untuk mengurus administrasi">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">💾 Simpan Absensi</button>
            </div>
        </form>
    </div>
</div>
@endsection
