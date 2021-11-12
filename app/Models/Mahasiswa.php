<?php

namespace App\Models;

use App\Models\Dosen\Dosen;
use App\Models\Pembimbing\Pembimbing;
use App\Models\Pendadaran\Pendadaran;
use App\Models\Proposal\Proposal;
use App\Models\Seminar\Seminar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim', 'nama', 'no_hp', 'tmpt_lahir', 'tgl_lahir', 'alamat', 'judul_ta',
    ];

    public function seminar()
    {
        return $this->hasOne(Seminar::class);
    }

    public function pendadaran()
    {
        return $this->hasOne(Pendadaran::class);
    }

    public function proposal()
    {
        return $this->hasOne(Proposal::class, 'mahasiswa_nim', 'nim');
    }
}
