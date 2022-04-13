<?php

namespace Database\Seeders;

use App\Models\Mhs;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaMatakuliah extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mahasiswaMatkul = [
            [
                'mahasiswa_id' => Mhs::min('nim'),
                'matakuliah_id' => '1',
                'nilai' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mahasiswa_id' => Mhs::min('nim'),
                'matakuliah_id' => '2',
                'nilai' => 'B+',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mahasiswa_id' => Mhs::min('nim'),
                'matakuliah_id' => '3',
                'nilai' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mahasiswa_id' => Mhs::min('nim'),
                'matakuliah_id' => '4',
                'nilai' => 'B+',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
          
        ];
        DB::table('mahasiswa_matakuliah')->insert($mahasiswaMatkul);
    }
}
