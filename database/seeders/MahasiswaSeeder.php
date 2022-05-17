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
                'jurusan' => 'Teknologi Informasi',
                'jenis_kelamin' => 'Laki-Laki',	
                'email' => 'yasimaru00i@gmail.com',	
                'alamat' => 'Bojonegoro',
                'tanggal_lahir' => '2000-01-12', 
            ],
            [
                'nim' => '2248831361',	
                'nama' => 'Sofiam Henda',
                'jurusan' => 'Teknologi Informasi',
                'jenis_kelamin' => 'Laki-Laki',	
                'email' => 'Jojo343@gmail.com',	
                'alamat' => 'Malang',
                'tanggal_lahir' => '2001-11-14', 
            ],
            [
                'nim' => '2314354151',	
                'nama' => 'Solo Mahendra',
                'jurusan' => 'Teknologi Informasi',
                'jenis_kelamin' => 'Laki-Laki',	
                'email' => 'Coaek22@gmail.com',	
                'alamat' => 'Brebes',
                'tanggal_lahir' => '2001-11-14', 
            ],
            [
                'nim' => '2241516445',	
                'nama' => 'Noob',
                'jurusan' => 'Teknologi Informasi',
                'jenis_kelamin' => 'Laki-Laki',	
                'email' => 'coba09@gmail.com',	
                'alamat' => 'Solo',
                'tanggal_lahir' => '2001-11-14', 
            ],
        ];
        DB::table('mahasiswa')->insert($data);
    }
}
