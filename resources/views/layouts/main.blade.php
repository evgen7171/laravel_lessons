<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Блог о странах и путешествиях</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@section('sidebar')
    <div id="app">
        <ul class="menu">
            <li><a href="{{route('home')}}" class="menu__link">Главная</a></li>
            <li><a href="{{route('news')}}" class="menu__link">Новости</a></li>
            @if(!\App\Http\Controllers\LoginController::getLogin())
                <li><a href="{{route('login')}}" class="menu__link">Войти</a></li>
            @else
                <li><span>Вы вошли как {{\App\Http\Controllers\LoginController::getLogin()}},</span>
                    <a href="{{route('logout')}}" class="menu__link">Выйти</a></li>
            @endif
        </ul>
    </div>
@show
<hr>
<div class="container">
    @yield('content')
</div>
<hr>
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
</body>
</html>
