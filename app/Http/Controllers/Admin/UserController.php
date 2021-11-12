<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        if (Auth::user()->hasRole('superadmin')) {
            $roles = Role::select('id', 'name')
                ->where('name', '!=', 'superadmin')
                ->where('name', '!=', 'mahasiswa')
                ->get();
        } elseif (Auth::user()->hasRole('admin')) {
            $roles = Role::select('id', 'name')
                ->where('name', '!=', 'superadmin')
                ->where('name', '!=', 'admin')
                ->where('name', '!=', 'mahasiswa')
                ->get();
        }
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'role' => 'required',
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->password = Hash::make($request->username);
        $user->save();

        $user->assignRole($request->role);

        Alert::success('Berhasil', 'Data login user berhasil ditambahkan');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
