@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-md-12">
                {!! Form::select('name', $news , null , ['class' => 'form-control']) !!}
                {!! Form::submit('Загрузить', ['class' => 'form-control']) !!}
            </form>
        </div>
    </div>
@endsection
