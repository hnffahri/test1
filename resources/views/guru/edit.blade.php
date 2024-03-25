@extends('layout/aplikasi')

@section('konten')
<main>
  <section class="py-5">
    <div class="container">
      @include('komponen/pesan')
      <div class="mb-5 text-end">
        <a href="/guru" class="btn btn-primary btn-sm">Kembali</a>
      </div>
      <form method="POST" action="{{ '/guru/'.$data->nip }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="nip" class="form-label">No Induk</label>
          <input type="text" class="form-control bg-light" readonly id="nip" value="{{ $data->nip }}">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama guru</label>
          <input type="text" class="form-control" id="nama" value="{{ $data->nama }}" name="nama">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat">{{ $data->alamat }}</textarea>
        </div>
        <button class="btn btn-primary">Ubah</button>
      </form>
    </div>
  </section>
</main>
@endsection