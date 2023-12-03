<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coba CRUD</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
        @include('layouts.navbar')  
    {{-- @include('sweetalert::alert') --}}

    <div class="container py-5">
        @yield('body')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @yield('js')

    <script>
      document.addEventListener('DOMContentLoaded', function () {
          document.getElementById('logoutLink').addEventListener('click', function () {
              event.preventDefault();
              confirmLogout();
          });
  
          function confirmLogout() {
              Swal.fire({
                  title: 'Yakin Ingin Keluar?',
                  text: "Tindakan tidak bisa diulangi lagi",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, Logout!'
              }).then((result) => {
                  if (result.isConfirmed) {
                      Swal.fire('Logged Out', 'Kamu berhasil Logout.', 'success');
                      window.location.href = "login";
                  }
              });
          }
      });
  </script>
  </body>
</html>