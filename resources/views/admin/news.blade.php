@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Админка</h2>
            @forelse($news as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                        <h2>{{ $item->title }}</h2>

                        <a href="{{ route('admin.updateNews', $item) }}"><button type="button" class="btn btn-success">Edit</button></a>
                        <a href="{{ route('admin.deleteNews', $item) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                        <a href="{{ route('news.one', $item->id) }}">Подробнее...</a>

                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
            {{ $news->links() }}
        </div>
    </div>
@endsection
