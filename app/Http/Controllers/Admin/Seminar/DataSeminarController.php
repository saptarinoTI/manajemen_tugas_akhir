<?php

namespace App\Http\Controllers\Admin\Seminar;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Proposal\Proposal;
use App\Models\Seminar\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DataSeminarController extends Controller
{
    public function index()
    {
        return view('admin.seminar.index');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.seminar.show', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $seminar = Seminar::findOrFail($id);
        return view('admin.seminar.edit', compact('seminar'));
    }

    public function update(Request $request, $id)
    {
        $messages = ['required_if' => 'Silahkan isi :attribute jika status ditolak'];
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
            'keterangan' => 'required_if:status,ditolak',
        ], $messages);

        $semhas = Seminar::findOrFail($id);
        $nim = $semhas->mahasiswa->nim;
        $proposal = Proposal::where('mahasiswa_nim', '=', $nim)->first();
        $semhas->status = strtolower(htmlspecialchars($request->status));
        if ($semhas->status == 'diterima') {
            if ($request->keterangan == null) {
                $semhas->keterangan = 'pendaftarakan telah diterima, silahkan menunggu untuk jadwal sidang seminar hasil.';
                $semhas->proposal_id = $proposal->id;
                $semhas->tgl_terima =  date(now());
            } else {
                $semhas->keterangan = strtolower(htmlspecialchars($request->keterangan));
                $semhas->proposal_id = $proposal->id;
                $semhas->tgl_terima =  date(now());
            }
        } else {
            $semhas->keterangan = strtolower(htmlspecialchars($request->keterangan));
            $semhas->tgl_terima = null;
        }

        $semhas->save();
        Alert::success('Berhasil', 'Status seminar hasil berhasil dirubah!');
        return redirect()->route('data-seminar.index');
    }
}
