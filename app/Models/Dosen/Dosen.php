<?php

namespace App\Models\Dosen;

use App\Models\Mahasiswa;
use App\Models\Pembimbing\Pembimbing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $primaryKey = 'niy';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['niy', 'nama'];

    public function proposal()
    {
        return $this->hasOne(Proposal::class);
    }
}
