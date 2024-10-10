<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan | Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">



    {{-- datatables wajib gunakan jquery untuk dia bisa akses datatables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">

    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    @vite(['resources/views/app.blade', 'resources/views/login.blade','css/style.css','css/style.css'])
    @include('partials.navbar')
    @include('partials.notification')
    <div class="container-fluid">
        <div class="container">
            <div class="row min-vh-100 d-flex align-items-center justify-content-center">
                <div class="col-6">
                    <h3 class="fw-bold text-purple">Halo, Selamat Datang di Perpustakaan</h3>
                </div>
                <div class="col-6 text-center">
                    <img src="{{ asset('img/dashboard.gif') }}" alt="" class="w-50">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-purple text-white min-vh-100">
        <div class="container">
            <div class="row py-5">
                <h4 class="fw-semibold text-center mb-5">Cari Buku Kesukaanmu..</h4>
                @foreach ($buku as $d)
                    @if($d->stok >= 1)
                    <div class="col-6 col-md-6 col-lg-3 mb-3">
                        <a href="{{ route('buku.show',['id' => $d->id]) }}" class="text-decoration-none">
                            <div class="card border-0 pt-3 pb-0 shadow-sm">
                                <div class="d-flex justify-content-end me-3 mt-3 mb-3">
                                    @if(Auth::user())
                                        @if($wishlist?->where('buku_id',$d->id)->isEmpty())
                                        <form action="{{ route('wishlist.store') }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input type="number" value="{{ $d->id }}" name="buku_id" class="d-none">
                                            <button type="submit" class="border-0 fs-2 lh-0"><i class="fa-regular fa-bookmark text-purple lh-0"></i></button>
                                        </form>
                                        @else
                                        <form action="{{ route('wishlist.destroy',['buku_id' => $d->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="number" value="{{ $d->id }}" name="buku_id" class="d-none">
                                            <button type="submit" class="border-0 fs-2 lh-0"><i class="fa-solid fa-bookmark text-purple lh-0"></i></button>
                                        </form>
                                        @endif
                                    @endif
                                </div>
                                <div class="card-body rounded d-flex justify-content-center align-items-center flex-column">
                                    <div class="book-cover shadow rounded">
                                    <img src="{{ asset('storage/buku/'.$d->cover) }}" class="img-fluid rounded">
                                    </div>
                                    <p class="fw-bold mt-5" style="font-size: 12px">{{ $d->judul }}</p>
                                    <p class="text-muted">{{ $d->penulis }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @else
                    <div class="col-6 col-md-6 col-lg-3 mb-3">
                        <a href="{{ route('buku.show',['id' => $d->id]) }}" class="text-decoration-none">
                            <div class="card border-0 pt-3 pb-0 shadow-sm">
                                <div class="d-flex justify-content-end me-3 mt-3 mb-3">
                                    @if(Auth::user())
                                        @if($wishlist->where('buku_id',$d->id)->isEmpty())
                                        <form action="{{ route('wishlist.store') }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input type="number" value="{{ $d->id }}" name="buku_id" class="d-none">
                                            <button type="submit" class="border-0 fs-2"><i class="fa-regular fa-bookmark text-purple lh-0"></i></button>
                                        </form>
                                        @else
                                        <form action="{{ route('wishlist.destroy',['buku_id' => $d->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="number" value="{{ $d->id }}" name="buku_id" class="d-none">
                                            <button type="submit" class="border-0 fs-2"><i class="fa-solid fa-bookmark text-purple lh-0"></i></button>
                                        </form>
                                        @endif
                                    @endif
                                </div>
                                <div class="card-body rounded d-flex justify-content-center align-items-center flex-column">
                                    <div class="book-cover shadow rounded position-relative">
                                    <img src="{{ asset('storage/buku/'.$d->cover) }}" class="img-fluid rounded saturate">
                                    <div class="position-absolute top-50 start-50 translate-middle">
                                        <div class="rounded-circle bg-dark bg-opacity-50 stok">
                                            <h5 class="text-center text-light fw-bold d-block m-0 text-uppercase" style="line-height: 100px;">Habis</h5>
                                        </div>
                                    </div>
                                    </div>
                                    <p class="fw-bold mt-5" style="font-size: 12px">{{ $d->judul }}"</p>
                                    <p class="text-muted">{{ $d->penulis }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                @endforeach
                <div class="col-12 col-md-6 col-lg-3 mt-5 mb-5 mt-md-0 mb-md-0 d-flex justify-content-center align-items-center flex-column">
                    <p class="text-decoration-none fw-bold fs-2 text-center text-white">Dan Masih Banyak Lagi!</p>
                </div>
            </div>    
        </div>
    </div>
</body>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</html>