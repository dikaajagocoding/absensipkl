# 👨‍💻 DEVELOPER NOTES - Sistem Absensi PKL

Catatan teknis untuk developer yang ingin maintain atau extend sistem ini.

---

## 🏗️ Architecture Overview

```
┌─────────────────────────────────────────┐
│        Frontend (Blade Templates)       │
│  - Bootstrap 5.3 UI                     │
│  - Form validation                      │
│  - Responsive design                    │
└────────────────┬────────────────────────┘
                 │
┌─────────────────────────────────────────┐
│    Controllers (AbsensiController,      │
│     PesertaPklController)               │
│  - Request handling                     │
│  - Validation logic                     │
│  - Business logic                       │
└────────────────┬────────────────────────┘
                 │
┌─────────────────────────────────────────┐
│   Models (Eloquent ORM)                 │
│  - Absensi.php                          │
│  - PesertaPkl.php                       │
│  - Relationships & scopes               │
└────────────────┬────────────────────────┘
                 │
┌─────────────────────────────────────────┐
│   Database (MySQL/MariaDB)              │
│  - peserta_pkl table                    │
│  - absensis table                       │
└─────────────────────────────────────────┘
```

---

## 📂 Struktur File Detail

### Controllers Location
```
app/Http/Controllers/
├── AbsensiController.php (170+ lines)
└── PesertaPklController.php (90+ lines)
```

**AbsensiController Methods:**
- `index()` - List absensi dengan filter
- `create()` - Form input absensi
- `store()` - Simpan absensi baru
- `edit()` - Form edit absensi
- `update()` - Update absensi
- `destroy()` - Hapus absensi
- `laporan()` - Generate laporan
- `countHariKerja()` - Helper method

**PesertaPklController Methods:**
- `index()` - List peserta dengan filter status
- `create()` - Form tambah peserta
- `store()` - Simpan peserta baru
- `edit()` - Form edit peserta
- `update()` - Update peserta
- `destroy()` - Hapus peserta

### Models Location
```
app/Models/
├── Absensi.php
└── PesertaPkl.php
```

**Absensi Model:**
- Properties: id, peserta_pkl_id, tanggal, jam_masuk, jam_keluar, status, keterangan
- Relationship: `belongsTo()` PesertaPkl
- Casts: tanggal as date

**PesertaPkl Model:**
- Properties: id, nama, nomor_induk, sekolah, jurusan, tanggal_mulai, tanggal_selesai, pembimbing, status
- Relationship: `hasMany()` Absensi
- Casts: tanggal_mulai, tanggal_selesai as date

### Views Location
```
resources/views/
├── layouts/
│   └── app.blade.php (main template)
├── absensi/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── laporan.blade.php
└── peserta-pkl/
    ├── index.blade.php
    ├── create.blade.php
    └── edit.blade.php
```

### Routes Location
```
routes/web.php
```

**Routes defined:**
- `GET /` → redirect ke absensi.index
- `GET|POST|PUT|DELETE /absensi/*` → CRUD absensi (Resource)
- `GET /absensi-laporan` → Laporan absensi
- `GET|POST|PUT|DELETE /peserta-pkl/*` → CRUD peserta (Resource)

### Migrations Location
```
database/migrations/
├── 2025_11_27_000003_create_peserta_pkl_table.php
└── 2025_11_27_000004_create_absensis_table.php
```

---

## 🗄️ Database Schema

### Table: peserta_pkl
```sql
CREATE TABLE peserta_pkl (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    nomor_induk VARCHAR(255) NOT NULL UNIQUE,
    sekolah VARCHAR(255) NOT NULL,
    jurusan VARCHAR(255) NOT NULL,
    tanggal_mulai DATE NOT NULL,
    tanggal_selesai DATE NOT NULL,
    pembimbing VARCHAR(255) NULL,
    status ENUM('aktif', 'selesai', 'berhenti') DEFAULT 'aktif',
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Table: absensis
```sql
CREATE TABLE absensis (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    peserta_pkl_id BIGINT UNSIGNED NOT NULL,
    tanggal DATE NOT NULL,
    jam_masuk TIME NULL,
    jam_keluar TIME NULL,
    status VARCHAR(255) DEFAULT 'hadir',
    keterangan TEXT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    UNIQUE(peserta_pkl_id, tanggal),
    FOREIGN KEY(peserta_pkl_id) REFERENCES peserta_pkl(id) ON DELETE CASCADE
);
```

---

## 🔧 Kode Snippet Berguna

### Query untuk mendapatkan laporan absensi
```php
$peserta = PesertaPkl::find($id);
$absensis = Absensi::where('peserta_pkl_id', $peserta->id)
    ->whereYear('tanggal', $year)
    ->whereMonth('tanggal', $month)
    ->get();

