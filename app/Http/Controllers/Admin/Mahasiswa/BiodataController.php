<?php

namespace App\Http\Controllers\Admin\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileTrait;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BiodataController extends Controller
{
    use FileTrait;

    public function index()
    {
        return view('admin.data-mahasiswa.index');
    }

    public function store()
    {
        // 1. Ambil data API rubah menjadi json
        $mahasiswa = Mahasiswa::all();

        // 2. Perulangan untuk menyinpan api ke table user
        foreach ($mahasiswa as $data) {
            // 3. Pengecekan data dalam database
            $user = User::where('username', '=', $data->nim)->first();
            if (!$user) {
                // 4. Insert data user
                $mahasiswa = new User;
                $mahasiswa->username = $data['nim'];
                $mahasiswa->password = Hash::make($data['nim']);
                $mahasiswa->save();
                $mahasiswa->assignRole('mahasiswa');
            }
        }
        Alert::success('Berhasil', 'Data login mahasiswa berhasil ditambahkan');
        // 5. Redirect ke view mahasiswa
        return redirect()->route('data-mahasiswa.index');
    }

    public function destroy($id)
    {
        $mhs = Mahasiswa::findOrFail($id);
        if ($mhs->seminar) {
            $this->deleteFile($mhs->seminar->krs);
            $this->deleteFile($mhs->seminar->transkip_nilai);
            $this->deleteFile($mhs->seminar->laporan_kp);
            $this->deleteFile($mhs->seminar->keuangan);
            $this->deleteFile($mhs->seminar->konsultasi);
            $mhs->delete();
        }

        if ($mhs->pendadaran) {
            $this->deleteFile($mhs->pendadaran->krs);
            $this->deleteFile($mhs->pendadaran->transkip_nilai);
            $this->deleteFile($mhs->pendadaran->konsultasi);
            $this->deleteFile($mhs->pendadaran->perkuliahan);
            $this->deleteFile($mhs->pendadaran->keuangan);
            $this->deleteFile($mhs->pendadaran->perpustakaan);
            $this->deleteFile($mhs->pendadaran->laboratorium);
            $this->deleteFile($mhs->pendadaran->action);
            $this->deleteFile($mhs->pendadaran->kompetensi);
            $this->deleteFile($mhs->pendadaran->toefl);
            $this->deleteFile($mhs->pendadaran->ijazah);
            $this->deleteFile($mhs->pendadaran->ktp);
            $this->deleteFile($mhs->pendadaran->akte);
            $this->deleteFile($mhs->pendadaran->foto);
        }

        $mhs->delete();
    }
}
