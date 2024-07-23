@extends('layouts.app')
@section('content')
<div class="row mb-5">
  <div class="col-12 mt-4 min-vh-100">
      <h5 class="fw-bold">Edit Daftar Buku</h5>
      <div class="col-6">
        <form action="{{ route('buku.update',['id' => $buku->id]) }}" class="mt-3" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PUT')
          <div class="mt-3">
            <label for="" class="mb-3">Judul Buku</label>
            <input value="{{ $buku->judul }}" type="text" name="judul_buku" class="form-control">
            @error('judul_buku')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mt-3">
            <label for="" class="mb-3">Penulis Buku</label>
            <input value="{{ $buku->penulis }}" type="text" name="penulis_buku" class="form-control">
            @error('penulis_buku')
            <small class="text-danger">{{ $message }}</small>
          @enderror
          </div>
          <div class="mt-3">
            <label for="" class="mb-3">Penerbit</label>
            <input value="{{ $buku->penerbit }}" type="text" name="penerbit_buku" class="form-control">
            @error('penerbit_buku')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mt-3">
            <label for="" class="mb-3">Tahun Terbit</label>
            <input  value="{{ $buku->tahun }}" type="number" name="tahun_terbit" class="form-control">
            @error('tahun_terbit')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mt-3">
            <label for="" class="mb-3">Deskripsi Buku</label>
            <textarea type="text" name="deskripsi_buku" class="form-control" cols="30" rows="10">{{ $buku->deskripsi }}</textarea>
            {{-- <input type="text" name="deskripsi_buku" class="form-control"> --}}
            @error('deskripsi_buku')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          
          <div class="mt-3">
            <label for="" class="mb-3">Cover Buku <p class="text-danger">*{{ $buku->cover }}</p></label>
            <input type="file" name="cover_buku" class="form-control">
            @error('cover_buku')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mt-3">
            <label for="" class="mb-3">Stok Buku</label>
            <input value="{{ $buku->stok }}" type="number" name="stok_buku" class="form-control">
            @error('stok_buku')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mt-5">
            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Keluar</a>
            <button type="submit" class="button btn-purple px-3">Simpan</button>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection