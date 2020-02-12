@extends('layouts.main')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div style="border:1px solid black">=Новости=</div>
@endsection

@section('content')
    <?php foreach($arr as $item):?>
    <a href="/news/{{$item['id']}}"><?=$item['title']?></a><br>
    <?php endforeach;?>
@endsection
