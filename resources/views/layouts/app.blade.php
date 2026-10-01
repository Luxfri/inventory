<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mini Inventory')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        nav { display: flex; justify-content: space-between; align-items: center;
              background: #fff; padding: 12px 20px; border-radius: 6px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
        .btn { padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; font-size: 14px; }
        .btn-primary { background: #2563eb; color: white; }
        .btn-danger { background: #dc2626; color: white; }
        .btn-edit { background: #f59e0b; color: white; }
        .alert { padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .alert-success { background: #dcfce7; color: #166534; }
        .alert-danger { background: #fee2e2; color: #991b1b; }
        form.inline { display: inline; }
        input, select { padding: 6px; margin-bottom: 8px; width: 100%; max-width: 300px; }
    </style>
</head>
<body>

    <nav>
        <div>
            <strong>Mini Inventory</strong>
            @auth
                &nbsp;|&nbsp;
                <a href="{{ route('products.index') }}">Produk</a>
                &nbsp;|&nbsp;
                <a href="{{ route('categories.index') }}">Kategori</a>
            @endauth
        </div>
        <div>
            @auth
                Login sebagai: <strong>{{ auth()->user()->name }}</strong>
                ({{ auth()->user()->role }})
                <form class="inline" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
            @endauth
        </div>
    </nav>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')

</body>
</html> 