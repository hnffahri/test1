<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link {{ request()->is('/*') ? 'active' : '' }}" href="/">Beranda</a>
        <a class="nav-link {{ request()->is('siswa*') ? 'active' : '' }}" href="/siswa">Siswa</a>
        <a class="nav-link {{ request()->is('guru*') ? 'active' : '' }}" href="/guru">guru</a>
        <a class="nav-link {{ request()->is('tentang*') ? 'active' : '' }}" href="/tentang">Tentang</a>
        <a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}" href="/kontak">Kontak</a>
        @if (Auth::check())
        <a class="nav-link btn btn-primary" href="/sesi/logout">Logout</a>
        @else
        <a class="nav-link btn btn-primary" href="/sesi">Masuk</a>
        @endif
      </div>
    </div>
  </div>
</nav>