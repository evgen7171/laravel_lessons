@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include('menu.main')
@endsection

@section('content')

    @include('menu.breadcrumbs')

    <div class="container">
        <div class="accordion" id="accordionExample">
            @forelse($categories as $category)
                <a href="{{route('news.categoryId', $category->id)}}">
                    <h5 class="card-header bg-white">
                        {{$category->caption}}
                    </h5>
                </a>
            @empty
                <h5 class="card-header bg-white">Нет категорий</h5>
            @endforelse
        </div>
    </div>
@endsection
