@extends('layouts.app')
@section('content')
<div class="row mt-5">
  <div class="col-12 mt-5">
    <div class="card">
      <div class="card-body">
        <div class="container border-bottom border-dark">
          <div class="row mt-3">
            <div class="col-6">
              <div class="d-flex">
                <p class="fw-bold">Judul Buku</p>
                <p class="ms-auto">:</p>
              </div>
            </div>
            <div class="col-6">
              {{ $peminjaman->buku->judul }}
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <div class="d-flex">
                <p class="fw-bold">Nama Peminjam</p>
                <p class="ms-auto">:</p>
              </div>
            </div>
            <div class="col-6">
              {{ $peminjaman->user->name }}
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <div class="d-flex">
                <p class="fw-bold">Tanggal Meminjam</p>
                <p class="ms-auto">:</p>
              </div>
            </div>
            <div class="col-6">
            {{ $peminjaman->tanggal_peminjaman->format('j F Y') }}
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <div class="d-flex">
                <p class="fw-bold">Tenggat Peminjaman</p>
                <p class="ms-auto">:</p>
              </div>
            </div>
            <div class="col-6">
            {{ $peminjaman->tanggal_pengembalian->format('j F Y') }}
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <div class="d-flex">
                <p class="fw-bold">Denda Keterlambatan / Hari</p>
                <p class="ms-auto">:</p>
              </div>
            </div>
            <div class="col-6">
              Rp. {{ $denda }}
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <div class="d-flex">
                <p class="fw-bold">Keterlambatan</p>
                <p class="ms-auto">:</p>
              </div>
            </div>
            <div class="col-6">
              {{ $hari_keterlambatan  }} hari
            </div>
          </div>
        </div>
        <div class="container text-danger text-danger">
          <div class="row mt-3">
            <div class="col-6">
              <div class="d-flex">
                <p class="fw-bold">Denda</p>
                <p class="ms-auto">:</p>
              </div>
            </div>
            <div class="col-6">
              Rp. {{ $denda * $hari_keterlambatan  }}
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end gap-3 mt-5">
          <button class="btn btn-secondary">Keluar</button>
          <form action="{{ route('pengembalian.store',['peminjaman_id' => $peminjaman->id, 'denda' => $denda * $hari_keterlambatan]) }}" method="post">
            @csrf
            @method('POST')
            @if($denda * $hari_keterlambatan > 0)
              <button class="btn btn-danger">Kembalikan, dan bayar denda</button>
            @else
            <button class="btn btn-success">Kembalikan Buku</button>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection