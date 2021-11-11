<?php

namespace App\Http\Controllers\Admin\Proposal;

use App\Http\Controllers\Controller;
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
        $pro = Proposal::findOrFail($id);
        return view('admin.proposal.edit', compact('pro'));
    }

    public function update(Request $request, $id)
    {
        $messages = ['required_if' => 'Silahkan isi :attribute jika status ditolak'];
        $request->validate([
            'dosen1' => 'required',
            'dosen2' => 'required',
            'status' => 'required|in:terima,tolak',
            'keterangan' => 'required_if:status,tolak',
        ], $messages);

        $semhas = Seminar::findOrFail($id);
        $semhas->status = strtolower(htmlspecialchars($request->status));
        if ($semhas->status == 'terima') {
            if ($request->keterangan == null) {
                $semhas->keterangan = 'pendaftarakan telah diterima, silahkan menunggu untuk jadwal sidang seminar hasil.';
                $semhas->tgl_terima =  date(now());
            } else {
                $semhas->keterangan = strtolower(htmlspecialchars($request->keterangan));
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

    public function destroy($id)
    {
        //
    }
}
