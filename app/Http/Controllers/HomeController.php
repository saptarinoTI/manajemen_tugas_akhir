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
            $label = [date('Y') - 2, date('Y') - 1, date('Y'), date('Y') + 1, date('Y') + 2];
            $proposal = Proposal::where('status', '=', 'diterima')->count();
            $proposalProses = Proposal::where('status', '=', 'dikirim')->count();
            $updateMhs = Mahasiswa::latest('updated_at')->first();
            $seminar = Seminar::where('status', '=', 'diterima')->count();
            $seminarProses = Seminar::where('status', '=', 'dikirim')->count();
            $updateSmnr = Seminar::latest('updated_at')->first();
            $pendadaran = Pendadaran::where('status', '=', 'diterima')->count();
            $pendadaranProses = Pendadaran::where('status', '=', 'dikirim')->count();
            $updatePddrn = Pendadaran::latest('updated_at')->first();
            $user = [];
            foreach ($label as $key => $value) {
                $user[] = Pendadaran::where(DB::raw("DATE_FORMAT(updated_at, '%Y')"), $value)->count();
            }
            return view('home', compact('proposal', 'proposalProses', 'updateMhs', 'seminar', 'seminarProses', 'updateSmnr',  'pendadaran', 'pendadaranProses', 'updatePddrn'))->with('label', json_encode($label, JSON_NUMERIC_CHECK))->with('user', json_encode($user, JSON_NUMERIC_CHECK));
        }
        if (auth()->user()->hasRole('dosen')) {
            $idDosen = Auth::user()->username;
            $pro = Proposal::where('utama_id', '=', $idDosen)
                ->orWhere('pendamping_id', '=', $idDosen)
                ->count();

            $seminar = Seminar::whereHas('proposal', function (Builder $query) {
                $query->where('utama_id', '=', auth()->user()->username)
                    ->orWhere('pendamping_id', '=', auth()->user()->username);
            })->count();

            $pendadaran = Pendadaran::whereHas('proposal', function (Builder $query) {
                $query->where('utama_id', '=', auth()->user()->username)
                    ->orWhere('pendamping_id', '=', auth()->user()->username);
            })->count();

            return view('dosen.home', compact('pro', 'seminar', 'pendadaran'));
        }
    }

    public function edit($id)
    {
        //
    }
}
