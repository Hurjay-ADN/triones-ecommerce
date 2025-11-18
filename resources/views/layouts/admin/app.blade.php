<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
        <title>@yield('title', 'Triones')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Mrs+Sheppards&display=swap" rel="stylesheet">
    </head>

    <body class="font-[Figtree]">

        <div class="flex">
            <div class="w-2/12">
                @include('layouts.admin.sidebar')
            </div>
            

            <main class="w-10/12">
                @yield('main-content')
            </main>
        </div>
        

        

        @include('layouts.admin.footer')
    </body>

</html>
