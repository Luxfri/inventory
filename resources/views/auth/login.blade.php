<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if ($errors->any())
        <div style="color:red">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>