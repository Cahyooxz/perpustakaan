@if(session('success'))
  <script>
    Swal.fire({
      title: 'Berhasil!',
      text: '{{ session('success') }}!',
      icon: 'success'
    });
  </script>
@endif
@if(session('fail_pinjam'))
  <script>
    Swal.fire({
      title: 'Gagal!',
      text: '{{ session('fail_pinjam') }}!',
      icon: 'error'
    });
  </script>
@endif
