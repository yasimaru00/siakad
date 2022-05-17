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
                    <strong>Ups!</strong> Inputan anda salah.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" id="myForm" enctype="multipart/form-data">
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
                        <label for="kelas_id">Kelas</label>
                        <select class="form-control" name="kelas_id" id="kelas_id">
                            @foreach($kelas as $kls)
                            <option value="{{$kls->id}}" {{$mahasiswa->kelas_id == $kls->id ? 'selected' : ''}}>{{$kls->nama_kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" id="jurusan" value="{{ $mahasiswa->jurusan }}" aria-describedby="jurusan">
                    </div>
                    <div class="form-group mb-7">
                        <label for="image">Foto</label>
                        <input type="file" class="form-control" name="image" id="image" value="{{$mahasiswa->featured_image}}"></br>
                        @if($mahasiswa->featured_image)
                        <img width="150px" src="{{asset('storage/'.$mahasiswa->featured_image)}}">
                        @else
                        <img class="img-preview img-fluid">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="Laki-laki" {{ $mahasiswa->jenis_kelamin == "Laki-laki" ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $mahasiswa->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}" ariadescribedby="tanggal_lahir">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $mahasiswa->email }}" ariadescribedby="email">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="textarea" name="alamat" class="form-control" id="alamat" value="{{ $mahasiswa->alamat }}" ariadescribedby="alamat">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection