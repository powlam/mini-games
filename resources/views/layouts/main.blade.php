<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', config('app.name'))</title>

        <link href="/css/app.css" rel="stylesheet">
        @yield('styles')
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
            @yield('main')
        </div>
        <script defer src="/js/app.js"></script>
        @yield('scripts')
    </body>
</html>
