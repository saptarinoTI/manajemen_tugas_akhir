<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AddEmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.add-email');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute tidak boleh kosong',
            'email' => 'Inputkan email dengan benar',
            'unique' => 'Email telah tersedia',
        ];
        $request->validate([
            'email' => 'required|email|unique:users,email'
        ], $messages);

        $id = auth()->user()->id;
        User::findOrFail($id)->update([
            'email' => $request->email,
        ]);

        Alert::success('Berhasil', 'Email berhasil ditambahkan!');
        return redirect()->route('verification.notice');
    }
}
