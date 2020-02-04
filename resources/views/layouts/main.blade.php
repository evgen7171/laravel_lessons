<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Блог о странах и путешествиях</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>

@section('sidebar')
    <ul class="menu">
        <li><a href="/" class="menu_link">Главная</a></li>
        <li><a href="/articles" class="menu_link">Статьи</a></li>
        <li><a href="/info" class="menu_link">Справка</a></li>
    </ul>
@show
<hr>
<div class="container">
    @yield('content')
</div>

</body>
</html>