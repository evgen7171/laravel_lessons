@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div style="border:1px solid black">=Админ=</div>
@endsection

@section('content')
    @if(isset($links))
        @foreach($links as $link)
            <a href="/admin/{{$link}}">{{$link}}</a>
        @endforeach
    @endif
    <h1>Добро пожаловать Admin!</h1>
    {{ isset($text) ? $text : '' }}
@endsection

{{--{{ $param or 'Default' }}--}}


