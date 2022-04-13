<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nim' => '2141723001',
                'nama' => 'Galiley Singgang M.Y',
                'kelas_id' => '7',
                'jurusan' => 'D4 Teknologi Informasi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                
            ],
            // [
            //     'nim' => '2141723002',
            //     'nama' => 'Sasa Sinta',
            //     'kelas_id' => '2',
            //     'jurusan' => 'D4 Teknologi Informasi',
                
            // ],
            
            ];

        DB::table('mahasiswa')->insert($data);
    }
}
