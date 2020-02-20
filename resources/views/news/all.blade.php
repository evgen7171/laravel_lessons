@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    @if(!isset($category))
        <div class="caption">=Новости=</div>
        <div><a href="{{route('categories')}}" class="menu__link">Категории новостей</a></div>
        <div><a href="{{route('news.add')}}" class="menu__link">Добавить новость</a></div>
    @else
        <div class="caption">={{$category}}=</div>
    @endif
@endsection

@section('content')
    @forelse($arr as $idx => $item)
        <h4>{{$item['title']}}</h4>
        @if( !$item['isPrivate'] or \App\Http\Controllers\LoginController::isLogged() )
            <a href="{{route('news.one', $item['id'])}}">Подробнее...</a><br>
        @endif
    @empty
        <p>Нет новостей</p>
    @endforelse
@endsection
