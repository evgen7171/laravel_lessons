@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <h2>Профили пользователей</h2>
            <table class="table table-hover h4">
                <thead>
                <tr>
                    <th></th>
                    <th>Имя</th>
                    <th>Эл.почта</th>
                    <th>Привилегии</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td><img class="card-img-top card-img-icon"
                                 src="
                            @if($user->is_admin){{asset('images/default_avatar_admin.png')}}
                                 @else{{asset('images/default_avatar_user.png')}}
                                 @endif" alt="Card image">
                        </td>
                        <td>
                            <div class="p-2">{{$user->name}}</div>
                        </td>
                        <td>
                            <div class="p-2">{{$user->email}}</div>
                        </td>
                        <td>
                            <div class="p-2">@if($user->is_admin){{__('admin')}}@else{{__('user')}}@endif</div>
                        </td>
                        <td>
                            <div class="p-2">
                                <a href="{{route('admin.profile.change',['user'=>$user])}}"
                                   class="btn btn-warning">Изменить</a></div>
                        </td>
                        @if(is_super_admin() and $user->name!='admin')
                            <td>
                                <div class="p-2">
                                    <a href="{{route('admin.profile.delete',['user'=>$user])}}"
                                       class="btn btn-danger">Удалить</a></div>
                            </td>
                        @endif
                    </tr>
                @empty
                    Нет пользователей
                @endforelse
                </tbody>
            </table>
        </div>
@endsection