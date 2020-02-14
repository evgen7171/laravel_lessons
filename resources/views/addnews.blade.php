@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div style="border:1px solid black">=Добавить новость=</div>
@endsection

@section('content')
    <form method="post" action="/news/add">
        @csrf
        <div class="line"><span>Название:</span><input type="text" name="title"></div>
        <div class="line"><span>Категория:</span><input type="text" name="categories"></div>
        <div class="line"><span>Текст:</span><input type="text" name="text"></div>
        <input type="submit" value="отправить">
    </form>
@endsection
