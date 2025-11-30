<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    protected $table = 'peralatan';
    
    protected $fillable = [
        'nama_peralatan',
        'kode_peralatan',
        'deskripsi',
        'kategori',
        'merek',
        'tanggal_perolehan',
        'tanggal_maintenance',
        'lokasi_penyimpanan',
        'status',
    ];

    protected $casts = [
        'tanggal_perolehan' => 'date',
        'tanggal_maintenance' => 'date',
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'peralatan_id');
    }
}
