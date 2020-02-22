@extends('layouts.app')

@section('title', 'Админка - добавить новость')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('admin.addNews') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="newsTitle">Название новости</label>
                        <input name="title" type="text" class="form-control" id="newsTitle" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="newsCategory">Категория новости</label>
                        <select name="category" class="form-control" id="newsCategory">
                            @forelse($categories as $item)
                                <option @if ($item['id'] == old('category')) selected @endif value="{{ $item['id'] }}">{{ $item['category'] }}</option>
                            @empty
                                <h2>Нет категории</h2>
                            @endforelse
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="newsText">Текст новости</label>
                        <textarea name="text" class="form-control" rows="5" id="newsText">{{ old('text') }}</textarea>
                    </div>

                    <div class="form-check">
                        <input @if (old('isPrivate') == 1) checked @endif name="isPrivate" class="form-check-input" type="checkbox" value="1" id="newsPrivate">
                        <label class="form-check-label" for="newsPrivate">
                            Новость private?
                        </label>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-primary" value="Добавить новость" id="addNews">
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
