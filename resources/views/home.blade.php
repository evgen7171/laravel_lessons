@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div class="caption">=Главная=</div>
@endsection

@section('content')
    Добро пожаловать!<br>
    Welcome!<br>
    Willkommen!<br>
@endsection

