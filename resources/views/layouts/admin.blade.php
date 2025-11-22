<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            background: #f5f6fa;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: #212529;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #343a40;
            color: white;
        }

        /* Main content */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        .navbar-custom {
            background: white;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center mb-4">FitGym</h4>
        <a href="/produk.index">Dashboard</a>
        <a href="/produk">Produk</a>
        <a href="/pesanan">Pesanan</a>
<!-- Logout POST form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="#" class="text-danger"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
   Logout
</a>

    </div>

    <!-- Content -->
    <div class="main-content">
        <div class="navbar-custom d-flex justify-content-between">
            <h5 class="m-0">@yield('title')</h5>
        </div>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
