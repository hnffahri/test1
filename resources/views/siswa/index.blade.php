@extends('layout/aplikasi')

@section('konten')
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No Induk</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <td>{{ $item->no_induk }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->alamat }}</td>
        <td><a href="{{ url('/siswa/'.$item->no_induk) }}" class="btn btn-primary btn-sm">Detail</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $data->links() }}
@endsection