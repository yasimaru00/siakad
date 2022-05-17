@extends('layout.app')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Mahasiswa
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ups!</strong> Inputan anda salah.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" name="nim" class="form-control" id="nim" aria-describedby="Nim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" ariadescribedby="Nama">
                    </div>
                    <div class="form-group">
                        <label for="kelas_id">Kelas</label>
                        <select name="kelas_id" class="form-control select2">
                            @foreach ($kelas as $kls)
                                <!-- <option value="{{$kls->id}}" {{ old('kelas_id') == "$kls->id" ? 'selected' : '' }}>{{$kls->nm_kelas}}</option> -->
                                <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" id="jurusan" ariadescribedby="Jurusan">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto: </label>
                        <input type="file" class="form-control" required="required" name="image" id="image">
                    </div>
                    <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" ariadescribedby="tanggal_lahir">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" ariadescribedby="email">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="textarea" name="alamat" class="form-control" id="alamat" ariadescribedby="alamat">
            </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
