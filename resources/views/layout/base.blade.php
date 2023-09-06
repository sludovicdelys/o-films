<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="#">O'films</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex-md justify-content-between" id="mainNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="{{ route('movies.index') }}" class="nav-link">Films</a></li>
                    @auth
                        <li class="nav-item"><a href="{{ route('movies.create') }}" class="nav-link ">Inserer un film</a></li>
                        <li class="nav-item"><a href="{{ route('series.create') }}" class="nav-link">Inserer une série</a></li>
                    @endauth
                    <li class="nav-item"><a href="{{ route('series.index') }}" class="nav-link">Series</a></li>
                </ul>
                @guest
                    <a href="{{ route('auth.login') }}" class="nav-link my-2 my-md-0 has-text-primary-dark">
                        Login
                    </a>
                @endguest

                @auth
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Dropdown navigation">{{ auth()->user()->name }}</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Profile</a></li>
                            <li><a href="{{ route('auth.logout') }}" class="dropdown-item">Logout</a></li>
                        </ul>
                    </li>
                </ul>  
                @endauth
            </div>
        </div>             
    </nav>
    <main class="container">
        <div class="container">
            @yield('content')  
        </div>
    </main>
    <footer class="py-3 my-4">
        <div class="container">
            <p class="text-center text-muted">An experimental project crafted with dedication by Sabrina.</p>
        </div>
    </footer>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>