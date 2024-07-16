@extends('layouts.app')
@section('content')
<div class="row mb-5" style="margin-top: 100px">
    <div class="col-12 text-purple">
        <p class="fw-bold"><i class="bi bi-journal-bookmark-fill me-3"></i>Ini Pinjaman Buku Anda</p>
    </div>
  @foreach ($buku as $d)
    <div class="col-6 col-md-6 col-lg-3 mb-3">
        <a href="{{ route('buku.show',['id' => $d->buku->id]) }}" class="text-decoration-none">
            <div class="card border-0 pt-3 buku_pb-0 shadow-sm">
                <div class="card-body rounded d-flex justify-content-center align-items-center flex-column">
                    <div class="book-cover shadow rounded">
                    <img src="{{ asset('storage/buku/'.$d->buku->cover) }}" class="img-fluid rounded">
                    </div>
                    <p class="fw-bold mt-5" style="font-size: 12px">{{ $d->buku->judul }}</p>
                    <p class="text-muted">{{ $d->buku->penulis }}</p>
                    <a href="{{ route('pengembalian.index',['peminjaman_id' => $d->id]) }}" class="btn btn-success">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-book-bookmark me-1"></i>
                            <i class="fa-solid fa-right-left"></i>
                            <p class="m-0 p-0 ms-3">Kembaliin buku</p>
                        </div>
                    </a>
                </div>
            </div>
        </a>
    </div>
  @endforeach
</div>
@endsection