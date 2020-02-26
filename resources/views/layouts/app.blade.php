<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    @yield('menu')

    <main class="py-4">

        @yield('content')
    </main>

    <div class="container text-right">
        <a href="{{url()->previous()}}" class="btn alert-secondary-inv">Вернуться</a>
    </div>
    <div class="container text-right mt-1">
        <a href="{{route('home')}}" class="btn alert-secondary-inv">На главную</a>
    </div>
</div>
</body>
</html>