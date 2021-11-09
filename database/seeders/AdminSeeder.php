<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = 'superadmin';
        $user->email = 'saptarino.ti@gmail.com';
        $user->email_verified_at = Carbon::now();
        $user->password = Hash::make('superadmin');
        $user->save();

        $user->assignRole(['superadmin']);
        $user->givePermissionTo(['create', 'read', 'update', 'delete']);

        $user->username = '201712036';
        $user->email = 'bulbil1604@gmail.com';
        $user->email_verified_at = Carbon::now();
        $user->password = Hash::make('281099');
        $user->save();

        $user->assignRole(['mahasiswa']);
    }
}
