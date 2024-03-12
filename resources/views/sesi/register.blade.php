@extends('layout/aplikasi')

@section('konten')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-body">
      <h3 class="text-dark mb-4">Register</h3>
      <form action="/sesi/create" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ Session::get('name') }}">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ Session::get('email') }}">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="text-center">
          <button class="btn btn-primary w-100" type="submit">Register</button>
          <div class="mt-3">Sudah punya akun?</div>
          <a href="/sesi" class="btn btn-light w-100 mt-3">Masuk</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
