<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                <a href="{{ route('movies.index') }}" class="navbar-item has-text-primary-dark">
                    Films
                </a>
                <a href="{{ route('movies.create') }}" class="navbar-item has-text-primary-dark">
                    Inserer un film
                </a>
                <a href="{{ route('series.create') }}" class="navbar-item has-text-primary-dark">
                    Inserer une série
                </a>
                <a href="{{ route('series.index') }}" class="navbar-item has-text-primary-dark">
                    Series
                </a>
                <a href="{{ route('login.index') }}" class="navbar-item has-text-primary-dark">
                    Login
                </a>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
</body>
</html>