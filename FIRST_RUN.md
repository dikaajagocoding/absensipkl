# 🎯 FIRST RUN - Panduan Pertama Kali Menjalankan Sistem

Selamat datang! Panduan ini akan memandu Anda menjalankan Sistem Absensi PKL untuk pertama kalinya.

---

## ⏱️ Waktu yang Dibutuhkan: 5 MENIT

---

## 📋 Checklist Pre-Run

Sebelum menjalankan sistem, pastikan:

- [ ] XAMPP sudah installed dan MySQL running
- [ ] Project sudah di folder `c:\xampp\htdocs\dieqa`
- [ ] Terminal/PowerShell siap
- [ ] Browser (Chrome/Firefox/Edge) siap

---

## 🚀 LANGKAH 1: Buka Terminal

**Windows PowerShell:**

1. Tekan `Windows + R`
2. Ketik: `powershell`
3. Tekan Enter

**Atau buka XAMPP Control Panel:**

1. Klik tombol "Shell" di control panel XAMPP

---

## 🚀 LANGKAH 2: Navigate ke Project

Copy & Paste di terminal:

```powershell
cd c:\xampp\htdocs\dieqa
```

Tekan Enter. Terminal akan menampilkan:

```
PS C:\xampp\htdocs\dieqa>
```

---

## 🚀 LANGKAH 3: Jalankan Server Laravel

Copy & Paste:

```powershell
php artisan serve
```

Tekan Enter. Terminal akan menampilkan:

```
   INFO  Server running on [http://127.0.0.1:8000]
```

**JANGAN TUTUP TERMINAL INI!** Biarkan tetap berjalan.

---

## 🌐 LANGKAH 4: Buka Browser

1. Buka browser baru (Chrome/Firefox/Edge)
2. Ketik di address bar:

```
http://localhost:8000
```

3. Tekan Enter

**Voilà! Sistem Absensi PKL siap digunakan!** 🎉

---

## 📊 Data yang Sudah Ada

Sistem sudah diisi dengan data contoh:

### Peserta PKL (4 orang):
1. **Ahmad Hidayat** (PKL001) - Teknik Komputer dan Jaringan
2. **Siti Nurhaliza** (PKL002) - Administrasi Perkantoran
3. **Budi Santoso** (PKL003) - Teknik Mesin
4. **Rina Wijaya** (PKL004) - Farmasi

### Absensi (Data bulan ini):
- Setiap peserta sudah memiliki data absensi untuk semua hari kerja bulan ini
- Mix dari status: Hadir, Sakit, Izin, Alpa
- Data ini hanya contoh, bisa dihapus atau dimodifikasi

---

## ✅ Testing Cepat

Setelah sistem buka, coba langkah-langkah ini:

### 1. Cek Daftar Absensi
- Menu di sebelah kiri pilih: **📋 Daftar Absensi**
- Akan menampilkan semua data absensi yang sudah ada
- Coba filter berdasarkan peserta atau bulan

### 2. Cek Laporan
- Pilih menu: **📊 Laporan Absensi**
- Akan menampilkan ringkasan absensi per peserta
- Lihat presentase kehadiran

### 3. Cek Peserta
- Pilih menu: **👥 Manajemen Peserta**
- Akan menampilkan 4 peserta contoh
- Coba klik "Edit" atau lihat detail peserta

### 4. Input Absensi Baru
- Pilih menu: **➕ Input Absensi Baru**
- Isi form dengan data peserta yang ada
- Coba pilih tanggal berbeda
- Simpan dan lihat di Daftar Absensi

---

## 🎨 Eksplorasi Interface

Luangkan waktu untuk eksplorasi:

| Elemen | Keterangan |
|--------|-----------|
| **Sidebar Kiri** | Menu utama sistem |
| **Top Bar** | Judul sistem dan header |
| **Tombol Aksi** | Edit, Hapus, Tambah, Simpan |
| **Alert** | Pesan sukses atau error |
| **Tab** | Filter status peserta |
| **Badge** | Indikator status dan presentase |

---

## 🛑 Jika Ada Error

### Error 1: "Connection refused"
```
SQLSTATE[HY000]: General error: 2006 MySQL server has gone away
```

**Solusi:**
- Pastikan MySQL sudah running di XAMPP
- Klik "Start" pada XAMPP Control Panel untuk MySQL

