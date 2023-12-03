{{-- @extends('layouts.app') --}}
<!-- resources/views/auth/login.blade.php -->   
<!-- Include SweetAlert Scripts and Stylesheets -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<body>
    {{-- @include('sweetalert::alert') --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('/login') }}">
    @csrf

    <label for="username">Username:</label>
    <input type="text" name="username" placeholder="Username" id="username" class="nama" class="@error('username') error1 @enderror">

    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password" id="password" class="pass" class="@error('password') error1 @enderror">

    <input type="submit" name="Login" class="Login" value="LOGIN" id="login">
</form>

{{-- @if(session('success'))
        <script>
        {
            Swal.fire({
            position: 'center',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
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
    @endif --}}
</body>