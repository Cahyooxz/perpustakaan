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
                </div>
            </div>
        </a>
    </div>
  @endforeach
</div>
@endsection