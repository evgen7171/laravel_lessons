@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    @if(!isset($category))
        <div style="border:1px solid black">=Новости=</div>
    @else
        <div style="border:1px solid black">={{$category}}=</div>
    @endif
@endsection

@section('content')
    @foreach($arr as $item)
        <a href="/news/{{$item['id']}}">{{$item['title']}}</a><br>
    @endforeach
@endsection
