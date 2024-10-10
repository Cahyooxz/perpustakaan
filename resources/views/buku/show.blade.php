@extends('layouts.app')
@section('content')
<div class="row">
  <div class="container mt-5">
    <div class="shadow-sm p-5 rounded">
      <div class="card-body">
        <div class="row px-3 py-3">
          <div class="col-12 mb-3 col-md-3 mb-md-0">
            <div class="book-cover-show shadow rounded">
              <img src="{{ asset('storage/buku/'.$buku->cover) }}" alt="" class="w-100 h-100 rounded">
            </div>
          </div>
          <div class="col-12 col-md-8 ms-md-5">
            <div class="row">
              <div class="col-12 mb-3">
                <h3 class="fw-bold">{{ $buku->judul }}</h3>
                <small class="fw-bold text-muted">{{ $buku->penulis }}</small>
              </div>
              <div class="col-12 mb-3">
                <div class="d-flex">
                  <div class="head-info">
                    <p class="p-0 m-0 fw-semibold">Penerbit Buku :</p>
                    <small class="text-muted p-0">{{ $buku->penerbit }}</small>
                  </div>
                  <div class="head-info ms-5">
                    <p class="p-0 m-0 fw-semibold">Tahun Terbit :</p>
                    <small class="text-muted p-0">{{ $buku->tahun }}</small>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-3">
                <p class="p-0 m-0 fw-semibold">Deskripsi Buku :</p>
                <small class="text-muted p-0">{{ $buku->deskripsi }}</small>
              </div>
              @if($buku->stok >= 1 && $peminjaman->isEmpty())
                <div class="d-flex">
                  <button type="button" class="button bg-purple px-3 text-light ms-auto" data-bs-toggle="modal" data-bs-target="#modalPinjam">Pinjam dong!</button>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-3">
    <div class="shadow-sm p-5 rounded bg-body-tertiary">
      <div class="card-body">
        <div class="container">
          <div class="row">
            @if(!$peminjaman->isEmpty())
              <div class="col-12 mb-5">
                  <div class="d-flex align-items-center gap-3">
                    <p class="fw-bold m-0">{{ Auth::user()->name }}</p>
                    <small>berikan komentarmu</small>
                  </div>
                  <form action="{{ route('komentar.store',['user_id' => Auth::user()->id, 'buku_id' => $buku->id]) }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="d-flex align-items-center gap-3 mt-3">
                      <textarea name="komentar" id="" cols="30" rows="5" class="form-control"></textarea>
                      <button type="submit" class="text-purple border-0 bg-transparent"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                  </form>
            </div>
            @endif
            @foreach ($komentar as $k)
            <div class="col-12 mb-5">
                <div class="d-flex align-items-center gap-3">
                  <p class="fw-bold m-0">{{ $k->user->name }}</p>
                  <small>{{ $k->created_at->DiffForHumans() }}</small>
                </div>
                <div class="d-flex align-items-center gap-3 mt-3">
                  <small>{{ $k->komentar }}</small>
                  <div class="d-flex gap-3 ms-auto">
                    <div class="d-flex flex-colum gap-3">
                      <small>5</small>
                      <button type="submit" class="border-0 bg-transparent text-purple"><i class="fa-regular fa-heart"></i></button>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalPinjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route('peminjaman.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Pinjam Buku {{ $buku->judul }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 d-none">
                    <label for="" class="mb-3">Judul Buku</label>
                    <input type="number" value="{{ $buku->id }}" class="form-control" name="id_buku" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="mb-3">Judul Buku</label>
                    <input type="text" value="{{ $buku->judul }}" class="form-control" name="judul_buku" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="mb-3">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" name="tanggal_pengembalian">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="button btn-purple px-3">Pinjam</button>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection