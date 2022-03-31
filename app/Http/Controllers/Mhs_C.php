<?php

namespace App\Http\Controllers;

use App\Models\Mhs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Mhs_C extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //fungsi eloquent menampilkan data menggunakan pagination
    $mahasiswa = Mhs::all(); // Mengambil semua isi tabel
    $paginate = Mhs::orderBy('id_mhs', 'asc')->paginate(3); 
    return view('mahasiswa.index', ['mahasiswa' => $mahasiswa,'paginate'=>$paginate]);
    }
    public function create()
    {
    return view('mahasiswa.create');
    }
    public function store(Request $request)
    {
    //melakukan validasi data
    $request->validate([
    'nim' => 'required',
    'nama' => 'required',
    'kelas' => 'required',
    'jurusan' => 'required', 
    ]);
    //fungsi eloquent untuk menambah data
    Mhs::create($request->all());
    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('mahasiswa.index')
    ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    public function show($nim)
    {
    //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
    $mahasiswa = Mhs::where('nim', $nim)->first();
    return view('mahasiswa.detail', compact('mahasiswa'));
    }
    public function edit($nim)
    {
   //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
    $mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->first();
    return view('mahasiswa.edit', compact('mahasiswa'));
    }
    public function update(Request $request, $nim)
    {
   //melakukan validasi data
    $request->validate([
    'nim' => 'required',
    'nama' => 'required',
    'kelas' => 'required',
    'jurusan' => 'required', 
    ]);
   //fungsi eloquent untuk mengupdate data inputan kita
   Mhs::where('nim', $nim) ->update([
   'nim'=>$request->nim,
   'nama'=>$request->nama,
   'kelas'=>$request->kelas,
   'jurusan'=>$request->jurusan,
   ]);
   //jika data berhasil diupdate, akan kembali ke halaman utama
    return redirect()->route('mahasiswa.index')
    ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    public function destroy( $nim)
    {
   //fungsi eloquent untuk menghapus data
   Mhs::where('nim', $nim)->delete();
    return redirect()->route('mahasiswa.index')
    -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
