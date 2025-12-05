<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

{{-- Tampilkan error jika ada --}}
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('login.process') }}" method="POST">
    @csrf

    <label for="email">Email</label><br>
    <input type="email" name="email" placeholder="Masukkan email" required>
    <br><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" placeholder="Masukkan password" required>
    <br><br>

    <button type="submit">Login</button>
</form>

<p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
</body>
</html>
