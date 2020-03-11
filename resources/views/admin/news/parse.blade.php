@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-8 mb-2 text-center w-50">
                <a class="h3 mb-1" href="{{$data['link']}}">{{$data['title']}}</a>
                <div>{{$data['description']}}</div>
                <img src="{{$data['image']}}" class="mt-1" alt="">
            </div>
            @forelse($data['news'] as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                        <a href="{{$item['link']}}">{{$item['title']}}</a><br>
                        <details>
                            {{$item['description']}}
                        </details>
                        <p>{{$item['pubDate']}}</p>
                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
    </div>
@endsection
