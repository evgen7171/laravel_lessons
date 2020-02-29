@extends('layouts.app')

@section('title', 'Новости категории ' . $category)

@section('menu')
    @include('menu.main')
@endsection

@section('content')

    @include('menu.breadcrumbs')

{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                @forelse($news as $item)--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2>{{ $item['title'] }}</h2>--}}
{{--                            @if (!$item['isPrivate'])--}}
{{--                                <a href="{{ route('news.one', $item['id']) }}">Подробнее...</a>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @empty--}}
{{--                    <p>Нет новостей</p>--}}
{{--                @endforelse--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="container">
        <div class="accordion" id="accordionExample">

            @forelse($news as $key=>$item)
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="heading_{{$key}}">
                            <h2 class="mb-0">
                                <div class=" {{$key==1?'':'collapsed'}}"
                                     type="button"
                                     data-toggle="collapse"
                                     data-target="#collapse_{{$key}}"
                                     aria-expanded="{{$key==1?'true':'false'}}"
                                     aria-controls="collapse_{{$key}}">
                                    {!! textLink( $item['title'], !$item['isPrivate']?route('news.one', ['id'=>$item['id']]):'#' ) !!}
                                </div>
                            </h2>
                        </div>

                        <div id="collapse_{{$key}}"
                             class="collapse {{$key==1?'show':''}}"
                             aria-labelledby="heading_{{$key}}"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                {{shortText($item['text'])}}<span>...<a href="{{route('news.one', ['id'=>$item['id']])}}">(подробнее)</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card">Нет новостей</div>
            @endforelse
        </div>
    </div>
@endsection
