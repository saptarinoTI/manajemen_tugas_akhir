<?php

namespace App\Http\Controllers\Admin\Pendadaran;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Pendadaran\Pendadaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GetDataPendadaranController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = Pendadaran::with('mahasiswa');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nim', function ($row) {
                return ucwords($row->mahasiswa->nim);
            })
            ->addColumn('nama', function ($row) {
                return ucwords($row->mahasiswa->nama);
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 'terima') {
                    return '<span class="badge bg-success">Diterima</span>';
                } elseif ($row->status == 'tolak') {
                    return '<span class="badge bg-danger">Ditolak</span>';
                } else {
                    return '<span class="badge bg-info">Validasi</span>';
                }
            })
            ->addColumn('tgl_terima', function ($row) {
                if ($row->tgl_terima == null) {
                    return '-';
                } else {
                    return date('d F Y', strtotime($row->tgl_terima));
                }
            })
            ->addColumn('btn', function ($row) {
                return '<a href="data-pendadaran/' . $row->id . '/edit' . '" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                <a href="#modalPendadaran" data-remote="' . route('data-pendadaran.show', $row->mahasiswa->nim) . '"
            data-bs-toggle="modal" data-bs-target="#modalPendadaran"
            data-title="' . $row->mahasiswa->nim . ' - ' . strtoupper($row->mahasiswa->nama) . '" class="my-1 btn btn-sm btn-info"><i class="bi bi-eye-fill"></i></a>';
            })
            ->rawColumns(['nim', 'nama', 'status', 'tgl_terima', 'btn'])
            ->make(true);
    }
}
