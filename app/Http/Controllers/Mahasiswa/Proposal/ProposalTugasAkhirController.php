<?php

namespace App\Http\Controllers\Mahasiswa\Proposal;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileTrait;
use App\Models\Mahasiswa;
use App\Models\Proposal\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProposalTugasAkhirController extends Controller
{
    use FileTrait;
    public function index()
    {
        $nim = Auth::user()->username;
        $mahasiswa = Mahasiswa::where('nim', '=', $nim)->first();
        if ($mahasiswa) {
            $proposal = Proposal::where('mahasiswa_nim', '=', $mahasiswa->nim)->first();
        } else {
            Alert::toast('Silahkan isi data diri, sebelum mendaftar proposal hasil', 'warning');
            return redirect()->route('data-diri.index');
        }
        return view('mahasiswa.proposal.index', compact('proposal', 'mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nim = auth()->user()->username;
        $mahasiswa = Mahasiswa::where('nim', '=', $nim)->first();
        return view('mahasiswa.proposal.create', compact('nim', 'mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesan = [
            'required' => 'File wajib diisi',
            'max' => 'File :attribute maksimal 1MB.',
            'mimetypes' => 'File :attribute harus berupa pdf.',
        ];
        $request->validate([
            'file1' => 'required|file|max:1024|mimetypes:application/pdf',
            'file2' => 'file|max:1024|mimetypes:application/pdf',
            'file3' => 'file|max:1024|mimetypes:application/pdf',
        ], $pesan);

        $nim = $request->nim;
        $file = new Proposal;
        $file->mahasiswa_nim = $nim;
        $file->file1 = $this->uploadFile($request, 'file1', 'propsal/file1', $nim);
        if ($request->file2 != null) {
            $file->file2 = $this->uploadFile($request, 'file2', 'propsal/file2', $nim);
        }
        if ($request->file3 != null) {
            $file->file3 = $this->uploadFile($request, 'file3', 'propsal/file3', $nim);
        }
        $file->keterangan = "pendaftaran telah dikirim, silahkan menunggu konfirmasi dari prodi.";
        $seminar = $file->save();

        if ($seminar) {
            Alert::success('Berhasil', 'Data pendaftaran proposal tugas akhir berhasil ditambahkan!',);
            return redirect()->route('proposal.index');
        }
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
        $nim = auth()->user()->username;
        $mahasiswa = Mahasiswa::where('nim', '=', $nim)->first();
        $proposal = Proposal::findOrFail($id);
        return view('mahasiswa.proposal.edit', compact('proposal', 'nim', 'mahasiswa'));
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
        $pesan = [
            'required' => 'File wajib diisi',
            'max' => 'File :attribute maksimal 1MB.',
            'mimetypes' => 'File :attribute harus berupa pdf.',
        ];
        $request->validate([
            'file1' => 'file|max:1024|mimetypes:application/pdf',
            'file2' => 'file|max:1024|mimetypes:application/pdf',
            'file3' => 'file|max:1024|mimetypes:application/pdf',
        ], $pesan);

        $nim = $request->nim;
        $file = Proposal::findOrFail($id);
        $file->mahasiswa_nim = $nim;
        if ($request->file1 != null) {
            $file->file1 = $this->uploadFile($request, 'file1', 'propsal/file1', $nim);
        }
        if ($request->file2 != null) {
            $file->file2 = $this->uploadFile($request, 'file2', 'propsal/file2', $nim);
        }
        if ($request->file3 != null) {
            $file->file3 = $this->uploadFile($request, 'file3', 'propsal/file3', $nim);
        }
        $file->keterangan = "pendaftaran telah dikirim, silahkan menunggu konfirmasi dari prodi.";
        $seminar = $file->save();

        if ($seminar) {
            Alert::success('Berhasil', 'Data pendaftaran proposal tugas akhir berhasil ditambahkan!',);
            return redirect()->route('proposal.index');
        }
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
