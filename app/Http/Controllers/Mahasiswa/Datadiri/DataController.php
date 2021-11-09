<?php

namespace App\Http\Controllers\Mahasiswa\Datadiri;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DataController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $mahasiswa = Auth::user()->username;
        if ($mahasiswa === 'superadmin') {
            $data = Mahasiswa::all();
        } else {
            $data = Mahasiswa::where('nim', '=', $mahasiswa)->get();
        }
        // $data = Mahasiswa::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function ($row) {
                return ucwords($row->nama);
            })
            ->addColumn('ttl', function ($row) {
                return ucwords($row->tmpt_lahir) . ', ' . date('d M Y', strtotime($row->tgl_lahir));
            })
            ->addColumn('alamat', function ($row) {
                return ucwords($row->alamat);
            })
            ->addColumn('pem_utama', function ($row) {
                return ucwords($row->pem_utama);
            })
            ->addColumn('pem_pendamping', function ($row) {
                return ucwords($row->pem_pendamping);
            })
            ->addColumn('judul_ta', function ($row) {
                return ucwords($row->judul_ta);
            })
            ->addColumn('tgl_add', function ($row) {
                return date('d F Y', strtotime($row->created_at));
            })
            ->addColumn('tgl_update', function ($row) {
                return date('d F Y', strtotime($row->updated_at));
            })
            ->addColumn('btn', function ($row) {
                if (Auth::user()->hasRole('mahasiswa')) {
                    return '<a href="data-diri/' . $row->nim . '/edit' . '" class="btn btn-primary btn-sm"><span class="text-sm">Update Data</span></a>';
                }
            })
            ->rawColumns(['nama', 'ttl', 'alamat', 'pem_utama', 'pem_pendamping', 'judul_ta', 'tgl_add', 'tgl_update', 'btn'])
            ->make(true);
    }
}
