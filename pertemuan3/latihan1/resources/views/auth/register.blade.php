<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

{{-- Tampilkan error --}}
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('register.process') }}" method="POST">
    @csrf

    <label for="name">Nama</label><br>
    <input type="text" name="name" placeholder="Masukkan nama lengkap" required>
    <br><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" placeholder="Masukkan email" required>
    <br><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" placeholder="Masukkan password" required>
    <br><br>

    <label for="password_confirmation">Konfirmasi Password</label><br>
    <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
    <br><br>

    <button type="submit">Register</button>
</form>

<p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>
