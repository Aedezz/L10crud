<!-- resources/views/auth/login.blade.php -->

<form method="POST" action="{{ url('/login') }}">
    @csrf

    <label for="username">Username or Email</label>
    <input type="text" name="username" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif
