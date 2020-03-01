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
                      action=" @if (!$category->id){{ route('admin.addCategory') }} @else {{ route('admin.saveCategory', $category) }}@endif"
                      method="post">
                    @csrf
                    <div class="form-group">
                        <label for="categoryCaption">Название категории</label>
                        <input name="caption" type="text" class="form-control" id="categoryCaption"
                               value="{{ $category->caption ?? old('caption') }}">
                    </div>

                    <div class="form-group">
                        <button class="form-control" type="submit">
                            @if ($category->id) Изменить @else Добавить @endif
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
