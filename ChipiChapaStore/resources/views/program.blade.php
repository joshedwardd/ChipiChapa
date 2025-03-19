<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ChipiChapa')</title>
-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">ChipiChapa</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
               
                <li class="nav-item"><a class="nav-link" href="{{ url('/barangs') }}">Barang</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
            </ul>
        </div>
    </nav>

   
    <div class="container mt-4">
        @yield('content')
    </div>


    <footer class="bg-light text-center mt-4 p-3">
        <p>&copy; {{ date('Y') }} ChipiChapa. All rights reserved.</p>
    </footer>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
