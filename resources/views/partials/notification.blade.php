@if(session('success'))
  <script>
    Swal.fire({
      title: 'Berhasil!',
      text: '{{ session('success') }}!',
      icon: 'success'
    });
  </script>
@endif
