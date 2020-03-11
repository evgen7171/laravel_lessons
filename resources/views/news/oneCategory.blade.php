@extends('layouts.app')

@section('title', 'Новости категории ' . $category->caption)

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
                        <div class="card-header" id="heading_{{$key}}">
                            <h2 class="mb-0">
                                <div class=" {{!$key?'':'collapsed'}}"
                                     type="button"
                                     data-toggle="collapse"
                                     data-target="#collapse_{{$key}}"
                                     aria-expanded="{{!$key?'true':'false'}}"
                                     aria-controls="collapse_{{$key}}">
                                    @include('news.card')
                                </div>
                            </h2>
                        </div>

                        <div id="collapse_{{$key}}"
                             class="collapse {{!$key?'show':''}}"
                             aria-labelledby="heading_{{$key}}"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                {{shortText($item->text)}}<span>...<a
                                            href="{{route('news.one', $item->id)}}">(подробнее)</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card">Нет новостей</div>
            @endforelse
        </div>
        {{$news->links()}}
    </div>
@endsection
