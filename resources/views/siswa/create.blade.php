@extends('layout/aplikasi')

@section('konten')
<main>
  <section class="py-5">
    <div class="container">
      @include('komponen/pesan')
      <form method="POST" action="/siswa" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="no_induk" class="form-label">No Induk</label>
          <input type="number" class="form-control" id="no_induk" value="{{ Session::get('no_induk') }}" name="no_induk">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Siswa</label>
          <input type="text" class="form-control" id="nama" value="{{ Session::get('nama') }}" name="nama">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat">{{ Session::get('alamat') }}</textarea>
        </div>
        <div class="mb-3">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <button class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </section>
</main>
@endsection