# 🚀 Quick Start - Sistem Absensi PKL

## Setup Cepat (5 Menit)

### 1. Buka Terminal di Folder Project
```bash
cd c:\xampp\htdocs\dieqa
```

### 2. Jalankan Laravel Server
```bash
php artisan serve
```

Akan menampilkan output seperti:
```
   INFO  Server running on [http://127.0.0.1:8000]
```

### 3. Buka Browser
Klik link atau ketik di address bar:
```
http://localhost:8000
```

**SELESAI!** Website siap digunakan! 🎉

---

## Data Contoh yang Sudah Ada

Saat pertama kali akses, Anda akan melihat 4 peserta PKL contoh:

1. **Ahmad Hidayat** (PKL001) - Teknik Komputer dan Jaringan
2. **Siti Nurhaliza** (PKL002) - Administrasi Perkantoran
3. **Budi Santoso** (PKL003) - Teknik Mesin
4. **Rina Wijaya** (PKL004) - Farmasi

---

## Menu Utama

### 📋 Daftar Absensi
- Lihat semua absensi yang sudah dicatat
- Filter berdasarkan peserta dan bulan
- Edit atau hapus data

### ➕ Input Absensi Baru
- Catat kehadiran peserta
- Pilih status: Hadir, Sakit, Izin, atau Alpa
- Tambah keterangan jika perlu

### 📊 Laporan Absensi
- Lihat ringkasan absensi per peserta
- Presentase kehadiran
- Cetak laporan langsung dari browser

### 👥 Manajemen Peserta
- Tambah peserta PKL baru
- Edit data peserta
- Ubah status peserta (Aktif/Selesai/Berhenti)

---

## Cara Input Absensi

### Langkah 1: Klik "Input Absensi Baru"
![Input Absensi](https://via.placeholder.com/300x200?text=Input+Absensi)

### Langkah 2: Isi Form
- **Peserta**: Pilih nama peserta
- **Tanggal**: Pilih tanggal absensi
- **Jam Masuk**: Isi jam masuk (opsional)
- **Jam Keluar**: Isi jam keluar (opsional)
- **Status**: Pilih status kehadiran
- **Keterangan**: Tambahan catatan (opsional)

### Langkah 3: Klik "Simpan Absensi"
Selesai! Data absensi sudah tersimpan.

---

## Cara Input Peserta Baru

### Langkah 1: Klik "Manajemen Peserta"

### Langkah 2: Klik "Tambah Peserta"

### Langkah 3: Isi Data Peserta
- **Nama Lengkap**: Nama lengkap peserta
- **No. Induk**: Nomor unik (contoh: PKL005)
- **Sekolah**: Nama sekolah/lembaga
- **Jurusan**: Program studi
- **Tanggal Mulai**: Tanggal mulai PKL
- **Tanggal Selesai**: Tanggal selesai PKL
- **Pembimbing**: Nama pembimbing (opsional)

### Langkah 4: Klik "Simpan Peserta"
Peserta sudah terdaftar!

---

## Cara Membuat Laporan

### Langkah 1: Klik "Laporan Absensi"

### Langkah 2: Pilih Bulan
- Gunakan input bulan untuk memilih bulan yang ingin dilihat

### Langkah 3: Lihat Statistik
- Jumlah hari hadir, sakit, izin, dan alpa
- Presentase kehadiran per peserta

### Langkah 4: Cetak (Opsional)
- Klik "Cetak Laporan"
- Browser akan membuka dialog print
- Klik "Print" untuk mencetak

---

## Database Location
- **Host**: 127.0.0.1 (localhost)
- **Port**: 3306
- **Database**: DB_ABSENSI
- **Username**: root
- **Password**: (kosong)

---

## Troubleshooting

### Error: "No application encryption key has been specified"
Jalankan:
```bash
php artisan key:generate
```

### Error: "SQLSTATE[HY000]: General error"
Jalankan:
```bash
php artisan migrate
```

### Port 8000 sudah digunakan
Gunakan port lain:
```bash
php artisan serve --port=8001
```
Kemudian akses: http://localhost:8001

### File .env tidak ketemu
Copy file `.env.example` menjadi `.env`:
```bash
copy .env.example .env
```

---

## Keyboard Shortcuts

- **Enter** pada form = Submit form
- **Esc** = Batalkan dialog

---

## Tips & Trik

✅ **Input Cepat**: Gunakan tab untuk pindah antar field
✅ **Filter Peserta**: Gunakan dropdown untuk filter peserta
✅ **Cetak Laporan**: Laporan bisa dicetak atau disimpan sebagai PDF
✅ **Backup Data**: Download backup database secara berkala

---

## Butuh Bantuan?

1. Lihat file `PETUNJUK_INSTALASI.md` untuk instalasi lengkap
2. Periksa file `README.md` di root project
3. Hubungi admin sistem

---

**Selamat menggunakan Sistem Absensi PKL! 🎓**
