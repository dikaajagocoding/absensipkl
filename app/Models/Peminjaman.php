<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    
    protected $fillable = [
        'peralatan_id',
        'peminjam_nama',
        'peminjam_no_induk',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'keperluan',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal_peminjaman' => 'date',
        'tanggal_pengembalian' => 'date',
    ];

    public function peralatan()
    {
        return $this->belongsTo(Peralatan::class, 'peralatan_id');
    }
}
