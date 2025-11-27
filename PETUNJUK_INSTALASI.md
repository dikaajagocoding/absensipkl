# Sistem Absensi PKL - Kodim 0611 Garut

Website sistem absensi untuk peserta Praktik Kerja Lapangan (PKL) di Kodim 0611 Garut.

## Fitur Utama

✅ **Input Absensi** - Catat kehadiran peserta PKL dengan jam masuk dan keluar
✅ **Manajemen Peserta** - Kelola data peserta PKL yang sedang magang
✅ **Status Kehadiran** - Hadir, Sakit, Izin, atau Alpa
✅ **Laporan Bulanan** - Generate laporan absensi dan presentase kehadiran
✅ **Cetak Laporan** - Print laporan absensi langsung dari web browser

## Persyaratan Sistem

- PHP 8.2+
- MySQL/MariaDB 5.7+
- Composer
- Node.js & npm (untuk development)

## Instalasi

### 1. Clone atau Extract Project

```bash
cd c:\xampp\htdocs\dieqa
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Setup Environment

File `.env` sudah dikonfigurasi untuk:
- Database: `DB_ABSENSI`
- Username: `root`
- Password: kosong
- Server: `127.0.0.1:3306`

Jika berbeda, silakan update file `.env`

### 4. Generate App Key

```bash
php artisan key:generate
```

### 5. Jalankan Migrations

```bash
php artisan migrate
```

### 6. Jalankan Seeder (Opsional)

```bash
php artisan db:seed
```

Ini akan membuat 4 data peserta contoh.

### 7. Jalankan Development Server

**Terminal 1** - Laravel Server:
```bash
php artisan serve
```

**Terminal 2** - Vite Dev Server (Opsional):
```bash
npm run dev
```

### 8. Akses Website

Buka browser dan kunjungi:
```
http://localhost:8000
```

## Struktur Database

### Tabel: peserta_pkl
Menyimpan data peserta PKL

| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| id | INT | Primary Key |
| nama | VARCHAR | Nama peserta |
| nomor_induk | VARCHAR | Nomor induk (unik) |
| sekolah | VARCHAR | Nama sekolah/lembaga |
| jurusan | VARCHAR | Jurusan/program studi |
| tanggal_mulai | DATE | Tanggal mulai PKL |
| tanggal_selesai | DATE | Tanggal selesai PKL |
| pembimbing | VARCHAR | Nama pembimbing |
| status | ENUM | aktif, selesai, berhenti |
| timestamps | - | created_at, updated_at |

### Tabel: absensis
Menyimpan data absensi harian

| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| id | INT | Primary Key |
| peserta_pkl_id | INT | Foreign Key ke peserta_pkl |
| tanggal | DATE | Tanggal absensi |
| jam_masuk | TIME | Jam masuk (opsional) |
| jam_keluar | TIME | Jam keluar (opsional) |
| status | VARCHAR | hadir, sakit, izin, alpa |
| keterangan | TEXT | Keterangan tambahan |
| timestamps | - | created_at, updated_at |

**Unique Constraint:** Satu peserta hanya bisa punya satu absensi per hari

## Penggunaan

### Menu Utama

1. **📋 Daftar Absensi**
   - Lihat semua absensi yang sudah dicatat
   - Filter berdasarkan peserta dan bulan
   - Edit atau hapus data absensi

2. **➕ Input Absensi Baru**
   - Catat kehadiran peserta baru
   - Pilih status: Hadir, Sakit, Izin, atau Alpa
   - Opsional: input jam masuk dan keluar
   - Tambah keterangan jika diperlukan

3. **📊 Laporan Absensi**
   - Lihat ringkasan absensi per peserta
   - Statistik: Hadir, Sakit, Izin, Alpa
   - Presentase kehadiran
   - Opsi cetak laporan

## API Endpoints

| Method | Route | Deskripsi |
|--------|-------|-----------|
| GET | `/absensi` | Daftar absensi |
| GET | `/absensi/create` | Form input absensi |
| POST | `/absensi` | Simpan absensi baru |
| GET | `/absensi/{id}/edit` | Form edit absensi |
| PUT | `/absensi/{id}` | Update absensi |
| DELETE | `/absensi/{id}` | Hapus absensi |
| GET | `/absensi-laporan` | Laporan absensi |

## Command Artisan Berguna

```bash
# Jalankan migration
php artisan migrate

# Reset database (hapus dan jalankan ulang)
php artisan migrate:reset
php artisan migrate

# Seeding data
php artisan db:seed
php artisan db:seed --class=PesertaPklSeeder

# Tinker (test command)
php artisan tinker
```

## Troubleshooting

### Error: Database connection
- Pastikan MySQL/MariaDB sudah running
- Periksa konfigurasi di file `.env`
- Buat database `DB_ABSENSI` jika belum ada

### Error: "Specified key is too long"
Jika terjadi saat `php artisan migrate`:
- Edit file `app\Providers\AppServiceProvider.php`
- Tambahkan di method `boot()`:
```php
use Illuminate\Support\Facades\Schema;

public function boot(): void
{
    Schema::defaultStringLength(191);
}
```

### File tidak ditemukan
- Pastikan composer install dan npm install sudah dijalankan
- Clear cache: `php artisan cache:clear`

## Fitur yang Bisa Ditambahkan

- 🔐 Sistem Login dan Role-based Access Control
- 📧 Email notification untuk absensi
- 📱 Mobile app
- 🔔 Notifikasi real-time
- 📈 Grafik statistik absensi
- 🖼️ Upload foto peserta
- 🏭 Multiple lokasi PKL

## Lisensi

Dikembangkan untuk Kodim 0611 Garut

## Support

Untuk bantuan atau pertanyaan, hubungi admin sistem.
