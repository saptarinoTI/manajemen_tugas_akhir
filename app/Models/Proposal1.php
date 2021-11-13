<?php

namespace App\Models;

use App\Models\Dosen\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pendadaran\Pendadaran;
use App\Models\Seminar\Seminar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal1 extends Model
{
    use HasFactory;
    protected $table = 'proposal1';
    protected $fillable = [
        'mahasiswa_nim', 'file1', 'file2', 'file3', 'tgl_terima', 'utama_id', 'pendamping_id', 'judul_ta', 'status', 'keterangan'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nim', 'nim');
    }

    public function dosen1()
    {
        return $this->belongsTo(Dosen::class, 'utama_id', 'niy');
    }
    public function dosen2()
    {
        return $this->belongsTo(Dosen::class, 'pendamping_id', 'niy');
    }

    public function seminar()
    {
        return $this->hasOne(Seminar::class);
    }

    public function pendadaran()
    {
        return $this->hasOne(Pendadaran::class);
    }
}
