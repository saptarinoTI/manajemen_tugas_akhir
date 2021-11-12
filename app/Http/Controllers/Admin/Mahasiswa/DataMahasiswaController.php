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
            return DataTables::of($data)->make(true);
        } catch (ConnectionException $e) {
        }
    }
}
