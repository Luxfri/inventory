<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - Mini Inventory</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f5f5f5;
               display: flex; justify-content: center; align-items: center; height: 100vh; }
        .box { background: #fff; padding: 30px; border-radius: 8px; width: 340px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { font-size: 22px; margin-bottom: 20px; }
        label { display: block; margin-top: 12px; font-size: 14px; color: #333; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; margin-top: 18px; background: #2563eb; color: #fff;
                 border: none; border-radius: 4px; cursor: pointer; font-size: 15px; }
        .error { color: #dc2626; font-size: 13px; margin-top: 4px; }
        .footer-link { margin-top: 16px; font-size: 14px; text-align: center; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Daftar Akun Baru</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <label>Password</label>
            <input type="password" name="password">
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation">

            <button type="submit">Daftar</button>
        </form>

        <div class="footer-link">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>
</body>
</html>