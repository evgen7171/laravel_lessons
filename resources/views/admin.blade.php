@extends('menu.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div class="caption">=Админ=</div>
@endsection

@section('content')
    <a href="{{route('admin.test1')}}">Тест 1</a>
    <a href="{{route('admin.test2')}}">Тест 2</a>
    <h1>Добро пожаловать Admin!</h1>
    {{ isset($text) ? $text : '' }}
@endsection


