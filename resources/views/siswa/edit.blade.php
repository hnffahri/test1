@extends('layout/aplikasi')

@section('konten')

<div class="mb-5 text-end">
  <a href="/siswa" class="btn btn-primary btn-sm">Kembali</a>
</div>
<form method="POST" action="{{ '/siswa/'.$data->no_induk }}">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="no_induk" class="form-label">No Induk</label>
    <input type="text" class="form-control bg-light" readonly id="no_induk" value="{{ $data->no_induk }}">
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama Siswa</label>
    <input type="text" class="form-control" id="nama" value="{{ $data->nama }}" name="nama">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea class="form-control" id="alamat" name="alamat">{{ $data->alamat }}</textarea>
  </div>
  <button class="btn btn-primary">Ubah</button>
</form>

@endsection