### Error 2: "No application encryption key has been specified"
```
RuntimeException: No application encryption key has been specified
```

**Solusi:**
```powershell
php artisan key:generate
```

Jalankan command di atas, lalu refresh browser.

### Error 3: "SQLSTATE[42S02]: Table or view not found"
```
SQLSTATE[42S02]: Table or view not found: 1146
```

**Solusi:**
```powershell
php artisan migrate
```

### Error 4: "Port 8000 already in use"
```
The Application has encountered an error
Port 8000 is already in use.
```

**Solusi:**
```powershell
php artisan serve --port=8001
```

Kemudian akses: `http://localhost:8001`

---

## 💡 Tips

✅ **Jangan Tutup Terminal** - Server harus tetap running

✅ **Refresh Browser** - Jika ada perubahan, refresh dengan `F5` atau `Ctrl+R`

✅ **Clear Browser Cache** - Jika masalah display, gunakan `Ctrl+Shift+Del` untuk clear cache

✅ **Coba Semua Menu** - Eksplorasi semua fitur untuk familiar dengan sistem

✅ **Test Semua Aksi** - Coba Create, Read, Update, Delete untuk semua menu

---

## 🔍 Debug Mode

Jika ada yang error, buka terminal di browser:
1. Tekan `F12` untuk buka Developer Tools
2. Buka tab "Console"
3. Lihat error message yang muncul

Atau cek di terminal Laravel Anda untuk error logs.

---

## ❓ Pertanyaan Umum

**Q: Berapa lama server harus running?**
A: Sepanjang Anda menggunakan aplikasi. Tutup terminal jika sudah selesai.

**Q: Bisakah saya input data kapan saja?**
A: Ya, Anda bisa input data kapan saja, tanggal apapun, tanpa limitation.

**Q: Apakah data otomatis backup?**
A: Tidak. Anda perlu manual backup database jika perlu.

**Q: Bisakah saya reset semua data?**
A: Ya, jalankan:
```powershell
php artisan migrate:reset
php artisan migrate
php artisan db:seed
```

**Q: Bagaimana jika lupa akses kembali?**
A: Cukup jalankan `php artisan serve` lagi dan buka `http://localhost:8000`

---

## 📚 Dokumentasi Lanjutan

Setelah familiar dengan sistem, baca:

1. **QUICK_START.md** - Panduan penggunaan lengkap
2. **PETUNJUK_INSTALASI.md** - Instalasi dan konfigurasi
3. **TESTING_CHECKLIST.md** - Checklist testing sebelum go-live
4. **INDEX_DOKUMENTASI.md** - Indeks semua dokumentasi

---

## ✨ Fitur Unggulan yang Bisa Anda Coba

### Inputan Absensi
- Support jam masuk dan jam keluar
- Support 4 status: Hadir, Sakit, Izin, Alpa
- Bisa add keterangan tambahan
- Validasi otomatis satu peserta satu hari

### Laporan Otomatis
- Hitung presentase kehadiran
- Badge warna berdasarkan presentase
- Filter bulan
- Print ready

### Manajemen Peserta
- Tambah peserta baru
- Edit data peserta
- Ubah status peserta
- Delete peserta

---

## 🎓 Next Steps

Setelah Anda familiar dengan sistem:

1. **Add Peserta Baru** - Coba tambah peserta PKL baru via menu
2. **Input Absensi Manual** - Coba input absensi untuk hari kemarin atau hari ini
3. **Buat Laporan** - Generate laporan absensi dan print
4. **Backup Data** - Export database untuk backup

---

## 🆘 Perlu Bantuan?

Jika ada yang tidak jelas:

1. Baca README.md di root project
2. Cek PETUNJUK_INSTALASI.md bagian Troubleshooting
3. Lihat error message yang muncul
4. Hubungi administrator sistem

---

## 🎉 Selamat!

Anda sudah siap menggunakan Sistem Absensi PKL Kodim 0611 Garut!

Semoga sistem ini membantu mengelola absensi peserta PKL dengan lebih efisien dan terorganisir. 

**Happy Coding! 🚀**

---

**Jangan lupa:** Semua dokumentasi dapat diakses di folder project ini. Setiap file diberi nama jelas untuk mudah dikenali.

