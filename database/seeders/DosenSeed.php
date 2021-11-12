<?php

namespace Database\Seeders;

use App\Models\Dosen\Dosen;
use Illuminate\Database\Seeder;

class DosenSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosen::insert(
            [
                [
                    'niy' => '551000017',
                    'nama' => 'hardianto, S.T., M.Eng.',
                ],
                [
                    'niy' => '551000013',
                    'nama' => 'herri susanto, S.S., M.Hum.',
                ],
                [
                    'niy' => '551000024',
                    'nama' => 'lapu tombilayuk, S.Kom., M.T.',
                ],
                [
                    'niy' => '551000035',
                    'nama' => 'turahyo, S.T., M.Eng.',
                ],
                [
                    'niy' => '551000023',
                    'nama' => 'nur imansyah, S.Kom., M.Kom.',
                ],
                [
                    'niy' => '551000031',
                    'nama' => 'sri handani widiastuti, S.Kom., M.Kom.',
                ],
                [
                    'niy' => '551000050',
                    'nama' => 'rio jumardi, S.T., M.Eng.',
                ],
                [
                    'niy' => '551000048',
                    'nama' => 'zaini, S.Pd., M.Pd.',
                ],
                [
                    'niy' => '551000018',
                    'nama' => 'abdil zain, S.T., M.T.',
                ],
                [
                    'niy' => '551000043',
                    'nama' => 'abadi nugroho, S.Kom., M.Kom.',
                ],
                [
                    'niy' => '551000044',
                    'nama' => 'arfittaria, S.T., M.T.',
                ],
            ]
        );
    }
}
