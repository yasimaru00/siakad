<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';

    protected $fillable = [
        'nama_matkul',
        'sks',
        'jam',
        'semester'
    ];

    public function mahasiswa()
    {
        // return $this->belongsToMany(Mhs::class, 'mahasiswa_matakuliah', 'matakuliah_id', 'mahasiswa_nim');
        return $this->belongsToMany(Mhs::class, 'mahasiswa_matakuliah', 'mahasiswa_id', 'matakuliah_id');
    }
}
