<?php

namespace App\Models\Seminar;

use App\Models\Mahasiswa;
use App\Models\Proposal\Proposal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;
    protected $table = 'seminar';
    protected $fillable = [
        'mahasiswa_nim', 'proposal_id', 'krs', 'transkip_nilai', 'laporan_kp', 'keuangan', 'konsultasi', 'status', 'keterangan'
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
