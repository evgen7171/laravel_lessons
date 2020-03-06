@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>Админка</h2>
            @forelse($categories as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                        <h2>{{ $item->caption }}</h2>

                        <a href="{{ route('admin.updateCategory', $item) }}"><button type="button" class="btn btn-success">Edit</button></a>
                        <a href="{{ route('admin.deleteCategory', $item) }}"><button type="button" class="btn btn-danger">Delete</button></a>

                    </div>
                </div>
            @empty
                <p>Нет новостей</p>
            @endforelse
            {{ $categories->links() }}
        </div>
    </div>
@endsection
