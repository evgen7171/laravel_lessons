@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    @include('menu.breadcrumbs')
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
                        <div id="collapse_{{$key}}"
                             class="collapse {{!$key?'show':''}}"
                             aria-labelledby="heading_{{$key}}"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                {!! shortText($item->text) !!}<span>...<a
                                            href="{{route('news.one', $item->id)}}">(подробнее)</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card">Нет новостей</div>
            @endforelse
            {{$news->links()}}
        </div>
    </div>

@endsection
