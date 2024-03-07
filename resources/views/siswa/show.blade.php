@extends('layout/aplikasi')

@section('konten')
<div class="container">
  <div class="mb-5 text-end">
    <a href="/siswa" class="btn btn-primary btn-sm">Kembali</a>
  </div>
  <h1>{{ $data->nama }}</h1>
  <div>No Induk : {{ $data->no_induk }}</div>
  <div>Alamat : {{ $data->alamat }}</div>
</div>
@endsection