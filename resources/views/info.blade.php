@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div style="border:1px solid black">=Информация=</div>
@endsection

@section('content')
    <p>Сайт в разработке</p>
    <p>&copy;Евгений by GeekBrains. 2020 г.</p>
@endsection
