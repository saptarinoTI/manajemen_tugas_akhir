<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\SemhasRequest;
use App\Http\Requests\UpdateSemhasRequest;
use App\Http\Traits\FileTrait;
use Illuminate\Support\Facades\File;
use App\Models\Mahasiswa;
use App\Models\Seminar\Seminar;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SeminarHasilController extends Controller
{
    use FileTrait;

    public function index()
    {
        $nim = Auth::user()->username;
        $mahasiswa = Mahasiswa::where('nim', '=', $nim)->first();
        if ($mahasiswa) {
            $seminar = Seminar::select('id', 'mahasiswa_nim', 'status', 'keterangan', 'created_at', 'updated_at')->where('mahasiswa_nim', '=', $mahasiswa->nim)->first();
        } else {
            Alert::toast('Silahkan isi data diri, sebelum mendaftar seminar hasil', 'warning');
            return redirect()->route('data-diri.index');
        }
        return view('mahasiswa.semhas.index', compact('mahasiswa', 'seminar'));
    }

    public function create()
    {
        $nim = auth()->user()->username;
        $mahasiswa = Mahasiswa::where('nim', '=', $nim)->first();
        return view('mahasiswa.semhas.create', compact('nim', 'mahasiswa'));
    }

    public function store(SemhasRequest $request)
    {
        $nim = $request->mahasiswa_nim;
        // Insert to File Semhas Table
        $file = new Seminar;
        $file->mahasiswa_nim = $nim;
        $file->krs = $this->uploadFile($request, 'krs', 'semhas/krs', $nim);
        $file->transkip_nilai = $this->uploadFile($request, 'transkip_nilai', 'semhas/transkip_nilai', $nim);
        $file->laporan_kp = $this->uploadFile($request, 'laporan_kp', 'semhas/laporan_kp', $nim);
        $file->keuangan = $this->uploadFile($request, 'keuangan', 'semhas/keuangan', $nim);
        $file->konsultasi = $this->uploadFile($request, 'konsultasi', 'semhas/konsultasi', $nim);
        $file->keterangan = "silahkan bertemu prodi teknik informatika, untuk memberikan berkas tugas akhir yang sudah ditanda tangani oleh dosen pembimbing. sebanyak 1 rangkap asli + 3 rangkap fotocopy.";
        $file->status = 'pending';
        $seminar = $file->save();

        if ($seminar) {
            Alert::success('Berhasil', 'Data pendaftaran seminar hasil berhasil ditambahkan!',);
            return redirect()->route('seminar-hasil.index');
        }
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.semhas.show', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $seminar = Seminar::findOrFail($id);
        return view('mahasiswa.semhas.edit', compact('seminar'));
    }

    public function update(UpdateSemhasRequest $request, $id)
    {
        // Insert to File Semhas Table
        $seminar = Seminar::findOrFail($id);
        $nim = $seminar->mahasiswa_nim;
        if ($request->hasFile('krs')) {
            File::delete('storage/' . $seminar->krs);
            $seminar->krs = $this->uploadFile($request, 'krs', 'semhas/krs', $nim);
            $seminar->update(['krs' => $seminar->krs]);
        }
        if ($request->hasFile('transkip_nilai')) {
            File::delete('storage/' . $seminar->transkip_nilai);
            $seminar->transkip_nilai = $this->uploadFile($request, 'transkip_nilai', 'semhas/transkip_nilai', $nim);
            $seminar->update(['transkip_nilai' => $seminar->transkip_nilai]);
        }
        if ($request->hasFile('laporan_kp')) {
            File::delete('storage/' . $seminar->laporan_kp);
            $seminar->laporan_kp = $this->uploadFile($request, 'laporan_kp', 'semhas/laporan_kp', $nim);
            $seminar->update(['laporan_kp' => $seminar->laporan_kp]);
        }
        if ($request->hasFile('keuangan')) {
            File::delete('storage/' . $seminar->keuangan);
            $seminar->keuangan = $this->uploadFile($request, 'keuangan', 'semhas/keuangan', $nim);
            $seminar->update(['keuangan' => $seminar->keuangan]);
        }
        if ($request->hasFile('konsultasi')) {
            File::delete('storage/' . $seminar->konsultasi);
            $seminar->konsultasi = $this->uploadFile($request, 'konsultasi', 'semhas/konsultasi', $nim);
            $seminar->update(['konsultasi' => $seminar->konsultasi]);
        }
        $seminar->status = 'pending';
        $seminar->keterangan = 'silahkan bertemu bagian prodi teknik informatika untuk memberikan berkas tugas akhir yang sudah ditanda tangani oleh dosen pembimbing. sebanyak 1 rangkap asli + 3 rangkap fotocopy.';
        $seminar->updated_at = date(now());
        $seminar->save();
        Alert::success('Berhasil', 'Data seminar berhasil diubah!');
        return redirect()->route('seminar-hasil.index');
    }
}
