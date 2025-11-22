<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitGym - @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Navbar */
        .navbar-custom {
            background-color: #1e272e;
        }
        .navbar-custom a, .navbar-custom .navbar-brand {
            color: #ffffff;
            font-weight: bold;
        }
        .navbar-custom a:hover {
            color: #dff9fb;
        }

        /* Hero banner */
        .hero {
            background: url('https://images.unsplash.com/photo-1571019613914-85f342c9943d?auto=format&fit=crop&w=1500&q=80') no-repeat center center;
            background-size: cover;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-shadow: 2px 2px 6px #000;
            margin-bottom: 40px;
            border-radius: 10px;
        }
        .hero h1 {
            font-size: 2.8rem;
        }

        /* Card produk */
        .card-product {
            transition: transform 0.2s, box-shadow 0.2s;
            border-radius: 10px;
        }
        .card-product:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .card-product img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        /* Tombol beli */
        .btn-buy {
            background-color: #ff6b6b;
            border: none;
            font-weight: bold;
        }
        .btn-buy:hover {
            background-color: #ff4757;
        }

        /* Footer */
        footer {
            background-color: #1e272e;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-top: 50px;
        }

        /* Utility */
        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('customer.produk') }}">FitGym</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCustomer" aria-controls="navbarCustomer" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCustomer">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-3">
                        <span class="nav-link text-white">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  

    <!-- Main content -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} FitGym. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
