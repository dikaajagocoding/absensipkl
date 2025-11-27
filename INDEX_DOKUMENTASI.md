# 📚 INDEX DOKUMENTASI - Sistem Absensi PKL Kodim 0611 Garut

Selamat datang! Di sini Anda akan menemukan semua dokumentasi untuk Sistem Absensi PKL.

---

## 🚀 Mulai dari Sini

### **1. QUICK_START.md** ⭐ BACA PERTAMA
📄 [Buka QUICK_START.md](./QUICK_START.md)

**Apa isinya?**
- Setup cepat (5 menit)
- Data contoh yang sudah ada
- Cara menggunakan setiap menu
- Tips & trik

**Cocok untuk:** Pengguna baru yang ingin langsung praktek

---

### **2. PETUNJUK_INSTALASI.md**
📄 [Buka PETUNJUK_INSTALASI.md](./PETUNJUK_INSTALASI.md)

**Apa isinya?**
- Persyaratan sistem
- Instalasi step-by-step
- Struktur database
- Command artisan berguna
- Troubleshooting

**Cocok untuk:** Admin IT yang setup awal

---

### **3. TESTING_CHECKLIST.md**
📄 [Buka TESTING_CHECKLIST.md](./TESTING_CHECKLIST.md)

**Apa isinya?**
- Checklist testing lengkap
- Feature by feature testing
- UI/UX testing
- Data validation testing
- Browser compatibility

**Cocok untuk:** QA tester sebelum go-live

---

## 🎯 Feature Overview

### Fitur-Fitur Utama

#### 1️⃣ **Manajemen Peserta PKL**
- ✅ Tambah peserta baru
- ✅ Edit data peserta
- ✅ Hapus peserta
- ✅ Filter status (Aktif/Selesai/Berhenti)
- ✅ Lihat informasi lengkap peserta

**Menu**: 👥 Manajemen Peserta

#### 2️⃣ **Input Absensi**
- ✅ Catat kehadiran peserta
- ✅ Input jam masuk dan jam keluar
- ✅ Pilih status: Hadir, Sakit, Izin, Alpa
- ✅ Tambah keterangan
- ✅ Validasi data otomatis

**Menu**: ➕ Input Absensi Baru

#### 3️⃣ **Daftar Absensi**
- ✅ Lihat semua absensi
- ✅ Filter berdasarkan peserta
- ✅ Filter berdasarkan bulan
- ✅ Edit data absensi
- ✅ Hapus data absensi
- ✅ Pagination (20 data per halaman)

**Menu**: 📋 Daftar Absensi

#### 4️⃣ **Laporan Absensi**
- ✅ Ringkasan absensi per peserta
- ✅ Statistik: Hadir, Sakit, Izin, Alpa
- ✅ Presentase kehadiran
- ✅ Warna badge berdasarkan presentase
- ✅ Cetak laporan langsung
- ✅ Filter berdasarkan bulan

**Menu**: 📊 Laporan Absensi

---

## 📊 Struktur Database

### Tabel: peserta_pkl
| Field | Tipe | Keterangan |
|-------|------|-----------|
| id | INT | Primary Key |
| nama | VARCHAR(255) | Nama lengkap |
| nomor_induk | VARCHAR(255) | Nomor unik peserta |
| sekolah | VARCHAR(255) | Nama sekolah/lembaga |
| jurusan | VARCHAR(255) | Program studi |
| tanggal_mulai | DATE | Tanggal mulai PKL |
| tanggal_selesai | DATE | Tanggal selesai PKL |
| pembimbing | VARCHAR(255) | Nama pembimbing |
| status | ENUM | aktif / selesai / berhenti |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

### Tabel: absensis
| Field | Tipe | Keterangan |
|-------|------|-----------|
| id | INT | Primary Key |
| peserta_pkl_id | INT | FK ke peserta_pkl |
| tanggal | DATE | Tanggal absensi |
| jam_masuk | TIME | Jam masuk (opsional) |
| jam_keluar | TIME | Jam keluar (opsional) |
| status | VARCHAR(255) | hadir/sakit/izin/alpa |
| keterangan | TEXT | Catatan tambahan |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diperbarui |

**Constraint**: Satu peserta hanya bisa punya 1 absensi per hari (UNIQUE)

---

## 🛠️ Technical Stack

- **Backend**: Laravel 11.x
- **Database**: MySQL / MariaDB
- **Frontend**: Bootstrap 5.3
- **Language**: PHP 8.2+
- **ORM**: Eloquent

---

## 📁 Struktur Project

