@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="justify-content-center mb-2 text-center">
            <a class="h3 mb-1" href="{{$data['link']}}">{{$data['title']}}</a>
            <div>{{$data['description']}}</div>
            <img src="{{$data['image']}}" class="mt-1" alt="">
        </div>
        <div class="row">
            @forelse($data['news'] as $item)
                <div class="card col-md-4">
                    @if($item['enclosure::url'])
                        <img src="{{$item['enclosure::url']}}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{$item['title']}}</h5>
                        <p class="card-text">{{$item['description']}}</p>
                        <div class="d-flex justify-content-between mt-2">
                            <div class="font-italic">
                                Опубликовано: {{date('d M Y',strtotime($item['pubDate']))}}
                            </div>
                            <a class="font-weight-bold" href="{{$item['link']}}">Подробнее</a>
                        </div>

                        <form action="{{route('admin.parser.saveNews')}}" method="post">
                            @csrf
                            <p class="text-right mt-3">
                                <input type="hidden" name="parsedLink" value="{{$data['link']}}">
                                <input type="hidden" name="category" value="{{$data['title']}}">
                                <input type="hidden" name="image" value="{{$item['enclosure::url']}}">
                                <input type="hidden" name="title" value="{{$item['title']}}">
                                <input type="hidden" name="description" value="{{$item['description']}}">
                                <input type="hidden" name="pubDate" value="{{$item['pubDate']}}">
                                <input type="hidden" name="link" value="{{$item['link']}}">
                                @if(!isset($saved) or !$saved)
                                    <input type="submit"
                                           class="btn btn-warning"
                                           value="Сохранить новость">
                                @else
                                    <input type="submit"
                                           class="btn btn-danger"
                                           value="Удалить новость">
                                @endif
                            </p>
                        </form>
                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
    </div>
@endsection
