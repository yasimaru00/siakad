<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mhs extends Model
{
    use HasFactory;

    protected $table='mahasiswa'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    protected $primaryKey = 'id_mhs'; // Memanggil isi DB Dengan primarykey
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'nim',
    'nama',
    'email',
    'tanggal_lahir',
    'jenis_kelamin',
    'alamat',
    'kelas',
    'jurusan',
    ];
}
