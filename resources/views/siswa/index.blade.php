@extends('layout/aplikasi')

@section('konten')

@include('komponen/pesan')
<a href="/siswa/create" class="btn btn-primary">Tambah Siswa</a>

<div class="table-responsive">
  <table class="table table-bordered mt-4">
    <thead>
      <tr>
        <th scope="col">No Induk</th>
        <th scope="col">Nama</th>
        <th scope="col">Foto</th>
        <th scope="col">Alamat</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <td><a href="{{ url('/siswa/'.$item->no_induk) }}" class="text-primary">{{ $item->no_induk }}</a></td>
        <td>
          @if ($item->foto)
          <img src="{{ url('foto').'/'.$item->foto }}" alt="#" width="80">
          @endif
        </td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->alamat }}</td>
        <td class="d-flex">
          <a href="{{ url('/siswa/'.$item->no_induk.'/edit') }}" class="btn btn-light btn-sm me-2">Edit</a>
          <form onsubmit="return confirm('Yakin mau hapus data?')" action="{{ '/siswa/'.$item->no_induk }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm me-2" type="submit">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

  {{ $data->onEachSide(0)->links() }}
@endsection