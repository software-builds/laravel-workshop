<html>
    <head>
        <title>@yield('title')</title>
        @vite('resources/css/app.css')
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="min-h-screen bg-gray-100">
        @include('layouts.parts.header-shop')
        <div class="max-w-[80ch] mx-auto mt-8">
            @yield('content')
        </div>
    </body>
</html>
