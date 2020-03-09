@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        @forelse($users as $user)
            <div class="card card-header table">
                <div>{{$user->name}}</div>
                <div>{{$user->email}}</div>
                <div>{{$user->password}}</div>
                <div>
                    {{$user->role}}
                    <a href="{{route('admin.user.change',['user'=>$user])}}"
                       class="btn btn-warning"><span>Изменить</span></a>
                </div>
            </div>
        @empty
            Нет пользователей
        @endforelse
    </div>
@endsection