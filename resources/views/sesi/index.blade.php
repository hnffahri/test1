@extends('layout/aplikasi')

@section('konten')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-body">
      <h3 class="text-dark">Login</h3>
      <form action="/sesi/login" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ Session::get('email') }}">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button class="btn btn-primary" type="submit">Login</button>
      </form>
    </div>
  </div>
</div>
@endsection
