<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Proposal\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class DataDosenController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $idDosen = Auth::user()->username;
            $pro = Proposal::where('utama_id', '=', $idDosen)
                ->orWhere('pendamping_id', '=', $idDosen)
                ->get();
            return DataTables::of($pro)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {
                    return ucwords($row->mahasiswa->nama);
                })
                ->addColumn('judul', function ($row) {
                    return ucwords($row->judul_ta);
                })
                ->addColumn('status', function ($row) {
                    if ($row->utama_id === Auth::user()->username) {
                        return 'Utama';
                    } elseif ($row->pendamping_id === Auth::user()->username) {
                        return 'Pendamping';
                    }
                })
                ->addColumn('tgl', function ($row) {
                    return date('Y', strtotime($row->tgl_terima));
                })
                ->rawColumns(['nama', 'judul', 'status', 'tgl'])
                ->make(true);
        }
        return view('dosen.bimbingan.index');
    }
}
