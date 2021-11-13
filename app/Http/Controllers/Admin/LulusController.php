<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Pendadaran\Pendadaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LulusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pendadaran::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nim', function ($row) {
                    return ucwords($row->mahasiswa->nim);
                })
                ->addColumn('nama', function ($row) {
                    return ucwords($row->mahasiswa->nama);
                })
                ->addColumn('alamat', function ($row) {
                    return ucwords($row->mahasiswa->alamat);
                })
                ->addColumn('thn_lulus', function ($row) {
                    return date('Y', strtotime($row->tgl_terima));
                })
                ->addColumn('status', function ($row) {
                    $a = substr($row->mahasiswa->nim, 0, -5);
                    $b = date('Y', strtotime($row->tgl_terima));
                    $c = $b - $a;
                    $d = $c - 4;
                    if ($c <= 4) {
                        return '<p class="badge py-2 px-3 bg-success">Lulus</p>';
                    } else {
                        return '<p class="badge py-2 px-3 bg-danger">Lulus + ' . $d . ' tahun</p>';
                    }
                    // return date('Y', $row->tgl_terima);
                })
                ->addColumn('judul_ta', function ($row) {
                    return ucwords($row->proposal->judul_ta);
                })
                ->addColumn('utama', function ($row) {
                    return ucwords($row->proposal->dosen1->nama);
                })
                ->addColumn('pendamping', function ($row) {
                    return ucwords($row->proposal->dosen2->nama);
                })
                ->rawColumns(['nim', 'nama', 'alamat', 'pem_utama', 'pem_pendamping', 'status', 'judul_ta', 'thn_lulus', 'utama', 'pendamping'])
                ->make(true);
        }
        return view('admin.data-mahasiswa.lulus');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
