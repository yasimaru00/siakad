@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
        </div>
    </div>
</div>


{{-- percobaan  --}}
{{-- <script>
        swal("Selamat datang di website kami");
  </script> --}}



@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-error">
    <p>{{ $message }}</p>
</div>
@endif

<br>
{{-- search bar --}}
<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="{{ route('mahasiswa.index') }}">
            <div class="input-group mb-2">
                <input type="text" class="form-control" placeholder="Pencarian  " name="search" value="{{ request('search')}}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
    </div>
    </form>
</div>

<table class="table table-bordered">
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Foto</th>

        <th width="250px">Action</th>
    </tr>
    @foreach ($mahasiswa as $mhs)

    <tr>
        <td>{{ $mhs->nim }}</td>
        <td>{{ $mhs->nama }}</td>
        <td>{{ $mhs->kelas ? $mhs->kelas->nama_kelas : '_'}}</td>
        <td>{{ $mhs->jurusan }}</td>
        <td><img width="150px" src="{{asset('storage/'.$mhs->featured_image)}}"></td>

        <td>
            <form action="{{ route('mahasiswa.destroy', $mhs->nim) }}" method="POST">


                <a class="btn btn-info btn-sm" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
                <a class="btn btn-primary btn-sm" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>

                <a class="btn btn-warning btn-sm" href="{{ route('mahasiswa.nilairaport',$mhs->id_mahasiswa) }}">Nilai</a>
                @csrf
                @method('DELETE')
                
                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm btn-sm" data-toggle="tooltip" title='Delete'>Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $mahasiswa->links('pagination::bootstrap-4')}}

<!-- {{-- konfirmasi delete  --}} -->

<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");

        event.preventDefault();
        swal({
                title: `Apakah Kamu yakin menghapus data ini?`,
                text: "Jika kamu hapus, data tidak akan kembali.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
</body>

</html>
@endsection