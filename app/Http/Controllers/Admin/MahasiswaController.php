<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

use function PHPSTORM_META\map;

class MahasiswaController extends Controller
{
    public function index()
    {
        // $response = Http::get('http://api.siakad.stitek.ac.id/siakadzone/mahasiswa');
        // $data = $response->json();
        // $data = $data['data'];

        // $userdupe = array();

        // foreach ($data as $index => $t) {
        //     if (isset($userdupe[$t["mhs_no"]])) {
        //         unset($data[$index]);
        //         continue;
        //     }
        //     $userdupe[$t["mhs_no"]] = true;
        // }
        return view('admin.mahasiswa.index');
    }

    public function store()
    {
        // 1. Ambil data API rubah menjadi json
        $response = Http::get('http://api.siakad.stitek.ac.id/siakadzone/mahasiswa');
        $responseData = $response->json();

        // 2. Perulangan untuk menyinpan api ke table user
        foreach ($responseData as $data) {
            // 3. Pengecekan data dalam database
            $user = User::where('username', '=', $data['nim'])->first();
            if (!$user) {
                // 4. Insert data user
                $mahasiswa = new User;
                $mahasiswa->username = $data['nim'];
                $mahasiswa->password = Hash::make($data['nim']);
                $mahasiswa->save();
                $mahasiswa->assignRole('mahasiswa');
            }
        }
        Alert::success('Berhasil', 'Data login mahasiswa berhasil ditambahkan');
        // 5. Redirect ke view mahasiswa
        return redirect()->route('mahasiswa.index');
    }
}
