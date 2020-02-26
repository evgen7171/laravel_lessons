@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="form-group">
            <div class="row justify-content-center">
                <form class="col-md-6" action="{{route('admin.download')}}" method="post">
                    @csrf
                    <div>
                        <label class="font-weight-bold">Выберите новость, которую хотите скачать</label>
                        <select name="news" id="news" class="form-control">
                            @foreach($news as $item)
                                <option @if ($item == old('news')) selected
                                        @endif value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <input type="submit" class="mt-2" name='button' value="Скачать новость">
                    </div>
                    <div>
                        <label class="font-weight-bold mt-3">Выберите файл, который хотите скачать</label>
                        <select name="file" id="file" class="form-control">
                            @foreach($files as $item)
                                <option @if ($item == old('file')) selected
                                        @endif value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <input type="submit" class="mt-2" name="button" value="Скачать файл">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
