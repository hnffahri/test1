@extends('layout/aplikasi')

@section('konten')
<main>
  <section class="py-5">
    <div class="container">
      @include('komponen/pesan')
      <form method="POST" action="/guru">
        @csrf
        <div class="mb-3">
          <label for="nip" class="form-label">Nip</label>
          <input type="number" class="form-control" id="nip" value="{{ Session::get('nip') }}" name="nip">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Guru</label>
          <input type="text" class="form-control" id="nama" value="{{ Session::get('nama') }}" name="nama">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat">{{ Session::get('alamat') }}</textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </section>
</main>
@endsection