@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div style="border:1px solid black">={{$oneNews['title']}}=</div>
@endsection

@section('content')
    {{$oneNews['text']}}
@endsection
