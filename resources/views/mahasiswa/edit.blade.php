@extends('layout.app')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Mahasiswa
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ups!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" name="nim" class="form-control" id="nim" value="{{ $mahasiswa->nim }}" aria-describedby="Nim">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="nama" name="nama" class="form-control" id="nama" value="{{ $mahasiswa->nama }}" aria-describedby="Nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $mahasiswa->email }}" aria-describedby="Email">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}" aria-describedby="Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">JENIS KELAMIN @error('jenis_kelamin') <div class="text-danger">{{ $message }}</div> @enderror </label>
                        <div class="">
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">-Pilih-</option>
                                <option @if(old('jenis_kelamin')=='Laki-Laki' or $mahasiswa->jenis_kelamin=='Laki-Laki') selected @endif value="Laki-Laki">Laki-Laki</option>
                        <option @if(old('jenis_kelamin')=='Perempuan' or $mahasiswa->jenis_kelamin=='Perempuan') selected @endif value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $mahasiswa->alamat }}" aria-describedby="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" class="form-control" id="kelas" value="{{ $mahasiswa->kelas }}" aria-describedby="Kelas">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" id="jurusan" value="{{ $mahasiswa->jurusan }}" aria-describedby="Jurusan">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
