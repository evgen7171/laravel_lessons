@extends('layouts.app')

@section('title', 'Админка - добавить новость')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    <div class="form-group">
                        {{ Form::label('newsTitle', 'Добавить новость') }}
                        {{ Form::text('title', 'Заголовок', ['class' => 'form-control', 'id'=>'newsTitle']) }}
                    </div>
                    <div class="form-group">
                        <label for="newsCategory">Категория новости</label>
                        {{ Form::select('category', $categories, '1', ['class' => 'form-control', 'id'=>'newsTitle']) }}

                    </div>

                    <div class="form-group">
                        <label for="newsText">Текст новости</label>
                        <textarea class="form-control" rows="5" id="newsText"></textarea>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="newsPrivate">
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
