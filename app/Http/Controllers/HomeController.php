<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendadaran\Pendadaran;
use App\Models\Proposal\Proposal;
use App\Models\Seminar\Seminar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('superadmin|admin|mahasiswa|staff|prodi')) {
            $totalMhs = Mahasiswa::count();
            $totalPen = Pendadaran::count();
            $pendadaran = Pendadaran::where('status', '=', 'diterima')->get();
            $cepat = [];
            $lambat = [];
            foreach ($pendadaran as $pen) {
                $nim = substr($pen->mahasiswa_nim, 0, 4);
                $tgl = substr($pen->tgl_terima, 0, 4);
                $hasil = (int)$tgl - (int)$nim;
                if ($hasil < 5) {
                    $cepat[] = 0;
                } else {
                    $lambat[] = 0;
                }
            }

            $user = [];
            $label = [date('Y') - 2, date('Y') - 1, date('Y'), date('Y') + 1, date('Y') + 2];
            foreach ($label as $key => $value) {
                $user[] = Pendadaran::where(DB::raw("DATE_FORMAT(updated_at, '%Y')"), $value)->count();
            }
            return view('home', compact('cepat', 'lambat', 'totalMhs', 'totalPen', 'pendadaran'))->with('label', json_encode($label, JSON_NUMERIC_CHECK))->with('user', json_encode($user, JSON_NUMERIC_CHECK));
        }

        if (auth()->user()->hasRole('dosen')) {
            $idDosen = Auth::user()->username;
            $pro = Proposal::where('utama_id', '=', $idDosen)
                ->orWhere('pendamping_id', '=', $idDosen)
                ->count();
            $utama = Proposal::where('utama_id', '=', $idDosen)
                ->count();
            $pendamping = Proposal::where('pendamping_id', '=', $idDosen)
                ->count();
            return view('dosen.home', compact('pro', 'utama', 'pendamping'));
        }
    }

    public function edit($id)
    {
        //
    }
}
