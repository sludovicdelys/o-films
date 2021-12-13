<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div id="navbarBasicExample" class="navbar-menu">
              <div class="navbar-start">
                <a href="{{ route('movies_index') }}" class="navbar-item has-text-primary-dark">
                  Movies
                </a>
                <a href="{{ route('series_index') }}" class="navbar-item has-text-primary-dark">
                  Series
                </a>
              </div>
            </div>
          </nav>
    </header>
    <main>
      @yield('content')
    </main>
    <footer></footer>
</body>
</html>