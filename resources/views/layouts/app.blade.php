<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href='{{ asset("favicon.ico") }}'>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/templatemo-training-studio.css') }}">
    <style>
        html {
            background: url("/images/wallpaper.jpg") no-repeat;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
        body {
            background: transparent;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('partials.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