```
dieqa/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AbsensiController.php      ← Logic absensi
│   │       └── PesertaPklController.php   ← Logic peserta
│   └── Models/
│       ├── Absensi.php                   ← Model absensi
│       └── PesertaPkl.php                ← Model peserta
├── database/
│   ├── migrations/
│   │   ├── ..._create_peserta_pkl_table.php
│   │   └── ..._create_absensis_table.php
│   └── seeders/
│       └── PesertaPklSeeder.php          ← Data contoh
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php             ← Template utama
│       ├── absensi/
│       │   ├── index.blade.php           ← Daftar absensi
│       │   ├── create.blade.php          ← Input absensi
│       │   ├── edit.blade.php            ← Edit absensi
│       │   └── laporan.blade.php         ← Laporan absensi
│       └── peserta-pkl/
│           ├── index.blade.php           ← Daftar peserta
│           ├── create.blade.php          ← Tambah peserta
│           └── edit.blade.php            ← Edit peserta
├── routes/
│   └── web.php                           ← Routes konfigurasi
├── .env                                  ← Konfigurasi database
└── Dokumentasi/
    ├── QUICK_START.md                    ← Setup cepat
    ├── PETUNJUK_INSTALASI.md             ← Instalasi lengkap
    ├── TESTING_CHECKLIST.md              ← Checklist testing
    └── INDEX_DOKUMENTASI.md              ← File ini

```

---

## 🔧 Command Artisan Berguna

```bash
# Start development server
php artisan serve

# Jalankan migrations
php artisan migrate

# Reset database (HATI-HATI: menghapus semua data!)
php artisan migrate:reset
php artisan migrate

# Seed data
php artisan db:seed
php artisan db:seed --class=PesertaPklSeeder

# Tinker (interactive shell)
php artisan tinker

# Clear cache
php artisan cache:clear

# Generate app key
php artisan key:generate
```

---

## 🌐 URL Routes

| Halaman | URL | Method |
|---------|-----|--------|
| Daftar Absensi | `/absensi` | GET |
| Input Absensi | `/absensi/create` | GET |
| Simpan Absensi | `/absensi` | POST |
| Edit Absensi | `/absensi/{id}/edit` | GET |
| Update Absensi | `/absensi/{id}` | PUT |
| Hapus Absensi | `/absensi/{id}` | DELETE |
| Laporan | `/absensi-laporan` | GET |
| Daftar Peserta | `/peserta-pkl` | GET |
| Tambah Peserta | `/peserta-pkl/create` | GET |
| Simpan Peserta | `/peserta-pkl` | POST |
| Edit Peserta | `/peserta-pkl/{id}/edit` | GET |
| Update Peserta | `/peserta-pkl/{id}` | PUT |
| Hapus Peserta | `/peserta-pkl/{id}` | DELETE |

---

## ❓ FAQ (Frequently Asked Questions)

### Q: Bagaimana cara menambah peserta baru?
**A**: Menu 👥 Manajemen Peserta → Tombol "Tambah Peserta" → Isi form → Simpan

### Q: Bagaimana cara input absensi?
**A**: Menu ➕ Input Absensi Baru → Pilih peserta → Isi data → Simpan

### Q: Bagaimana cara cetak laporan?
**A**: Menu 📊 Laporan Absensi → Pilih bulan → Klik "Cetak Laporan"

### Q: Apakah bisa input absensi untuk hari lalu?
**A**: Ya, Anda bisa input tanggal apapun di field tanggal

### Q: Berapa limit data yang bisa disimpan?
**A**: Tidak ada limit, tergantung kapasitas database MySQL

### Q: Apakah ada user login?
**A**: Tidak ada login di versi ini. Untuk keamanan lebih, bisa ditambahkan kemudian.

### Q: Bagaimana backup data?
**A**: Gunakan phpMyAdmin atau export database MySQL

### Q: Bagaimana jika lupa data atau error?
**A**: Lihat file PETUNJUK_INSTALASI.md bagian Troubleshooting

---

## 📞 Support & Bantuan

Jika ada masalah atau pertanyaan:

1. **Cek dokumentasi** di folder ini
2. **Lihat error message** yang muncul
3. **Jalankan troubleshooting** di PETUNJUK_INSTALASI.md
4. **Hubungi admin** sistem jika masalah berlanjut

---

## 📅 Riwayat Versi

| Versi | Tanggal | Perubahan |
|-------|---------|----------|
| 1.0 | Nov 27, 2025 | Initial release |
|       |         |           |

---

## 📄 License

Sistem ini dikembangkan untuk Kodim 0611 Garut.

---

## 🎓 Mulai Sekarang!

1. **Baca**: QUICK_START.md
2. **Setup**: Ikuti langkah instalasi
3. **Test**: Gunakan TESTING_CHECKLIST.md
4. **Gunakan**: Mulai input data peserta dan absensi
5. **Monitor**: Lihat laporan bulanan

---

**Terima kasih telah menggunakan Sistem Absensi PKL!** 🎉

Untuk informasi lebih lanjut, silakan hubungi administrator sistem.

