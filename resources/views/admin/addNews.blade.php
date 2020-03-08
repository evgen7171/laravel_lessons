@extends('layouts.app')

@section('title', 'Админка - добавить новость')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
<<<<<<< HEAD
                <form enctype="multipart/form-data"
                      action=" @if (!$news->id){{ route('admin.news.store') }} @else {{ route('admin.news.update', $news) }}@endif"
                      method="post">
=======
<<<<<<< HEAD
                <form enctype="multipart/form-data" action=" @if (!$news->id){{ route('admin.addNews') }} @else {{ route('admin.saveNews', $news) }}@endif" method="post">
=======
                <form action="{{ route('admin.addNews') }}" method="post" accept-charset="UTF-8"
                      enctype="multipart/form-data">
>>>>>>> master
>>>>>>> master
                    @csrf
                    <div class="form-group">
                        <label for="newsTitle">Название новости</label>
                        @if ($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('title') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <input name="title" type="text" class="form-control title" id="newsTitle"
                               value="{{ $news->title ?? old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="newsCategory">Категория новости</label>
                        @if ($errors->has('category_id'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('category_id') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <select name="category_id" class="form-control" id="newsCategory">
                            @forelse($categories as $item)
<<<<<<< HEAD
                                <option @if ($category and $category->id == $item->id) selected
                                        @endif value="{{ $item->id }}">{{ $item->caption }}</option>
=======
<<<<<<< HEAD
                                <option @if ($category and $category->id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->caption }}</option>
=======
<<<<<<< HEAD
                                <option @if ($category->caption == $item->caption) selected @endif value="{{ $item->caption }}">{{ $item->caption }}</option>
=======
                                <option @if ($item == old('category')) selected
                                        @endif value="{{ $item }}">{{ $item }}</option>
>>>>>>> master
>>>>>>> master
>>>>>>> master
                            @empty
                                <h2>Нет категории</h2>
                            @endforelse
                            <option value="10845">Пустая категория (тест)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="newsText">Текст новости</label>
                        @if ($errors->has('text'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('text') as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <textarea name="text" class="form-control" rows="5"
                                  id="newsText">{{ $news->text ?? old('text') }}</textarea>
                    </div>
                    @if ($errors->has('image'))
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->get('image') as $error)
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                    @if($news)<img src="{{asset($news->image)}}" alt="">@endif
                    <div class="form-group">
                        <input type="file" name="image">
                    </div>
<<<<<<< HEAD


                    <div class="form-check">
<<<<<<< HEAD
                        <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif name="isPrivate"
                               class="form-check-input" type="checkbox" value="1" id="newsPrivate">
=======
                        <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif name="isPrivate" class="form-check-input" type="checkbox" value="1" id="newsPrivate">
=======
                    <div class="form-group">
                        <input type="file" name="image" id="file_id">
                    </div>
                    <div class="form-check">
                        <input @if (old('isPrivate') == 1) checked @endif name="isPrivate" class="form-check-input"
                               type="checkbox" value="1" id="newsPrivate">
>>>>>>> master
>>>>>>> master
                        <label class="form-check-label" for="newsPrivate">
                            Новость приватная
                        </label>
                    </div>

<<<<<<< HEAD
                    @if ($news->id)
                        @method('PATCH')
                        <input type="submit" class="btn btn-success" value="Изменить"/>
                    @else
                        @method('POST')
                        <input type="submit" class="btn btn-success" value="Добавить"/>
                    @endif
=======
<<<<<<< HEAD
                    <div class="form-group">
                        <button class="form-control" type="submit">
                            @if ($news->id) Изменить @else Добавить @endif
                        </button>

=======
                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-outline-primary" value="Добавить новость" id="addNews">
>>>>>>> master
                    </div>

>>>>>>> master
                </form>
            </div>
        </div>
    </div>

@endsection
