<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <title>@yield('title', 'Triones')</title>
    </head>

    <body>
        <header>
            @yield('header')
        </header>

        <main>
            @yield('main-content')
        </main>

        <footer>
            @yield('footer')
        </footer>
    </body>

</html>
