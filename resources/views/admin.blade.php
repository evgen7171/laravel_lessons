@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div style="border:1px solid black">=Главная=</div>
@endsection

@section('content')
    {{--<p>{{$content}}</p>--}}
@endsection
