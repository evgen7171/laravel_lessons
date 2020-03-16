@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{route('admin.parser')}}" method="post">
                @csrf
                {!! Form::select('link', array_column($links,'name') , null , ['class' => 'form-control mb-3']) !!}
                {!! Form::submit('Парсить', ['class' => 'form-control']) !!}
            </form>
        </div>
    </div>
@endsection
