<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', config('app.name'))</title>

        <link href="/css/app.css" rel="stylesheet">
        {{--FOR DEVELOPMENT <script src="https://cdn.tailwindcss.com/3.0.11"></script>--}}

        @yield('styles')
    </head>
    <body class="antialiased bg-stone-50 text-stone-800 dark:bg-stone-800 dark:text-stone-50">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
            @yield('main')
        </div>
        <div class="fixed top-0 right-0 p-1">
            {{ language()->flags() }}
        </div>
        <script defer src="/js/app.js"></script>
        @yield('scripts')
    </body>
</html>
