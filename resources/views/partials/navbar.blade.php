<nav class="navbar navbar-dark navbar-expand-lg bg-purple fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        @if(Auth::user()->role == 1 || Auth::user()->role == 2)
          <li class="nav-item">
            <a class="nav-link {{ Request::is('daftar_buku') ? 'active' : ''}}" aria-current="page" href="{{ route('buku.index') }}">Daftar Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('daftar/peminjaman_buku') ? 'active' : ''}}" aria-current="page" href="{{ route('peminjaman.index') }}">Daftar Pinjaman Buku</a>
          </li>
        @elseif(Auth::user()->role == 3)
          <li class="nav-item">
            <a class="nav-link {{ Request::is('peminjaman_buku') ? 'active' : ''}}" aria-current="page" href="{{ route('peminjaman.user_index') }}">Pinjam Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('pinjaman_bukuku') ? 'active' : ''}}" aria-current="page" href="{{ route('peminjaman.show') }}">Pinjamanku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('wishlist') ? 'active' : ''}}" aria-current="page" href="{{ route('wishlist.index') }}">Wishlist </a>
          </li>
        @endif
      </ul>
      <ul class="list-group text-light" style="list-style: none">
        <li class="dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kariska</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item text-purple" href="#"><i class="bi bi-person-fill me-3"></i>Profile</a></li>
            <li>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                @method('POST')
                <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-left me-3"></i>Logout</button></li>
              </form>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>