<?php

namespace App\Http\Controllers\Admin\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Dosen\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('admin.dosen.index', compact('dosen'));
    }

    public function store()
    {
        // 1. Ambil data API rubah menjadi json
        $dosen = Dosen::all();

        // 2. Perulangan untuk menyinpan api ke table user
        foreach ($dosen as $data) {
            // 3. Pengecekan data dalam database
            $user = User::where('username', '=', $data->niy)->first();
            if (!$user) {
                // 4. Insert data user
                $dosen = new User;
                $dosen->username = $data['niy'];
                $dosen->password = Hash::make($data['niy']);
                $dosen->save();
                $dosen->assignRole('dosen');
            }
        }
        Alert::success('Berhasil', 'Data login dosen pembimbing berhasil ditambahkan');
        // 5. Redirect ke view mahasiswa
        return redirect()->route('dosen.index');
    }
}
