$(document).ready(function() {
    $('#example').DataTable({
    lengthMenu:[
        [10, 25, 50, -1], // Nilai -1 berarti semua data
        [10, 25, 50, "All"] // Label yang ditampilkan untuk opsi
    ],
        language: {
            emptyTable: "<div class='d-flex flex-column justify-content-center align-items-center'><img src='img/empty record.gif' alt=''></div>",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(disaring dari _MAX_ total entri)",
            lengthMenu: "Tampilkan _MENU_ entri",
            loadingRecords: "Memuat...",
            processing: "Sedang diproses...",
            search: "Cari:",
            zeroRecords: "<div class='d-flex flex-column justify-content-center align-items-center'><img src='img/not found.gif' alt=''></div>",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Berikutnya",
                previous: "Sebelumnya"
            },
            aria: {
                sortAscending: ": aktifkan untuk mengurutkan kolom naik",
                sortDescending: ": aktifkan untuk mengurutkan kolom turun"
            }
        }
    });
});
$(document).ready(function() {
    $('#peminjaman').DataTable({
    lengthMenu:[
        [10, 25, 50, -1], // Nilai -1 berarti semua data
        [10, 25, 50, "All"] // Label yang ditampilkan untuk opsi
    ],
        language: {
            emptyTable: "ga ada data peminjaman",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(disaring dari _MAX_ total entri)",
            lengthMenu: "Tampilkan _MENU_ entri",
            loadingRecords: "Memuat...",
            processing: "Sedang diproses...",
            search: "Cari:",
            zeroRecords: "catatan peminjaman yang kamu cari ga ada nih.",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Berikutnya",
                previous: "Sebelumnya"
            },
            aria: {
                sortAscending: ": aktifkan untuk mengurutkan kolom naik",
                sortDescending: ": aktifkan untuk mengurutkan kolom turun"
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
  var inputs = document.querySelectorAll('.form-inputs');

  inputs.forEach(function(input) {
      var label = input.previousElementSibling;
      if (label && label.classList.contains('form-label')) {
          // Check input value on page load
          if (input.value !== '') {
              label.classList.add('focused');
          }

          // Add event listener for focus event
          input.addEventListener('focus', function() {
              label.classList.add('focused');
          });

          // Add event listener for blur event
          input.addEventListener('blur', function() {
              if (input.value === '') {
                  label.classList.remove('focused');
              }
          });
      }
  });
});