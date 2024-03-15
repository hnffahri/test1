@extends('layout/aplikasi')

@section('konten')
<div class="row justify-content-center">
  <div class="col-lg-6">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if (session()->has('status'))
    <div class="alert alert-success">{{ session()->get('status') }}</div>
    @endif
    <div class="card card-body">
      <h3 class="text-dark">Reset Password</h3>
      <p>Masukan email anda yang terdaftar</p>
      <form action="/sesi/reset-password" method="POST">
        @csrf
        <input type="text" class="form-control" id="text" name="token" value="{{ request()->token }}">
        <input type="text" class="form-control" id="text" name="email" value="{{ request()->email }}">
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">New Password</label>
          <input type="password" class="form-control" id="password" name="password_confirmation">
        </div>
        <div class="text-center">
          <button class="btn btn-primary w-100" type="submit">Kirim</button>
          {{-- <div class="mt-3">Belum punya akun?</div>
          <a href="/sesi/register" class="btn btn-light w-100 mt-3">Daftar</a> --}}
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
