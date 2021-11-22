<?php

namespace App\Http\Controllers\Admin\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;

class DataMahasiswaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $response = Http::get('http://api.siakad.stitek.ac.id/siakadzone/mahasiswa');
            $data = $response->json();
            $data = $data['data'];
            $userdupe = array();
            foreach ($data as $index => $t) {
                if (isset($userdupe[$t["mhs_no"]])) {
                    unset($data[$index]);
                    continue;
                }
                $userdupe[$t["mhs_no"]] = true;
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('mhs_nama', function ($row) {
                    return ucwords(strtolower($row['mhs_nama']));
                })
                ->rawColumns(['mhs_nama'])
                ->make(true);
        } catch (ConnectionException $e) {
        }
    }
}
