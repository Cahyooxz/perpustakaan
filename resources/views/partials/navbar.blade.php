<nav class="navbar navbar-dark navbar-expand-lg bg-purple fixed-top" id="nav">
  <div class="container">
    <a class="navbar-brand fw-bold" id="nav-b" href="#">Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a id="nav-link" class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="{{ route('dashboard') }}"><i class="fa-solid fa-house-chimney me-2"></i>Dashboard</a>
        </li>
        @if(Auth::user())
            @if(Auth::user()->role == 1 || Auth::user()->role == 2)
              <li class="nav-item">
                <a id="nav-link" class="nav-link {{ Request::is('daftar_buku') ? 'active' : ''}}" aria-current="page" href="{{ route('buku.index') }}"><i class="fa-solid fa-book me-2"></i>Daftar Buku</a>
              </li>
              <li class="nav-item">
                <a id="nav-link" class="nav-link {{ Request::is('daftar/peminjaman_buku') ? 'active' : ''}}" aria-current="page" href="{{ route('peminjaman.index') }}"><i class="fa-solid fa-book me-2"></i>Daftar Pinjaman Buku</a>
              </li>
            @elseif(Auth::user()->role == 3 || !Auth::user())
              <li class="nav-item">
                <a id="nav-link" class="nav-link {{ Request::is('peminjaman_buku') ? 'active' : ''}}" aria-current="page" href="{{ route('peminjaman.user_index') }}"><i class="fa-solid fa-book me-2"></i>Pinjam Buku</a>
              </li>
              <li class="nav-item">
                <a id="nav-link" class="nav-link {{ Request::is('pinjaman_bukuku') ? 'active' : ''}}" aria-current="page" href="{{ route('peminjaman.show') }}"><i class="fa-solid fa-book-bookmark me-2"></i>Pinjamanku</a>
              </li>
              <li class="nav-item">
                <a id="nav-link" class="nav-link {{ Request::is('wishlist') ? 'active' : ''}}" aria-current="page" href="{{ route('wishlist.index') }}"><i class="fa-solid fa-bookmark me-2"></i>Wishlist </a>
              </li>
          @endif
        @else
          <li class="nav-item">
            <a id="nav-link" class="nav-link {{ Request::is('peminjaman_buku') ? 'active' : ''}}" aria-current="page" href="{{ route('peminjaman.user_index') }}"><i class="fa-solid fa-book me-2"></i>Daftar Buku</a>
          </li>
        @endif
      </ul>
      <ul class="list-group text-light" style="list-style: none">
        @if(!Auth::user())
        <li class="dropwdown">
          <a href="{{ route('login') }}" class="btn btn-success">Masuk</a>
        </li>
        @else
        <li class="dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
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
        @endif
      </ul>
    </div>
  </div>
</nav>
