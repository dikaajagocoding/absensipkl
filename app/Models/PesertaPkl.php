<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesertaPkl extends Model
{
    protected $table = 'peserta_pkl';
    
    protected $fillable = [
        'nama',
        'nomor_induk',
        'sekolah',
        'jurusan',
        'tanggal_mulai',
        'tanggal_selesai',
        'pembimbing',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'peserta_pkl_id');
    }
}
