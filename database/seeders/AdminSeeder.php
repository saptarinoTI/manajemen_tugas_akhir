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

        $mhs = new User();
        $mhs->username = '201712036';
        $mhs->email = 'bulbil1604@gmail.com';
        $mhs->email_verified_at = Carbon::now();
        $mhs->password = Hash::make('281099');
        $mhs->save();
        $mhs->assignRole(['mahasiswa']);
    }
}
