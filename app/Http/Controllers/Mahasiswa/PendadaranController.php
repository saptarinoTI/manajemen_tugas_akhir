<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\PendadaranRequest;
use App\Http\Requests\UpdatePendadaranRequest;
use App\Http\Traits\FileTrait;
use App\Models\Mahasiswa;
use App\Models\Pendadaran\Pendadaran;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PendadaranController extends Controller
{
    use FileTrait;

    public function index()
    {
        $nim = Auth::user()->username;
        $mahasiswa = Mahasiswa::where('nim', '=', $nim)->with('seminar')->first();
        // $seminar = Seminar::where('status', '=', 'terima')->first();
        $seminar = Mahasiswa::where('nim', '=', $nim)->whereHas('seminar', function ($query) {
            $query->select('status');
        })->first();
        // dd($mahasiswa->seminar);
        if ($mahasiswa === null) {
            Alert::toast('Silahkan isi data diri, sebelum mendaftar pendadaran.', 'warning');
            return redirect()->back();
        }

        if ($mahasiswa->seminar) {
            if ($mahasiswa->seminar->status === "terima") {
                $pendadaran = Pendadaran::select('id', 'mahasiswa_nim', 'status', 'keterangan', 'created_at', 'updated_at')->where('mahasiswa_nim', '=', $mahasiswa->nim)->first();
            } else {
                Alert::toast('Status seminar hasil belum diterima, silahkan selesaikan terlebih dahulu.', 'warning');
                return redirect()->back();
            }
        } else {
            Alert::toast('Silahkan selesaikan seminar hasil, sebelum mendaftar pendadaran.', 'warning');
            return redirect()->back();
        }
        return view('mahasiswa.pendadaran.index', compact('pendadaran', 'mahasiswa'));
    }

    public function create()
    {
        $nim = auth()->user()->username;
        $mahasiswa = Mahasiswa::where('nim', '=', $nim)->first();
        return view('mahasiswa.pendadaran.create', compact('nim', 'mahasiswa'));
    }

    public function store(PendadaranRequest $request)
    {
        $nim = $request->mahasiswa_nim;
        // Insert to File Pendadaran Table
        $file = new Pendadaran;
        $file->mahasiswa_nim = $nim;
        $file->krs = $this->uploadFile($request, 'krs', 'pendadaran/krs', $nim);
        $file->transkip_nilai = $this->uploadFile($request, 'transkip_nilai', 'pendadaran/transkip_nilai', $nim);
        $file->konsultasi = $this->uploadFile($request, 'konsultasi', 'pendadaran/konsultasi', $nim);
        $file->perkuliahan = $this->uploadFile($request, 'perkuliahan', 'pendadaran/perkuliahan', $nim);
        $file->keuangan = $this->uploadFile($request, 'keuangan', 'pendadaran/keuangan', $nim);
        $file->perpustakaan = $this->uploadFile($request, 'perpustakaan', 'pendadaran/perpustakaan', $nim);
        $file->laboratorium = $this->uploadFile($request, 'laboratorium', 'pendadaran/laboratorium', $nim);
        $file->action = $this->uploadFile($request, 'action', 'pendadaran/action', $nim);
        $file->kompetensi = $this->uploadFile($request, 'kompetensi', 'pendadaran/kompetensi', $nim);
        $file->toefl = $this->uploadFile($request, 'toefl', 'pendadaran/toefl', $nim);
        $file->ijazah = $this->uploadFile($request, 'ijazah', 'pendadaran/ijazah', $nim);
        $file->ktp = $this->uploadFile($request, 'ktp', 'pendadaran/ktp', $nim);
        $file->akte = $this->uploadFile($request, 'akte', 'pendadaran/akte', $nim);
        $file->foto = $this->uploadFile($request, 'foto', 'pendadaran/foto', $nim);
        // $file->status = 'pending';
        // $file->keterangan = 'silahkan bertemu bagian prodi teknik informatika untuk memberikan berkas tugas akhir yang sudah ditanda tangani oleh dosen pembimbing. sebanyak 4 rangkap (1 rangkap asli).';
        $file->save();

        Alert::success('Berhasil', 'Data pendaftaran pendadaran berhasil ditambahkan!');
        return redirect()->route('pendadaran.index');
    }

    public function show($id)
    {
        $pendadaran = Pendadaran::findOrFail($id);
        return view('mahasiswa.pendadaran.show', compact('pendadaran'));
    }

    public function edit($id)
    {
        $pendadaran = Pendadaran::findOrFail($id);
        return view('mahasiswa.pendadaran.edit', compact('pendadaran'));
    }

    public function update(UpdatePendadaranRequest $request, $id)
    {
        // Insert to File pendadaran Table
        $filePendadaran = Pendadaran::findOrFail($id);
        $nim = $filePendadaran->mahasiswa_nim;
        if ($request->hasFile('krs')) {
            File::delete('storage/' . $filePendadaran->krs);
            $filePendadaran->krs = $this->uploadFile($request, 'krs', 'pendadaran/krs', $nim);
            $filePendadaran->update(['krs' => $filePendadaran->krs]);
        }
        if ($request->hasFile('transkip_nilai')) {
            File::delete('storage/' . $filePendadaran->transkip_nilai);
            $filePendadaran->transkip_nilai = $this->uploadFile($request, 'transkip_nilai', 'pendadaran/transkip_nilai', $nim);
            $filePendadaran->update(['transkip_nilai' => $filePendadaran->transkip_nilai]);
        }
        if ($request->hasFile('konsultasi')) {
            File::delete('storage/' . $filePendadaran->konsultasi);
            $filePendadaran->konsultasi = $this->uploadFile($request, 'konsultasi', 'pendadaran/konsultasi', $nim);
            $filePendadaran->update(['konsultasi' => $filePendadaran->konsultasi]);
        }
        if ($request->hasFile('perkuliahan')) {
            File::delete('storage/' . $filePendadaran->perkuliahan);
            $filePendadaran->perkuliahan = $this->uploadFile($request, 'perkuliahan', 'pendadaran/perkuliahan', $nim);
            $filePendadaran->update(['perkuliahan' => $filePendadaran->perkuliahan]);
        }
        if ($request->hasFile('keuangan')) {
            File::delete('storage/' . $filePendadaran->keuangan);
            $filePendadaran->keuangan = $this->uploadFile($request, 'keuangan', 'pendadaran/keuangan', $nim);
            $filePendadaran->update(['keuangan' => $filePendadaran->keuangan]);
        }
        if ($request->hasFile('perpustakaan')) {
            File::delete('storage/' . $filePendadaran->perpustakaan);
            $filePendadaran->perpustakaan = $this->uploadFile($request, 'perpustakaan', 'pendadaran/perpustakaan', $nim);
            $filePendadaran->update(['perpustakaan' => $filePendadaran->perpustakaan]);
        }
        if ($request->hasFile('laboratorium')) {
            File::delete('storage/' . $filePendadaran->laboratorium);
            $filePendadaran->laboratorium = $this->uploadFile($request, 'laboratorium', 'pendadaran/laboratorium', $nim);
            $filePendadaran->update(['laboratorium' => $filePendadaran->laboratorium]);
        }
        if ($request->hasFile('action')) {
            File::delete('storage/' . $filePendadaran->action);
            $filePendadaran->action = $this->uploadFile($request, 'action', 'pendadaran/action', $nim);
            $filePendadaran->update(['action' => $filePendadaran->action]);
        }
        if ($request->hasFile('kompetensi')) {
            File::delete('storage/' . $filePendadaran->kompetensi);
            $filePendadaran->kompetensi = $this->uploadFile($request, 'kompetensi', 'pendadaran/kompetensi', $nim);
            $filePendadaran->update(['kompetensi' => $filePendadaran->kompetensi]);
        }
        if ($request->hasFile('toefl')) {
            File::delete('storage/' . $filePendadaran->toefl);
            $filePendadaran->toefl = $this->uploadFile($request, 'toefl', 'pendadaran/toefl', $nim);
            $filePendadaran->update(['toefl' => $filePendadaran->toefl]);
        }
        if ($request->hasFile('ijazah')) {
            File::delete('storage/' . $filePendadaran->ijazah);
            $filePendadaran->ijazah = $this->uploadFile($request, 'ijazah', 'pendadaran/ijazah', $nim);
            $filePendadaran->update(['ijazah' => $filePendadaran->ijazah]);
        }
        if ($request->hasFile('ktp')) {
            File::delete('storage/' . $filePendadaran->ktp);
            $filePendadaran->ktp = $this->uploadFile($request, 'ktp', 'pendadaran/ktp', $nim);
            $filePendadaran->update(['ktp' => $filePendadaran->ktp]);
        }
        if ($request->hasFile('akte')) {
            File::delete('storage/' . $filePendadaran->akte);
            $filePendadaran->akte = $this->uploadFile($request, 'akte', 'pendadaran/akte', $nim);
            $filePendadaran->update(['akte' => $filePendadaran->akte]);
        }
        if ($request->hasFile('foto')) {
            File::delete('storage/' . $filePendadaran->foto);
            $filePendadaran->foto = $this->uploadFile($request, 'foto', 'pendadaran/foto', $nim);
            $filePendadaran->update(['foto' => $filePendadaran->foto]);
        }
        // $filePendadaran->status = 'pending';
        // $filePendadaran->keterangan = 'silahkan bertemu bagian prodi teknik informatika untuk memberikan berkas tugas akhir yang sudah ditanda tangani oleh dosen pembimbing. sebanyak 1 rangkap asli + 3 rangkap fotocopy.';
        $filePendadaran->updated_at = date(now());
        $filePendadaran->save();

        Alert::success('Berhasil', 'Data pendaftaran pendadaran berhasil ditambahkan!');
        return redirect()->route('pendadaran.index');
    }
}
