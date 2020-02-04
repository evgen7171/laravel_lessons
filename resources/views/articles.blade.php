@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div style="border:1px solid black">=Статьи=</div>
@endsection

@section('content')
    <p>Здесь будут отображены различные статьи...</p>
@endsection
