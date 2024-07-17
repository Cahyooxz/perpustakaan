@extends('layouts.app')
@section('content')
<div class="row mb-5" style="margin-top: 100px">
    <div class="col-12 text-center mb-5">
        <h4 class="fw-semibold text-center mb-5"><i class="bi bi-journal-bookmark-fill me-3"></i>Cari Buku Kesukaanmu..</h4>
        <form action="{{ route('peminjaman.user_index') }}" method="GET">
            <div class="row">
                <div class="col-11">
                    <input type="text" placeholder="Masukan Judul Buku anda di sini :)" class="form-control" name="search" value="{{ request()->input('search') }}">
                </div>
                <div class="col-1">
                    <button type="submit" class="button btn-purple px-3"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    @if(!$buku->isEmpty())
        @foreach ($buku as $d)
            @if($d->stok >= 1)
            <div class="col-6 col-md-6 col-lg-3 mb-3">
                <a href="{{ route('buku.show',['id' => $d->id]) }}" class="text-decoration-none">
                    <div class="card border-0 pt-3 pb-0 shadow-sm">
                        <div class="d-flex justify-content-end me-3 mt-3 mb-3">
                            @if($wishlist->where('buku_id',$d->id)->isEmpty())
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
                            @if($wishlist->where('buku_id',$d->id)->isEmpty())
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
    @else
        <div class="col-12 d-flex justify-content-center">
            <img src="{{ asset('img/empty record.gif') }}" alt="">
        </div>
    @endif

</div>
@endsection