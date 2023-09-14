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
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
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
                        Connexion
                    </a>
                @endguest

                @auth
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Dropdown navigation">{{ auth()->user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="{{ route('auth.logout') }}" class="dropdown-item">Logout</a></li>
                        </ul>
                    </li>
                </ul>  
                @endauth
            </div>
        </div>             
    </nav>
    <main>
        <div class="container-fluid py-3 my-4">
            @yield('content')
        </div>
    </main>
    <footer>
        <div class="container-fluid py-3 my-4">
            <p class="text-center text-muted">An experimental project crafted with care by 
                <a class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="https://github.com/sludovicdelys">Sabrina</a>
                ©2023
            </p>
        </div>
    </footer>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>