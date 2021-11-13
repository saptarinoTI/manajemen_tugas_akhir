<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendadaran\Pendadaran;
use App\Models\Proposal1;
use App\Models\Proposal\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class JudulTugasAkhirController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Proposal::where('status', '=', 'diterima')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('daftar_ta', function ($data) {
                    return '<p style="margin: 2px 0; font-size: 16px; font-weight: 600; letter-spacing: .05rem">' . ucwords($data->judul_ta) . '</p>
                <p style="margin: 0; font-size: 14px; font-weight: 400; color: #8a8a8a">' . ucwords($data->mahasiswa->nama) . ' (' . $data->mahasiswa->nim . ') || Pem. Utama: ' . ucwords($data->dosen1->nama) . '  --  Pem. Pendamping: ' . ucwords($data->dosen2->nama) . '</p>';
                })
                ->rawColumns(['daftar_ta'])
                ->make(true);
        }
        return view('judulta.index');
    }
}
