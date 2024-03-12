@extends('layout/aplikasi')

@section('konten')
<div class="row justify-content-center">
  <div class="col-lg-6">
    @if ($errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $item)
      {{ $item }}
      @endforeach
    </div>
    @endif
    <div class="card card-body">
      <h3 class="text-dark">Lupa Password</h3>
      <p>Masukan email anda yang terdaftar</p>
      <form action="/sesi/kirim-email" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ Session::get('email') }}">
        </div>
        <div class="text-center">
          <button class="btn btn-primary w-100" type="submit">Kirim</button>
          <div class="mt-3">Belum punya akun?</div>
          <a href="/sesi/register" class="btn btn-light w-100 mt-3">Daftar</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
