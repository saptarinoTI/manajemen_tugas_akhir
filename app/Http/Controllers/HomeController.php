<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendadaran\Pendadaran;
use App\Models\Seminar\Seminar;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $label = [date('Y') - 2, date('Y') - 1, date('Y'), date('Y') + 1, date('Y') + 2];
        $mahasiswa = Mahasiswa::count();
        $updateMhs = Mahasiswa::latest('updated_at')->first();
        $seminar = Seminar::where('status', '=', 'terima')->count();
        $updateSmnr = Seminar::latest('updated_at')->first();
        $pendadaran = Pendadaran::where('status', '=', 'terima')->count();
        $updatePddrn = Pendadaran::latest('updated_at')->first();
        $user = [];
        foreach ($label as $key => $value) {
            $user[] = Pendadaran::where(DB::raw("DATE_FORMAT(updated_at, '%Y')"), $value)->count();
        }
        return view('home', compact('mahasiswa', 'updateMhs', 'seminar', 'updateSmnr',  'pendadaran', 'updatePddrn'))->with('label', json_encode($label, JSON_NUMERIC_CHECK))->with('user', json_encode($user, JSON_NUMERIC_CHECK));
    }

    public function edit($id)
    {
        //
    }
}
