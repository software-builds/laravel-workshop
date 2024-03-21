<html>
    <head>
        <title>@yield('title')</title>
        @vite('resources/css/app.css')
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/c3da266bcc.js" crossorigin="anonymous"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="min-h-screen flex flex-col bg-gray-100 opacity-10" onload="addLoaded()">
        @include('layouts.parts.header')
        <div class="md:max-w-[80ch] flex-1 mx-5 md:mx-auto mt-8">
            @yield('content')
        </div>
        @include('layouts.parts.footer')
        <script>
            function addLoaded() {
                document.body.classList.add('loaded');
            }
        </script>
    </body>
</html>
