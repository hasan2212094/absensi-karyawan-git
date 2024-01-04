<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawan =[
            [
                'nik' => '111',
                'name' => 'sri'

            ],
            [
                'nik' => '222',
                'name' => 'lina'
            ]

         ];

         Karyawan::insert($karyawan);
    }
}
