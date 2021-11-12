<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
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
            $data = Mahasiswa::all();
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
                ->addColumn('tgl_add', function ($row) {
                    return date('d F Y', strtotime($row->created_at));
                })
                ->addColumn('tgl_update', function ($row) {
                    return date('d F Y', strtotime($row->updated_at));
                })
                ->addColumn('btn', function ($row) {
                    return '<a href="data-mahasiswa/' . $row->nim . '" class="btn btn-delete btn-danger btn-sm"><span class="text-sm">Hapus Data</span></a>';
                })
                ->rawColumns(['nama', 'ttl', 'alamat', 'pem_utama', 'pem_pendamping', 'judul_ta', 'tgl_add', 'tgl_update', 'btn'])
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
