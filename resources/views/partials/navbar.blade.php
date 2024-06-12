<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand fw-bold text-purple" href="#">Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-purple">
        <li class="nav-item">
          <a class="nav-link text-purple" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-purple" aria-current="page" href="#">Pinjam Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-purple" aria-current="page" href="#">Wishlist </a>
        </li>
      </ul>
      <ul class="list-group" style="list-style: none">
        <li class="dropdown text-purple">
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