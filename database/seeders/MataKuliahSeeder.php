<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matkul = [
            [
                'nama_matkul' => 'Pemograman Berbasis Objek',
                'sks' => '3',
                'jam' => '6',
                'semester' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_matkul' => 'Pemograman Web Lanjut',
                'sks' => '3',
                'jam' => '6',
                'semester' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_matkul' => 'Basis Data Lanjut',
                'sks' => '3',
                'jam' => '4',
                'semester' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_matkul' => 'Praktikum Basis Data Lanjut',
                'sks' => '3',
                'jam' => '6',
                'semester' => '4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];
        DB::table('matakuliah')->insert($matkul);
    }
}
