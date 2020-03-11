@extends('layouts.app')

@section('title', 'Админка - Пользователь')

@section('menu')
    @include('menu.admin')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form enctype="multipart/form-data"
                      action="{{ route('admin.profile.apply',$user) }}"
                      method="post">
                    @csrf
                    <div class="form-group row-cols-2">
                        <div class="mb-3">
                            {!! showErrors($errors, 'name') !!}
                            {!! Form::label('name', 'Имя пользователя', ['class' => 'control-label']) !!}
                            {!! Form::text('name',old('name')??$user->name, ['class' => 'form-control title', 'value' => $user->name]) !!}
                        </div>
                        <div class="mb-3">
                            {!! showErrors($errors, 'email') !!}
                            {!! Form::label('email', 'Эл.почта', ['class' => 'control-label']) !!}
                            {!! Form::text('email',old('email')??$user->email,['class' => 'form-control title', 'value' => $user->email]) !!}
                        </div>
                        <div class="mb-3">
                            {!! Form::label('is_admin', 'Права доступа', ['class' => 'control-label']) !!}
                            @if($editor->is_admin)
                                {!! Form::select('is_admin', $roles , old('role') ?? array_search($role,$roles), ['class' => 'form-control']) !!}
                            @else
                                {!! Form::select('is_admin', [$role] , old('role') ?? array_search($role,$roles), ['class' => 'form-control']) !!}
                            @endif
                        </div>
                        <div>
                            {!! Form::hidden('unchangePassword', '0', ['id' => 'changePasswordHide']) !!}
                            {!! Form::checkbox('unchangePassword', '1',  '', ['id' => 'changePassword']) !!}
                            {!! Form::label('unchangePassword', 'Не изменять пароль', ['class' => 'control-label']) !!}
                        </div>
                        <div>
                            {!! showErrors($errors, 'password') !!}
                            {!! Form::label('password', 'Текущий пароль', ['class' => 'control-label']) !!}
                            {!! Form::text('password','',['class' => 'form-control title', '']) !!}
                        </div>
                        <div class="mb-3">
                            {!! showErrors($errors, 'confirm') !!}
                            {!! Form::label('confirm', 'Подтверждение пароля', ['class' => 'control-label']) !!}
                            {!! Form::text('confirm','',['class' => 'form-control title', '']) !!}
                        </div>
                        <div class="mb-3">
                            {!! showErrors($errors, 'newPassword') !!}
                            {!! Form::label('newPassword', 'Новый пароль', ['class' => 'control-label']) !!}
                            {!! Form::text('newPassword','',['class' => 'form-control title', '']) !!}
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success" value="Применить"/>
                </form>
            </div>
        </div>
    </div>
@endsection
