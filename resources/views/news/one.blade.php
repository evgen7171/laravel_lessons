@extends('layouts.app')

@section('title', 'Одна новость')

@section('menu')
    @include('menu.main')
@endsection

@section('content')

    @include('menu.breadcrumbs')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $news->title }}</div>
                    <div class="card-body">
<<<<<<< HEAD
                        @if (!$news->isPrivate || Auth::id())
=======
                        @if (!$news->isPrivate)
<<<<<<< HEAD
>>>>>>> 0147a26da9ff9554c65dbc8412676ff47c4046a5
                            <img src="{{asset($news->image)}}" alt="" class="card-img mb-2">
                            <p>{{ $news->text }}</p>
                        @else
<<<<<<< HEAD
                            @include('news.noRights')
=======
                            @include('news.noRules')
=======
                            <p>{{ $news->text }}</p>
                        @else
                            <br>Нет прав!
>>>>>>> master
>>>>>>> master
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

