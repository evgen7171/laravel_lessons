@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include('menu.main')
@endsection

@section('content')
    <example-component></example-component>
    <new-component></new-component>
@endsection