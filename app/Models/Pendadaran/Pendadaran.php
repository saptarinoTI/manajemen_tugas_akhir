<?php

namespace App\Models\Pendadaran;

use App\Models\Mahasiswa;
use App\Models\Proposal\Proposal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendadaran extends Model
{
    use HasFactory;
    protected $table = 'pendadaran';
    protected $fillable = [
        'mahasiswa_nim', 'proposal_id', 'krs', 'transkip_nilai', 'konsultasi', 'perkuliahan', 'keuangan', 'perpustakaan', 'laboratorium', 'action', 'kompetensi', 'toefl', 'ijazah', 'ktp', 'akte', 'foto', 'status', 'tgl_terima', 'keterangan'
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
