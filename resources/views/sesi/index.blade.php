@extends('layout/aplikasi')

@section('konten')
<main>
  <section class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          @include('komponen/pesan')
          <div class="card card-body">
            <h3 class="text-dark mb-4">Login</h3>
            <form action="/sesi/login" method="POST">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Session::get('email') }}">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <a href="sesi/lupa-password">Lupa Password?</a>
              </div>
              <div class="text-center">
                <button class="btn btn-primary w-100" type="submit">Login</button>
                <div class="mt-3">Belum punya akun?</div>
                <a href="/sesi/register" class="btn btn-light w-100 mt-3">Daftar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection