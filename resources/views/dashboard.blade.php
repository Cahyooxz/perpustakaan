@extends('layouts.app')
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
@section('content')
<div class="row mb-5" style="margin-top: 100px">
    <h4 class="fw-semibold text-center mb-5">Cari Buku Kesukaanmu..</h4>
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <a href="/" class="text-decoration-none">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <div class="book-cover">
                    <img src="{{ asset('img/laut_bercerita.jpg') }}" class="img-fluid rounded">
                    </div>
                    <p class="fw-bold mt-3">Laut Bercerita</p>
                    <p class="text-muted">Leila S.Chudori</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <a href="/" class="text-decoration-none">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <div class="book-cover">
                    <img src="{{ asset('img/laut_bercerita.jpg') }}" class="img-fluid rounded">
                    </div>
                    <p class="fw-bold mt-3">Laut Bercerita</p>
                    <p class="text-muted">Leila S.Chudori</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <a href="/" class="text-decoration-none">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <div class="book-cover">
                    <img src="{{ asset('img/laut_bercerita.jpg') }}" class="img-fluid rounded">
                    </div>
                    <p class="fw-bold mt-3">Laut Bercerita</p>
                    <p class="text-muted">Leila S.Chudori</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <a href="/" class="text-decoration-none">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <div class="book-cover">
                    <img src="{{ asset('img/laut_bercerita.jpg') }}" class="img-fluid rounded">
                    </div>
                    <p class="fw-bold mt-3">Laut Bercerita</p>
                    <p class="text-muted">Leila S.Chudori</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <a href="/" class="text-decoration-none">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <div class="book-cover">
                    <img src="{{ asset('img/laut_bercerita.jpg') }}" class="img-fluid rounded">
                    </div>
                    <p class="fw-bold mt-3">Laut Bercerita</p>
                    <p class="text-muted">Leila S.Chudori</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <a href="/" class="text-decoration-none">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <div class="book-cover">
                    <img src="{{ asset('img/laut_bercerita.jpg') }}" class="img-fluid rounded">
                    </div>
                    <p class="fw-bold mt-3">Laut Bercerita</p>
                    <p class="text-muted">Leila S.Chudori</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mb-3">
        <a href="/" class="text-decoration-none">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center flex-column">
                    <div class="book-cover">
                    <img src="{{ asset('img/laut_bercerita.jpg') }}" class="img-fluid rounded">
                    </div>
                    <p class="fw-bold mt-3">Laut Bercerita</p>
                    <p class="text-muted">Leila S.Chudori</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-md-6 col-lg-3 mt-5 mb-5 mt-md-0 mb-md-0 d-flex justify-content-center align-items-center flex-column">
        <p class="text-decoration-none fw-bold fs-2 text-center text-dark">Dan Masih Banyak Lagi!</p>
    </div>
</div>
@endsection