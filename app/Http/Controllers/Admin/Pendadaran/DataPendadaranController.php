<?php

namespace App\Http\Controllers\Admin\Pendadaran;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Pendadaran\Pendadaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataPendadaranController extends Controller
{
    public function index()
    {
        return view('admin.pendadaran.index');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.pendadaran.show', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $pendadaran = Pendadaran::findOrFail($id);
        return view('admin.pendadaran.edit', compact('pendadaran'));
    }

    public function update(Request $request, $id)
    {
        $messages = ['required_if' => 'Silahkan isi :attribute jika status ditolak'];
        $request->validate([
            'status' => 'required|in:terima,tolak',
            'keterangan' => 'required_if:status,tolak',
        ], $messages);

        $pendadaran = Pendadaran::findOrFail($id);
        $pendadaran->status = strtolower(htmlspecialchars($request->status));
        if ($pendadaran->status == 'terima') {
            if ($request->keterangan == null) {
                $pendadaran->keterangan = 'pendaftarakan telah diterima, silahkan menunggu untuk jadwal sidang pendadaran.';
                $pendadaran->tgl_terima =  date(now());
            } else {
                $pendadaran->keterangan = strtolower(htmlspecialchars($request->keterangan));
                $pendadaran->tgl_terima =  date(now());
            }
        } else {
            $pendadaran->keterangan = strtolower(htmlspecialchars($request->keterangan));
            $pendadaran->tgl_terima = NULL;
        }
        $pendadaran->save();
        Alert::success('Berhasil', 'Status pendadaran berhasil dirubah!');
        return redirect()->route('data-pendadaran.index');
    }

    public function destroy($id)
    {
        //
    }
}
