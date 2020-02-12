@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div style="border:1px solid black">=Категории новостей=</div>
@endsection

@section('content')
    @foreach($categories as $category)
        <a href="/news/categories/{{$category['name']}}">{{$category['caption']}}</a><br>
    @endforeach
@endsection
