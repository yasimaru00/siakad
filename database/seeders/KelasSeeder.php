<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            ['nm_kelas' => 'TI 2A'],
            ['nm_kelas' => 'TI 2B'],
            ['nm_kelas' => 'TI 2C'],
            ['nm_kelas' => 'TI 2D'],
            ['nm_kelas' => 'TI 2E'],
            ['nm_kelas' => 'TI 2F'],
            ['nm_kelas' => 'TI 2G'],
            ['nm_kelas' => 'TI 2H'],
            ['nm_kelas' => 'TI 2I'],
        ];

        DB::table('kelas')->insert($kelas);
    }
}
