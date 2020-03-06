@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    @include('menu.breadcrumbs')
<<<<<<< HEAD
    <div class="container">
        <div class="accordion" id="accordionExample">
            @forelse($news as $key=>$item)
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header h-100" id="heading_{{$key}}">
                            <div class=" {{!$key?'':'collapsed'}} h-100"
                                 type="button"
                                 data-toggle="collapse"
                                 data-target="#collapse_{{$key}}"
                                 aria-expanded="{{!$key?'true':'false'}}"
                                 aria-controls="collapse_{{$key}}">
                                @include('news.card')
                            </div>
                        </div>
=======

    <div class="container">
        <div class="accordion" id="accordionExample">

            @forelse($news as $key=>$item)
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="heading_{{$key}}">
                            <h2 class="mb-0">
                                <div class=" {{!$key?'':'collapsed'}}"
                                     type="button"
                                     data-toggle="collapse"
                                     data-target="#collapse_{{$key}}"
                                     aria-expanded="{{!$key?'true':'false'}}"
                                     aria-controls="collapse_{{$key}}">
                                    <img src="{{asset($item->image)}}" alt="">
                                    {!! textLink( $item->title, !$item->isPrivate?route('news.one', ['id'=>$item->id]):'#' ) !!}
                                </div>
                            </h2>
                        </div>

>>>>>>> master
                        <div id="collapse_{{$key}}"
                             class="collapse {{!$key?'show':''}}"
                             aria-labelledby="heading_{{$key}}"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                {{shortText($item->text)}}<span>...<a
<<<<<<< HEAD
                                        href="{{route('news.one', $item->id)}}">(подробнее)</a></span>
=======
                                            href="{{route('news.one', ['id'=>$item->id])}}">(подробнее)</a></span>
>>>>>>> master
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card">Нет новостей</div>
            @endforelse
<<<<<<< HEAD
            {{$news->links()}}
=======
>>>>>>> master
        </div>
    </div>

@endsection
