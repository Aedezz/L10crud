<!-- resources/views/auth/login.blade.php -->

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
    <input type="text" id="username" name="username" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif
