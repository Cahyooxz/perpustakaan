@extends('layouts.app')
@section('content')
<div class="row">
  <div class="container mt-5">
    <div class="card">
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
              @if($buku->stok >= 1)
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
            <button type="submit" class="btn btn-primary">Pinjam</button>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection