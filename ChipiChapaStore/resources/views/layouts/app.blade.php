<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ChipiChapa')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">ChipiChapa</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.barang.index') }}">Kelola Barang</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.katalog') }}">Katalog</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>
    <div class="container my-4">
        @yield('content')
    </div>

    <footer class="text-center p-3">
        <p>&copy; {{ date('Y') }} ChipiChapa. All rights reserved.</p>
    </footer>
</body>
</html>
