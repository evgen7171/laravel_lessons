@extends('layouts.app')

@section('title', 'Админка - добавить новость')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form enctype="multipart/form-data"
                      action=" @if (!$news->id){{ route('admin.news.store') }} @else {{ route('admin.news.update', $news) }}@endif"
                      method="post">
                    @csrf
                    <div class="form-group">
                        <label for="newsTitle">Название новости</label>

                        {!! showErrors($errors, 'title') !!}

                        <input name="title" type="text" class="form-control title" id="newsTitle"
                               value="{{ old('title') ?? $news->title }}">
                    </div>
                    <div class="form-group">
                        <label for="newsCategory">Категория новости</label>

                        {!! showErrors($errors, 'category_id') !!}

                        <select name="category_id" class="form-control" id="newsCategory">
                            @forelse($categories as $item)
                                <option @if ($category and $category->id == $item->id) selected
                                        @endif value="{{ $item->id }}">{{ $item->caption }}</option>
                            @empty
                                <h2>Нет категории</h2>
                            @endforelse
                            <option value="10845">Пустая категория (тест)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="newsText">Текст новости</label>

                        {!! showErrors($errors, 'text') !!}

                        <textarea name="text" class="form-control" rows="5"
                                  id="newsText">{{ old('text') ?? $news->text }}</textarea>
                    </div>




                    @if($news)<img src="{{asset($news->image)}}" alt="">@endif
                    <div class="form-group">
                        <input type="file" name="image">
                    </div>


                    <div class="form-check">
                        <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif name="isPrivate"
                               class="form-check-input" type="checkbox" value="1" id="newsPrivate">
                        <label class="form-check-label" for="newsPrivate">
                            Новость приватная
                        </label>
                    </div>

                    @if ($news->id)
                        @method('PATCH')
                        <input type="submit" class="btn btn-success" value="Изменить"/>
                    @else
                        @method('POST')
                        <input type="submit" class="btn btn-success" value="Добавить"/>
                    @endif
                </form>
            </div>
        </div>
    </div>

@endsection
