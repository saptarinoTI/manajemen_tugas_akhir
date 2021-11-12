<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::where('name', '!=', 'superadmin')->get();
        return view('superadmin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('superadmin.role.create');
    }

    public function store(Request $request)
    {
        $messages = ['required' => 'Form tidak boleh kosong', 'unique' => 'Nama telah tersedia pada database'];
        $request->validate(['name' => 'required|unique:roles,name'], $messages);
        $role = new Role;
        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();
        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }
}
