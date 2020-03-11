@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse($news as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                        <div class="card-img-icon-large float-left mr-2">
                            <img src="{{asset($item->image)}}" alt="">
                        </div>
                        <h2>{{ $item->title }}</h2>
                        {{--                        <a href="{{ route('admin.news.update', $item) }}"><button type="button" class="btn btn-success">Edit</button></a>--}}
                        {{--                        <a href="{{ route('admin.news.destroy', $item) }}"><button type="button" class="btn btn-danger">Delete</button></a>--}}
                        <div class="form-group-flex">
                            <form action="{{route('admin.news.edit', $item)}}" method="POST" class="mr-2">
                                @method('GET')
                                @csrf
                                <input type="submit" class="btn btn-success" value="Edit"/>
                            </form>
                            <form action="{{route('admin.news.destroy', $item)}}" method="POST" class="mr-2">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete"/>
                            </form>
                            <a href="{{ route('news.one', $item->id) }}">Подробнее...</a>
                        </div>

                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
            {{ $news->links() }}
        </div>
    </div>
@endsection
