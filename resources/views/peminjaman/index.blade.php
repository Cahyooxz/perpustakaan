@extends('layouts.app')
@section('content')
<script>
    Swal.fire({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success"
      });
</script>
<div class="row">
  <div class="col-12 mt-5">
    <div class="d-flex justify-content-end">
      <a href="{{ route('buku.create') }}" class="btn btn-primary">
        <i class="bi bi-plus"></i>
      </a>
    </div>
    <h4>Daftar Peminjaman Perpustakaan</h4>
    <div class="table-responsive">
      <table class="table" id="example">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($peminjaman as $d)
          <tr>
            <td>{{ $d->id }}</td>
            <td>{{ $d->user->name }}</td>
            <td>{{ $d->buku->judul }}</td>
            <td>{{ $d->tanggal_peminjaman->format('j F Y') }}</td>
            <td>{{ $d->tanggal_pengembalian->format('j F Y') }}</td>
            <td>{{ $d->status == 0 ? 'Dibalikan' : 'Dipinjam' }}</td>
            <td>
            <form action="{{ route('peminjaman.destroy',['id' => $d->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
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