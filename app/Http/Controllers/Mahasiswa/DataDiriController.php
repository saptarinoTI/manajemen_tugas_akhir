<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\MahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Dosen\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pembimbing\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class DataDiriController extends Controller
{
    public function index()
    {
        $nim = Auth::user()->username;
        $mahasiswa = Mahasiswa::where('nim', '=', $nim)->first();
        return view('mahasiswa.data-diri.index', compact('mahasiswa'));
    }

    public function create()
    {
        $nim = Auth::user()->username;
        $dosen = Dosen::all();
        if (auth()->user()->hasRole('superadmin')) {
            $nama = 'superadmin';
        } else {
            $nama = Auth::user()->getDataMahasiswa($nim, 'mhs_nama');
        }
        return view('mahasiswa.data-diri.create', compact('nim', 'nama', 'dosen'));
    }

    public function store(MahasiswaRequest $request)
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = strtolower(htmlspecialchars($request->nim));
        $mahasiswa->nama = strtolower(htmlspecialchars($request->nama));
        $mahasiswa->no_hp = strtolower(htmlspecialchars($request->no_hp));
        $mahasiswa->tmpt_lahir = strtolower(htmlspecialchars($request->tmpt_lahir));
        $mahasiswa->tgl_lahir = strtolower(htmlspecialchars($request->tgl_lahir));
        $mahasiswa->alamat = strtolower(htmlspecialchars($request->alamat));
        $mahasiswa->save();

        Alert::success('Berhasil', 'Data diri berhasil ditambahkan!');
        return redirect()->route('data-diri.index');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.data-diri.edit', compact('mahasiswa'));
    }

    public function update(UpdateMahasiswaRequest $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->nim = strtolower(htmlspecialchars($request->nim));
        $mahasiswa->nama = strtolower(htmlspecialchars($request->nama));
        $mahasiswa->no_hp = strtolower(htmlspecialchars($request->no_hp));
        $mahasiswa->tmpt_lahir = strtolower(htmlspecialchars($request->tmpt_lahir));
        $mahasiswa->tgl_lahir = strtolower(htmlspecialchars($request->tgl_lahir));
        $mahasiswa->alamat = strtolower(htmlspecialchars($request->alamat));
        $mahasiswa->updated_at = date(now());
        $mahasiswa->save();

        Alert::success('Berhasil', 'Data diri berhasil diubah!');
        return redirect()->route('data-diri.index');
    }
}
