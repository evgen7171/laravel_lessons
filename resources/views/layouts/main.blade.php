<?php
$homeRoute = route('home');
$newsRoute = route('news');
$categoriesRoute = route('categories');
$addNewsRoute = route('news.add');
$adminRoute = route('admin.admin');
?>

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
            <li><a href="<?=$homeRoute?>" class="menu__link">Главная</a></li>
            <li><a href="<?=$newsRoute?>" class="menu__link">Новости</a></li>
            <li><a href="<?=$categoriesRoute?>" class="menu__link">Категории новостей</a></li>
            <li><a href="<?=$addNewsRoute?>" class="menu__link">Добавить новость</a></li>
            <li><a href="<?=$adminRoute?>" class="menu__link">Админ</a></li>
        </ul>
@show
<hr>
<div class="container">
    @yield('content')
</div>

</body>
</html>