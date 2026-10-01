<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Daftar Akun</h1>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>