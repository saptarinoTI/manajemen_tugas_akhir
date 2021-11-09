<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.change-password');
    }

    public function update(Request $request)
    {
        $messages = [
            'required' => ':Attribute tidak boleh kosong!',
            'same' => 'Konfirmasi password tidak sama dengan password baru!',
            'min' => ':Attribute minimal 4 huruf!'
        ];
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:4'],
            'konf_password' => ['same:new_password'],
        ], $messages);
        User::findOrFail(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        Alert::success('sukses', 'Password berhasil dirubah!');
        return redirect()->back();
    }
}
