@extends('layouts.app')
@section('content')
<div class="row">
  {{-- <div class="col-12 mt-5">
    <div class="d-flex justify-content-end">
      <a href="{{ route('buku.create') }}" class="btn btn-primary">
        <i class="bi bi-plus"></i>
      </a>
    </div>
    <div class="table-responsive">
      <table class="table" id="example">
        <thead>
          <tr>
            <th>Judul Buku</th>
            <th>Cover</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Stok</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($buku as $d)
          <tr>
          <td>{{ $d->judul }}</td>
          <td>{{ $d->cover }}</td>
          <td>{{ $d->penulis }}</td>
          <td>{{ $d->penerbit}}</td>
          <td>{{ $d->tahun }}</td>
          <td>{{ $d->stok }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div> --}}
  <div class="col-12 mt-5">
    <div class="card">
      <div class="car-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-3 fw-bold">
              Judul Buku
            </div>
            <div class="col-9">
              : {{ $buku->judul }}
            </div>
          </div>
        </div>
          'judul',
          'penulis',
          'penerbit',
          'tahun',
          'deskripsi',
          'cover',
          'stok',
        </div>
      </div>
    </div>
  </div>
</div>
@endsection