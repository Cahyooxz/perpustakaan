@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-12 mt-5">
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
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($buku as $d)
          <tr>
          <td>{{ $d->judul }}</td>
          <td><img src="{{ asset('storage/buku/'.$d->cover)}}" alt="" srcset="" style="width: 150px"></td>
          <td>{{ $d->penulis }}</td>
          <td>{{ $d->penerbit}}</td>
          <td>{{ $d->tahun }}</td>
          <td>{{ $d->stok }}</td>
          <td>
            <a href="{{ route('buku.show',['id' => $d->id]) }}" class="btn btn-primary mb-2"><i class="bi bi-pencil"></i></a>
            <a href="{{ route('buku.show',['id' => $d->id]) }}" class="btn btn-warning mb-2"><i class="bi bi-info"></i></a>
            <form action="{{ route('buku.destroy',['id' => $d->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger mb-2"><i class="bi bi-trash3"></i></button>
            </form>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection