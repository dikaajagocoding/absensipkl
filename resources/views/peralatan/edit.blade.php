@extends('layouts.app')

@section('title', 'Edit Peralatan')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">✏️ Edit Peralatan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('peralatan.update', $peralatan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_peralatan" class="form-label">Nama Peralatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_peralatan') is-invalid @enderror" id="nama_peralatan" 
                       name="nama_peralatan" value="{{ old('nama_peralatan', $peralatan->nama_peralatan) }}" required>
                @error('nama_peralatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kode_peralatan" class="form-label">Kode Peralatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('kode_peralatan') is-invalid @enderror" id="kode_peralatan" 
                       name="kode_peralatan" value="{{ old('kode_peralatan', $peralatan->kode_peralatan) }}" required>
                @error('kode_peralatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" 
                          name="deskripsi" rows="3">{{ old('deskripsi', $peralatan->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" 
                               name="kategori" value="{{ old('kategori', $peralatan->kategori) }}" required>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="merek" class="form-label">Merek</label>
                        <input type="text" class="form-control @error('merek') is-invalid @enderror" id="merek" 
                               name="merek" value="{{ old('merek', $peralatan->merek) }}">
                        @error('merek')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_perolehan" class="form-label">Tanggal Perolehan <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal_perolehan') is-invalid @enderror" id="tanggal_perolehan" 
                               name="tanggal_perolehan" value="{{ old('tanggal_perolehan', $peralatan->tanggal_perolehan->format('Y-m-d')) }}" required>
                        @error('tanggal_perolehan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_maintenance" class="form-label">Tanggal Maintenance</label>
                        <input type="date" class="form-control @error('tanggal_maintenance') is-invalid @enderror" id="tanggal_maintenance" 
                               name="tanggal_maintenance" value="{{ old('tanggal_maintenance', $peralatan->tanggal_maintenance?->format('Y-m-d')) }}">
                        @error('tanggal_maintenance')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="lokasi_penyimpanan" class="form-label">Lokasi Penyimpanan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('lokasi_penyimpanan') is-invalid @enderror" id="lokasi_penyimpanan" 
                       name="lokasi_penyimpanan" value="{{ old('lokasi_penyimpanan', $peralatan->lokasi_penyimpanan) }}" required>
                @error('lokasi_penyimpanan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="tersedia" @selected(old('status', $peralatan->status) == 'tersedia')>✓ Tersedia</option>
                    <option value="rusak" @selected(old('status', $peralatan->status) == 'rusak')>✕ Rusak</option>
                    <option value="hilang" @selected(old('status', $peralatan->status) == 'hilang')>⚠ Hilang</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">💾 Simpan</button>
                <a href="{{ route('peralatan.index') }}" class="btn btn-secondary">← Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
