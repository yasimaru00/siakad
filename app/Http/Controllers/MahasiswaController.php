<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa_Matakuliah;
use Illuminate\Support\Facades\Storage;
use PDF;

class MahasiswaController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        if (request('search')) {
            $mahasiswa = Mahasiswa::where('nim', 'like', '%' . request('search') . '%')
                ->orwhere('nama', 'like', '%' . request('search') . '%')
                ->orwhere('kelas', 'like', '%' . request('search') . '%')
                ->orwhere('jurusan', 'like', '%' . request('search') . '%')
                ->paginate(2);
            return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
        } else {
            //fungsi eloquent menampilkan data menggunakan pagination
            $mahasiswa = Mahasiswa::with('kelas')->get(); //mengambil semua isi tabel
            $mahasiswa = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(3);
            return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
        }
    }
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.create', ['kelas' => $kelas]);
    }
    public function store(Request $request)
    {
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }

        //melakukan validasi data

        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'jurusan' => 'required',
            'featured_image' => 'image|file|max:1024',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',

        ]);
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->featured_image = $image_name;
        $mahasiswa->jenis_kelamin = $request->get('jenis_Kelamin');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_Lahir');
        $mahasiswa->kelas_id = $request->get('kelas');
        $mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    public function show($nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        //code sebelum dibuat relasi -> $mahasiswa  = Mhs::find($nim);
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        // return view('mahasiswa.detail', compact('Mahasiswa'));
        return view('mahasiswa.detail', ['Mahasiswa' => $mahasiswa]);
    }
    public function edit($nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.edit', compact('mahasiswa', 'kelas'));
    }
    public function update(Request $request, $nim)
    {
        //melakukan validasi data

        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'jurusan' => 'required',
            'featured_image' => 'image|file|max:1024',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita

        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        // validasi foto jika foto lama akan dihapus / diganti
        if ($mahasiswa->featured_image && file_exists(storage_path('app/public/' . $mahasiswa->featured_image))) {
            Storage::delete('public/' . $mahasiswa->featured_image);

        }
        $image_name = $request->file('image')->store('images', 'public');


        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->featured_image = $image_name;
        $mahasiswa->jenis_kelamin = $request->get('jenis_kelamin');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $mahasiswa->kelas_id = $request->get('kelas');
        $mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    public function destroy($nim)
    {
        //fungsi eloquent untuk menghapus data
        $mahasiswa = Mahasiswa::findOrFail($nim);

        if (Storage::delete('public/' . $mahasiswa->featured_image)) {
            $mahasiswa->delete();
        }
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function khs($id)
    {

        $khs = Mahasiswa_Matakuliah::where('mahasiswa_id', $id)
            ->with('mahasiswa', 'matakuliah')->get();
        $mhs = Mahasiswa::with('kelas')->where('id_mahasiswa', $id)->first();

        return view('mahasiswa.nilairaport', compact('khs', 'mhs'));
    }

    public function print_cetak($nim)
    {
        $mahasiswa = Mahasiswa::with('kelas')->where("nim", $nim)->first();
        $matkul = Mahasiswa_Matakuliah::with("matakuliah")->where("mahasiswa_id", ($mahasiswa->id_mahasiswa))->get();
        $pdf = PDF::loadview('mahasiswa.print_cetak', ['mahasiswa' => $mahasiswa, 'matakuliah' => $matkul]);
        return $pdf->stream();
    }
}
