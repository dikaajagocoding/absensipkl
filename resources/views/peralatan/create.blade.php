@extends('layouts.app')

@section('title', 'Tambah Peralatan')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">➕ Tambah Peralatan Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('peralatan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_peralatan" class="form-label">Nama Peralatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_peralatan') is-invalid @enderror" id="nama_peralatan" 
                       name="nama_peralatan" value="{{ old('nama_peralatan') }}" placeholder="Contoh: Laptop Dell XPS 13" required>
                @error('nama_peralatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kode_peralatan" class="form-label">Kode Peralatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('kode_peralatan') is-invalid @enderror" id="kode_peralatan" 
                       name="kode_peralatan" value="{{ old('kode_peralatan') }}" placeholder="Contoh: LT001, PR001, KD002" required>
                @error('kode_peralatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" 
                          name="deskripsi" rows="3" placeholder="Deskripsi singkat peralatan">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Elektronik" @selected(old('kategori') == 'Elektronik')>📱 Elektronik</option>
                            <option value="Kendaraan" @selected(old('kategori') == 'Kendaraan')>🚗 Kendaraan</option>
                            <option value="Furnitur" @selected(old('kategori') == 'Furnitur')>🪑 Furnitur</option>
                            <option value="Keamanan" @selected(old('kategori') == 'Keamanan')>🔐 Keamanan</option>
                            <option value="Perlengkapan" @selected(old('kategori') == 'Perlengkapan')>👕 Perlengkapan</option>
                            <option value="Senjata" @selected(old('kategori') == 'Senjata')>🔫 Senjata</option>
                            <option value="Lainnya" @selected(old('kategori') == 'Lainnya')>📦 Lainnya</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="merek" class="form-label">Merek</label>
                        <input type="text" class="form-control @error('merek') is-invalid @enderror" id="merek" 
                               name="merek" value="{{ old('merek') }}" placeholder="Contoh: Dell, HP, Honda">
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
                               name="tanggal_perolehan" value="{{ old('tanggal_perolehan', now()->format('Y-m-d')) }}" required>
                        @error('tanggal_perolehan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_maintenance" class="form-label">Tanggal Maintenance</label>
                        <input type="date" class="form-control @error('tanggal_maintenance') is-invalid @enderror" id="tanggal_maintenance" 
                               name="tanggal_maintenance" value="{{ old('tanggal_maintenance') }}">
                        @error('tanggal_maintenance')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="lokasi_penyimpanan" class="form-label">Lokasi Penyimpanan <span class="text-danger">*</span></label>
                <select class="form-select @error('lokasi_penyimpanan') is-invalid @enderror" id="lokasi_penyimpanan" name="lokasi_penyimpanan" required>
                    <option value="">-- Pilih Lokasi --</option>
                    <option value="Ruang Administrasi" @selected(old('lokasi_penyimpanan') == 'Ruang Administrasi')>🖊️ Ruang Administrasi</option>
                    <option value="Ruang Briefing" @selected(old('lokasi_penyimpanan') == 'Ruang Briefing')>📊 Ruang Briefing</option>
                    <option value="Garasi Kendaraan" @selected(old('lokasi_penyimpanan') == 'Garasi Kendaraan')>🚗 Garasi Kendaraan</option>
                    <option value="Gudang Perlengkapan" @selected(old('lokasi_penyimpanan') == 'Gudang Perlengkapan')>📦 Gudang Perlengkapan</option>
                    <option value="Ruang Kas" @selected(old('lokasi_penyimpanan') == 'Ruang Kas')>💰 Ruang Kas</option>
                    <option value="Ruang Senjata" @selected(old('lokasi_penyimpanan') == 'Ruang Senjata')>🔫 Ruang Senjata</option>
                    <option value="Ruang Komando" @selected(old('lokasi_penyimpanan') == 'Ruang Komando')>🎖️ Ruang Komando</option>
                    <option value="Lainnya" @selected(old('lokasi_penyimpanan') == 'Lainnya')>📍 Lainnya</option>
                </select>
                @error('lokasi_penyimpanan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-muted">(Opsional)</span></label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="">-- Pilih Status (Default: Tersedia) --</option>
                    <option value="tersedia" @selected(old('status') == 'tersedia' || old('status') == '')>✓ Tersedia</option>
                    <option value="rusak" @selected(old('status') == 'rusak')>✕ Rusak</option>
                    <option value="hilang" @selected(old('status') == 'hilang')>⚠ Hilang</option>
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
