@extends('menu.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div class="caption">=Добавить новость=</div>
@endsection

@section('content')
    <p class="error">В данный момент страница находится в разработке!</p>
    <form method="post" action="{{route('news.add')}}">
        @csrf
        <div class="line"><span>Название:</span><input type="text" name="title"></div>
        <div class="line"><span>Категория:</span><input type="text" name="category"></div>
        <div class="line"><span>Текст:</span><input type="text" name="text"></div>
        <input type="submit" value="отправить">
    </form>
@endsection
