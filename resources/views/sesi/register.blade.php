@extends('layout/aplikasi')

@section('konten')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-body">
      <h3 class="text-dark">Register</h3>
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
        <button class="btn btn-primary" type="submit">Register</button>
      </form>
    </div>
  </div>
</div>
@endsection
