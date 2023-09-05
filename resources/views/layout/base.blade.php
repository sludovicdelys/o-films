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
        <header>
            <div class="navbar navbar-expand-md">
                <a class="navbar-brand" href="#">O'films</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{ route('movies.index') }}" class="nav-link">Films</a></li>
                        <li class="nav-item"><a href="{{ route('movies.create') }}" class="nav-link ">Inserer un film</a></li>
                        <li class="nav-item"><a href="{{ route('series.create') }}" class="nav-link">Inserer une série</a></li>
                        <li class="nav-item"><a href="{{ route('series.index') }}" class="nav-link">Series</a></li>
                    </ul>
                    @guest
                        <a href="{{ route('auth.login') }}" class="my-2 my-md-0 has-text-primary-dark">
                            Login
                        </a>
                    @endguest
                </div>

                <!-- <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-md-0">
                    <input class="form-control" type="text" placeholder="Search">
                    </form>
                </div> -->

                <!-- <ul class="menu_section">
                    @auth
                    <button class="user-menu__button navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                        <span>{{ auth()->user()->name }}</span>
                    </button>

                    <div class="navbar-collapse collapse" id="navbarsExample10">
                        <ul class="user-menu__content">
                            <li class="">Profile</li>
                            <li class=""><a href="{{ route('auth.logout') }}" class="">Logout</a></li>
                        </ul>
                    </div> 
                    @endauth
                </ul> -->
            </div>
        </header>
        @yield('content')
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>