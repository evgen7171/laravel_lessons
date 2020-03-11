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
                    <div class="card mb-2">
                        <div class="form-group-flex card-img-link">
                            <div class="card-img-icon m-2">
                                <img src="{{asset($category->image)}}" alt="">
                            </div>
                            <h5 class="card-text bg-white ml-2">
                                {{$category->caption}}
                            </h5>
                        </div>
                    </div>
                </a>
            @empty
                <h5 class="card-header bg-white">Нет категорий</h5>
            @endforelse
        </div>
    </div>
@endsection
