<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensis';
    
    protected $fillable = [
        'peserta_pkl_id',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function pesertaPkl()
    {
        return $this->belongsTo(PesertaPkl::class, 'peserta_pkl_id');
    }
}
