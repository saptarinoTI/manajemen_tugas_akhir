<?php

namespace App\Http\Controllers\Admin\Proposal;

use App\Http\Controllers\Controller;
use App\Models\Dosen\Dosen;
use App\Models\Proposal\Proposal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProposalController extends Controller
{
    public function index()
    {
        return view('admin.proposal.index');
    }

    public function show($id)
    {
        $pro = Proposal::findOrFail($id);
        return view('admin.proposal.show', compact('pro'));
    }

    public function edit($id)
    {
        $dosen = Dosen::all();
        $pro = Proposal::findOrFail($id);
        return view('admin.proposal.edit', compact('pro', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        $messages = ['required_if' => 'Silahkan isi :attribute jika status ditolak'];
        $request->validate([
            'dosen1' => 'required_if:status,diterima',
            'dosen2' => 'required_if:status,diterima',
            'judul_ta' => 'required_if:status,diterima',
            'status' => 'required|in:diterima,ditolak',
            'keterangan' => 'required_if:status,ditolak',
        ], $messages);

        $semhas = Proposal::findOrFail($id);
        $semhas->status = strtolower(htmlspecialchars($request->status));
        if ($semhas->status == 'diterima') {
            if ($request->keterangan == null) {
                $semhas->utama_id = $request->dosen1;
                $semhas->pendamping_id = $request->dosen2;
                $semhas->tgl_terima = date(now());
                $semhas->judul_ta = htmlspecialchars(strtolower($request->judul_ta));
                $semhas->keterangan = 'pendaftarakan proposal tugas akhir telah diterima.';
                $semhas->tgl_terima =  date(now());
            } else {
                $semhas->utama_id = $request->dosen1;
                $semhas->pendamping_id = $request->dosen2;
                $semhas->tgl_terima = date(now());
                $semhas->judul_ta = htmlspecialchars(strtolower($request->judul_ta));
                $semhas->keterangan = strtolower(htmlspecialchars($request->keterangan));
                $semhas->tgl_terima =  date(now());
            }
        } else {
            $semhas->utama_id = null;
            $semhas->pendamping_id = null;
            $semhas->tgl_terima = null;
            $semhas->judul_ta = null;
            $semhas->keterangan = strtolower(htmlspecialchars($request->keterangan));
            $semhas->tgl_terima = null;
        }

        $semhas->save();
        Alert::success('Berhasil', 'Status seminar hasil berhasil dirubah!');
        return redirect()->route('data-proposal.index');
    }

    public function destroy($id)
    {
        //
    }
}
