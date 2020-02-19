@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div class="caption">={{$news['title']}}=</div>
@endsection

@section('content')
    @if( !$news['isPrivate'] or \App\Http\Controllers\LoginController::isLogged() )
        {{$news['text']}}
    @else
        <p>Только для авторизованных пользователей!</p>
    @endif
@endsection
