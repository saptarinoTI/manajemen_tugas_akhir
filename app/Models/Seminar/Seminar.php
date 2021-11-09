<?php

namespace App\Models\Seminar;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;
    protected $table = 'seminar';
    protected $fillable = [
        'mahasiswa_nim', 'krs', 'transkip_nilai', 'laporan_kp', 'keuangan', 'konsultasi', 'status', 'keterangan'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
