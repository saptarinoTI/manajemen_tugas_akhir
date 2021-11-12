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
                ->rawColumns(['nama', 'judul'])
                ->make(true);
        }
        return view('dosen.bimbingan.index');
    }
}
