<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<nav style="padding: 10px; background:#eee;">
    <a href="/products">Produk</a> |
    <a href="/logout">Logout</a>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
