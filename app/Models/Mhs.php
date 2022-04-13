<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mhs extends Model
{
    use HasFactory;

    protected $table='mahasiswa'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    // protected $primaryKey = 'id_mahasiswa'; // Memanggil isi DB Dengan primarykey
    protected $primaryKey = 'nim'; // Memanggil isi DB Dengan primarykey
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'nim',
    'nama',
    'kelas_id',
    'jurusan',
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function matakuliah(){
        // return $this->belongsToMany(MataKuliah::class, 'mahasiswa_matakuliah', 'mahasiswa_nim', 'matakuliah_id')->withPivot('nilai');
        return $this->belongsToMany(MataKuliah::class, 'mahasiswa_matakuliah','mahasiswa_id', 'matakuliah_id')->withPivot('nilai');
    }
    

}