$hadir = $absensis->where('status', 'hadir')->count();
$sakit = $absensis->where('status', 'sakit')->count();
$izin = $absensis->where('status', 'izin')->count();
$alpa = $absensis->where('status', 'alpa')->count();
```

### Hitung hari kerja dalam bulan
```php
$hariKerja = 0;
$daysInMonth = Carbon::parse($bulan . '-01')->daysInMonth;

for ($i = 1; $i <= $daysInMonth; $i++) {
    $date = Carbon::parse($bulan . '-' . str_pad($i, 2, '0', STR_PAD_LEFT));
    if ($date->dayOfWeek >= 1 && $date->dayOfWeek <= 5) {
        $hariKerja++;
    }
}
```

### Cek duplicate absensi
```php
$exists = Absensi::where('peserta_pkl_id', $peserta_id)
    ->whereDate('tanggal', $tanggal)
    ->exists();
```

---

## 📝 Validation Rules

### Absensi Validation
```php
$validated = $request->validate([
    'peserta_pkl_id' => 'required|exists:peserta_pkl,id',
    'tanggal' => 'required|date',
    'jam_masuk' => 'nullable|date_format:H:i',
    'jam_keluar' => 'nullable|date_format:H:i',
    'status' => 'required|in:hadir,sakit,izin,alpa',
    'keterangan' => 'nullable|string',
]);
```

### PesertaPkl Validation
```php
$validated = $request->validate([
    'nama' => 'required|string|max:255',
    'nomor_induk' => 'required|string|unique:peserta_pkl',
    'sekolah' => 'required|string|max:255',
    'jurusan' => 'required|string|max:255',
    'tanggal_mulai' => 'required|date',
    'tanggal_selesai' => 'required|date|after:tanggal_mulai',
    'pembimbing' => 'nullable|string|max:255',
]);
```

---

## 🎯 Blade Template Best Practices

### Conditional Rendering
```blade
@if($absensi->status == 'hadir')
    <span class="badge bg-success">✓ Hadir</span>
@endif
```

### Loop dengan Empty Check
```blade
@forelse($absensis as $absensi)
    <tr>
        <td>{{ $absensi->tanggal->format('d/m/Y') }}</td>
    </tr>
@empty
    <tr><td colspan="8">Tidak ada data</td></tr>
@endforelse
```

### Form with Old Values
```blade
<input type="text" name="nama" value="{{ old('nama', $peserta->nama) }}">
```

---

## 🔍 Debug Tips

### Tinker Console
```bash
php artisan tinker

# List semua peserta
>>> App\Models\PesertaPkl::all()

# Find peserta by ID
>>> App\Models\PesertaPkl::find(1)

# Count absensis
>>> App\Models\Absensi::count()

# Filter absensi by bulan
>>> App\Models\Absensi::whereMonth('tanggal', 11)->get()
```

### Log Helper
```php
// Di controller atau model
Log::info('Peserta ditambahkan: ' . $peserta->nama);
```

### Dump and Die
```blade
{{ dd($absensis) }} {{-- Dalam blade template --}}
```

---

## 🚀 Cara Extend Sistem

### Add New Feature - Contoh: Export ke Excel

1. **Install package:**
```bash
composer require maatwebsite/excel
```

2. **Create export class:**
```php
php artisan make:export AbsensiExport --model=Absensi
```

3. **Update controller:**
```php
use Maatwebsite\Excel\Facades\Excel;

