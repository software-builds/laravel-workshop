<html>
    <head>
        <title>@yield('title')</title>
        @vite('resources/css/app.css')
    </head>
    <body class="min-h-screen bg-gray-100">
        @yield('header-post')
        @include('layouts.parts.header')
        <div class="max-w-[80ch] mx-auto mt-8">
            @yield('content')
        </div>
    </body>
</html>
