@extends('layout/aplikasi')

@section('konten')
<main>
  <section class="py-5">
    <div class="container">
      <h1>{{ $judul }}</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, incidunt odit. Laborum eius at soluta unde, debitis dolore esse quaerat?</p>
      <p>
        <ul>
          <li>Email : {{ $kontak['email'] }}</li>
          <li>Youtube : {{ $kontak['youtube'] }}</li>
        </ul>
      </p>
    </div>
  </section>
</main>
@endsection