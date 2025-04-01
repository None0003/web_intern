<!-- resources/views/layouts/header.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand fs-4" href="{{ route('home') }}"><strong>Test Auth Service</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="col-md-11 navbar-nav">
                        <li class="nav-item"><a class="nav-link fs-5" href="">Logs</a></li>
                        <li class="nav-item"><a class="nav-link fs-5" href="">Collections</a></li>
                    </ul>
                    <div class="col-md-1 profile-block">
                        <button type="button" class="btn btn-light nav-item"><a href="{{ route('login') }}" class="text-decoration-none text-black">Login</a></button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
