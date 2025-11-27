# 📋 Testing Checklist

Gunakan checklist ini untuk memastikan semua fitur berfungsi dengan baik.

## ✅ Pre-Launch Testing

### Database & Setup
- [ ] Database `DB_ABSENSI` sudah ada
- [ ] Migration sudah berhasil (4 tabel: users, cache, jobs, peserta_pkl, absensis)
- [ ] Seeder sudah berjalan (4 data peserta sudah ada)
- [ ] `.env` sudah dikonfigurasi dengan benar

### Server
- [ ] Laravel server berjalan di `http://localhost:8000`
- [ ] Tidak ada error saat startup
- [ ] Browser bisa akses halaman utama

---

## 📊 Feature Testing

### 1. Daftar Absensi
- [ ] Buka menu "Daftar Absensi"
- [ ] Halaman menampilkan tabel absensi (jika ada)
- [ ] Dropdown "Pilih Peserta" berfungsi
- [ ] Pilih bulan dan filter bekerja
- [ ] Pagination bekerja (jika data >20)

### 2. Input Absensi Baru
- [ ] Buka menu "Input Absensi Baru"
- [ ] Dropdown Peserta menampilkan 4 peserta
- [ ] Date picker untuk tanggal berfungsi
- [ ] Time picker untuk jam masuk/keluar berfungsi
- [ ] Dropdown Status menampilkan 4 opsi (Hadir, Sakit, Izin, Alpa)
- [ ] Field Keterangan bisa diisi
- [ ] Submit form berhasil menyimpan data
- [ ] Muncul pesan "Absensi berhasil dicatat"
- [ ] Data muncul di Daftar Absensi

### 3. Edit Absensi
- [ ] Di Daftar Absensi, klik tombol "Edit"
- [ ] Form pre-filled dengan data lama
- [ ] Ubah beberapa field
- [ ] Submit berhasil update
- [ ] Pesan "Absensi berhasil diperbarui" muncul
- [ ] Data terupdate di Daftar Absensi

### 4. Hapus Absensi
- [ ] Di Daftar Absensi, klik tombol "Hapus"
- [ ] Konfirmasi dialog muncul
- [ ] Klik OK untuk menghapus
- [ ] Pesan "Absensi berhasil dihapus" muncul
- [ ] Data hilang dari Daftar Absensi

### 5. Laporan Absensi
- [ ] Buka menu "Laporan Absensi"
- [ ] Tabel menampilkan semua peserta aktif
- [ ] Kolom: Nama, No.Induk, Hadir, Sakit, Izin, Alpa, Total Hari, Presentase
- [ ] Ubah bulan dan lihat data berubah
- [ ] Presentase dihitung dengan benar
- [ ] Badge warna berdasarkan presentase (hijau ≥80%, kuning 60-79%, merah <60%)

### 6. Cetak Laporan
- [ ] Di Laporan Absensi, klik "Cetak Laporan"
- [ ] Dialog print browser terbuka
- [ ] Print preview terlihat benar
- [ ] Cetak atau save as PDF

### 7. Manajemen Peserta
- [ ] Buka menu "Manajemen Peserta"
- [ ] Menampilkan 4 peserta data seeding
- [ ] Tab "Aktif", "Selesai", "Berhenti" berfungsi
- [ ] Klik Edit dan ubah data peserta
- [ ] Perubahan tersimpan
- [ ] Klik Hapus dan konfirmasi muncul
- [ ] Data terhapus dari list

### 8. Tambah Peserta
- [ ] Klik "Tambah Peserta"
- [ ] Form kosong siap input
- [ ] Isi semua field yang required
- [ ] Submit berhasil
- [ ] Peserta muncul di list
- [ ] No. Induk harus unik (test dengan no. duplikat)

### 9. Edit Peserta
- [ ] Di list peserta, klik "Edit"
- [ ] Form pre-filled dengan data
- [ ] Ubah nama dan status
- [ ] Submit berhasil
- [ ] Perubahan terlihat di list
- [ ] Status peserta berpengaruh pada dropdown input absensi

### 10. Navigasi Menu
- [ ] Semua link menu berfungsi
- [ ] Highlight menu aktif berfungsi
- [ ] Bisa navigate ke halaman manapun
- [ ] Back button bekerja

---

## 🎨 UI/UX Testing

- [ ] Layout responsif di desktop (tested)
- [ ] Sidebar tidak menggeser konten
- [ ] Tombol dan link mudah diklik
- [ ] Alert/success message terlihat jelas
- [ ] Warna sesuai (badge status berbeda warna)
- [ ] Font readable di semua browser

---

## ⚠️ Error Handling

- [ ] Submit form kosong: validasi error muncul
- [ ] Nomor induk duplikat: error "sudah ada"
- [ ] Tanggal invalid: error validation
- [ ] Delete dengan confirm batal: data tidak dihapus
- [ ] Filter tanggal kosong: semua data ditampilkan

---

## 🔢 Data Validation Testing

### Format Input
- [ ] Email format check (jika ada)
- [ ] Nomor hanya angka
- [ ] Nama bisa mengandung spasi dan karakter khusus
- [ ] Tanggal format YYYY-MM-DD
- [ ] Jam format HH:MM

### Business Logic
- [ ] Tanggal selesai harus setelah tanggal mulai
- [ ] Satu peserta maksimal 1 absensi per hari
- [ ] Status peserta hanya: aktif, selesai, berhenti
- [ ] Status absensi hanya: hadir, sakit, izin, alpa

---

## 📱 Browser Compatibility

- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Edge (latest)
- [ ] Safari (jika ada Mac)

---

## 🚨 Performance Testing

- [ ] Page load cepat (<2 detik)
- [ ] Tidak ada freeze saat input
- [ ] Filter/search responsif
- [ ] Laporan generate cepat
- [ ] Cetak laporan lancar

---

## 📊 Database Integrity

Jalankan di terminal untuk test:

```bash
# Lihat data peserta
php artisan tinker
>>> App\Models\PesertaPkl::all()

# Lihat data absensi
>>> App\Models\Absensi::all()

# Hitung total absensi
>>> App\Models\Absensi::count()

# Hitung peserta aktif
>>> App\Models\PesertaPkl::where('status', 'aktif')->count()
```

---

## 📝 Notes & Issues

Catat issue yang ditemukan di sini:

| Tanggal | Issue | Status |
|---------|-------|--------|
|         |       |        |
|         |       |        |
|         |       |        |

---

## ✅ Final Approval

- [ ] Semua test checklist passed
- [ ] Tidak ada critical bug
- [ ] Siap untuk go live
- [ ] Data backup sudah dilakukan

---

**Tanggal Testing**: _______________
**Tester**: _______________
**Status**: _____ (PASS / FAIL)