public function export(Request $request) {
    return Excel::download(new AbsensiExport, 'absensi.xlsx');
}
```

4. **Add route:**
```php
Route::get('absensi/export', [AbsensiController::class, 'export'])->name('absensi.export');
```

### Add New Field - Contoh: Add Email Peserta

1. **Create migration:**
```bash
php artisan make:migration add_email_to_peserta_pkl
```

2. **Edit migration:**
```php
Schema::table('peserta_pkl', function (Blueprint $table) {
    $table->string('email')->nullable()->after('nama');
});
```

3. **Run migration:**
```bash
php artisan migrate
```

4. **Update Model:**
```php
protected $fillable = [..., 'email', ...];
```

5. **Update Forms & Views**

---

## 🐛 Common Issues & Solutions

### Issue: SQLSTATE[HY000]
**Cause**: MySQL connection lost  
**Solution**: Restart MySQL dari XAMPP

### Issue: Column not found
**Cause**: Migration belum dijalankan  
**Solution**: `php artisan migrate`

### Issue: Duplicate entry
**Cause**: Unique constraint violation  
**Solution**: Check database, unique field sudah ada

### Issue: Page still blank setelah update
**Cause**: Browser cache  
**Solution**: Clear browser cache (`Ctrl+Shift+Del`)

---

## 📊 Performance Optimization Tips

### Add Index to Frequently Queried Columns
```php
Schema::table('absensis', function (Blueprint $table) {
    $table->index('tanggal');
    $table->index('status');
});
```

### Eager Loading untuk Avoid N+1 Query
```php
// Baik ✓
$absensis = Absensi::with('pesertaPkl')->get();

// Buruk ✗
$absensis = Absensi::all();
foreach ($absensis as $abs) {
    echo $abs->pesertaPkl->nama; // Query di setiap loop
}
```

### Pagination untuk Large Dataset
```php
$absensis = Absensi::paginate(20); // bukan ->get()
```

---

## 🧪 Testing Checklist untuk Developer

- [ ] Test semua CRUD operations
- [ ] Test validation rules
- [ ] Test relationship loading
- [ ] Test filter/search functionality
- [ ] Test pagination
- [ ] Test delete dengan cascade
- [ ] Test error handling
- [ ] Test form submission
- [ ] Test redirect after action
- [ ] Test permission/authorization

---

## 📚 Useful Commands

```bash
# Development
php artisan serve                          # Start dev server
php artisan tinker                         # Interactive shell

# Database
php artisan migrate                        # Run migrations
php artisan migrate:rollback              # Rollback last batch
php artisan db:seed                       # Run all seeders
php artisan db:seed --class=AbsensiSeeder # Run specific seeder

# Maintenance
php artisan cache:clear                   # Clear application cache
php artisan config:cache                  # Cache config
php artisan config:clear                  # Clear config cache
php artisan route:cache                   # Cache routes
php artisan view:clear                    # Clear view cache

# Generate
php artisan make:model ModelName          # Create model
php artisan make:controller ControllerName # Create controller
php artisan make:migration create_table   # Create migration
php artisan make:seeder SeederName        # Create seeder
```

---

## 🔐 Security Considerations

1. **Always validate input** - Use Laravel validation rules
2. **Use parameterized queries** - Eloquent ORM handles this
3. **Escape output** - Blade template auto-escape
4. **Validate relationships** - Gunakan exists() rule
5. **Soft deletes** - Consider untuk future audit trail
6. **Audit logging** - Log sensitive actions

---

## 📖 Learning Resources

- Laravel Documentation: https://laravel.com/docs
- Eloquent ORM: https://laravel.com/docs/eloquent
- Blade Template: https://laravel.com/docs/blade
- Testing Guide: https://laravel.com/docs/testing

---

## 🤝 Contributing Guidelines

Jika menambah feature atau fix bug:

1. Create feature branch: `git checkout -b feature/nama-fitur`
2. Make changes
3. Test thoroughly
4. Update documentation
5. Create pull request
6. Code review
7. Merge to main

---

## 📝 Code Style Guidelines

- Follow PSR-12 standard
- Use meaningful variable names
- Add comments untuk complex logic
- Keep methods short and focused
- Use type hints untuk better IDE support

---

**Happy Coding! 🚀**

Jangan ragu untuk extend atau improve sistem ini. Dokumentasi ini akan membantu Anda memahami arsitektur dan bagaimana cara mengembangkannya.

