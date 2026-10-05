<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Mini Inventory</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f5f5f5;
               display: flex; justify-content: center; align-items: center; height: 100vh; }
        .box { background: #fff; padding: 30px; border-radius: 8px; width: 320px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { font-size: 22px; margin-bottom: 20px; }
        label { display: block; margin-top: 12px; font-size: 14px; color: #333; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; margin-top: 18px; background: #2563eb; color: #fff;
                 border: none; border-radius: 4px; cursor: pointer; font-size: 15px; }
        .error { color: #dc2626; font-size: 13px; margin-top: 10px; }
        .footer-link { margin-top: 16px; font-size: 14px; text-align: center; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Login — Mini Inventory</h1>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" autofocus>

            <label>Password</label>
            <input type="password" name="password">

            <button type="submit">Login</button>
        </form>

        <div class="footer-link">
            Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
        </div>
    </div>
</body>
</html>