@extends('layouts.app')

<!-- Include SweetAlert Scripts and Stylesheets -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<body>
@section('body')
    <h1>Halaman depan</h1>
    <li><a href="" class="login" id="logoutLink">
        <i class="fas fa-sign-out-alt"></i>
        <span class="nav-item">Keluar</span>
      </a></li>
@endsection

{{-- @include('sweetalert::alert') --}}
{{-- 
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
                    window.location.href="login/logout";
        }
      })
    }
    })
    </script> --}}

    @if(session('success'))
        <script>
        {
            Swal.fire({
            position: 'center',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
            title: "Berhasil!",
            text: "Selamat Datang!",
        });
    }
        </script>
    @endif

    @if(session('error'))
        <script>
        {
            Swal.fire({
            position: 'center',
            icon: 'error',
            showConfirmButton: false,
            timer: 1500,
        });
    }
        </script>
    @endif
</body>