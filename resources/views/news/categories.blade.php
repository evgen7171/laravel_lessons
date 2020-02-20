@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div class="caption">=Категории новостей=</div>
@endsection

@section('content')
    @forelse($categories as $category)
        <a href="/news/categories/{{$category['name']}}">{{$category['caption']}}</a><br>
    @empty
        <p>Нет категорий</p>
    @endforelse
@endsection
