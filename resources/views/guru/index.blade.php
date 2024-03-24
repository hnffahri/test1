@extends('layout/aplikasi')

@section('konten')
<main>
  <section class="py-5">
    <div class="container">
      @include('komponen/pesan')
      <a href="/guru/create" class="btn btn-primary">Tambah guru</a>
      <div class="row">
        @foreach ($data as $item)
        <div class="col-lg-4 col-md-6 mt-4">
          <div class="card h-100">
            <div class="card-body h-100">
              <h5 class="text-dark">{{ $item->nama }}</h5>
              {{-- <div>Nip : {{ $item->nip }}</div> --}}
              <div><i class="fal fa-map-marker-alt me-2"></i>{{ $item->alamat }}</div>
            </div>
            <div class="card-body border-top">
              <div class="row">
                <div class="col-6">
                  <a href="{{ url('/guru/'.$item->nip.'/edit') }}" class="btn btn-light btn-sm w-100"><i class="fal fa-edit me-2"></i>Edit</a>
                </div>
                <div class="col-6">
                  <form onsubmit="return confirm('Yakin mau hapus data?')" action="{{ '/guru/'.$item->nip }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm w-100" type="submit"><i class="fal fa-trash-alt me-2"></i>Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="paginate-custom mt-4">
        {{ $data->onEachSide(0)->links() }}
      </div>
    </div>
  </section>
</main>
@endsection