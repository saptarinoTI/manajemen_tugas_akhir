<?php

namespace App\Models\Proposal;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = 'proposal';
    protected $fillable = [
        'mahasiswa_nim', 'file', 'tgl_terima', 'status', 'keterangan'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
