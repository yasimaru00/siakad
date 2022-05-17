<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mahasiswa extends Model
{
    use HasFactory;

    protected $table='mahasiswa'; // Eloquent akan membuat model mahasiswa menyimpan record ditabel mahasiswa
    protected $primaryKey = 'nim'; // Memanggil isi DB Dengan primarykey
    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'jurusan',
        'featured_image',
        'jenis_kelamin',
        'email',
        'alamat',
        'tanggal_lahir'
           
 ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);

    }

    public function matakuliah(){
        return $this->belongsToMany(Mahasiswa_Matakuliah::class,'id_mahasiswa');
    }
    

}
