<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $roles = User::select('id', 'username', 'email')->whereHas('roles', function ($query) {
            $query->where('roles.name', '!=', 'mahasiswa')->Where('roles.name', '!=', 'superadmin');
        })
            ->with('roles')
            ->get();
        return DataTables::of($roles)
            ->addIndexColumn()
            ->addColumn('username', function ($row) {
                return ucwords($row->username);
            })
            ->addColumn('email', function ($row) {
                if ($row->email) {
                    return $row->email;
                } else {
                    return "<b>-</b>";
                }
            })
            ->addColumn('role', function ($row) {
                $role = ucwords($row->roles->pluck('name')->implode(', '));
                return $role;
            })
            ->addColumn('btn', function ($row) {
                if (auth()->user()->hasRole('admin')) {
                    if ($row->roles->pluck('name')->implode(', ') != 'admin') {
                        return '<a href="users/' . $row->id . '" class="btn btn-delete btn-danger btn-sm"><i class="bi bi-trash"></i></a>';
                    }
                } elseif (auth()->user()->hasRole('superadmin')) {
                    return '<a href="users/' . $row->id . '" class="btn btn-delete btn-danger btn-sm"><i class="bi bi-trash"></i></a>';
                }
            })
            ->rawColumns(['username', 'email', 'role', 'btn'])
            ->make(true);
    }
}
