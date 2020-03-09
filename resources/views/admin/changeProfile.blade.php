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
                      action="{{ route('admin.user.apply',$user) }}"
                      method="post">
                    @csrf
                    <div class="form-group row-cols-2">
                        <div class="mb-3">
                            {!! Form::label('name', 'Имя пользователя', ['class' => 'control-label']) !!}
                            {!! Form::text('name',old('name')??$user->name, ['class' => 'form-control title', 'value' => $user->name]) !!}
                        </div>
                        <div class="mb-3">
                            {!! Form::label('email', 'Эл.почта', ['class' => 'control-label']) !!}
                            {!! Form::text('email',old('email')??$user->email,['class' => 'form-control title', 'value' => $user->email]) !!}
                        </div>

                        {{--<div class="mb-3">--}}
                        {{--<label>--}}
                        {{--{!! Form::checkbox('changePassword', '',  null, ['id' => 'changePassword'])!!} Изменить--}}
                        {{--пароль--}}
                        {{--</label>--}}
                        {{--{!! Form::text('password','',['class' => 'form-control title', 'value' => '', 'readonly'=>true]) !!}--}}
                        {{--</div>--}}
                        <div class="mb-3">
                            {!! Form::label('password', 'Старый пароль', ['class' => 'control-label']) !!}
                            {!! Form::text('password','',['class' => 'form-control title', '']) !!}
                        </div>
                        <div class="mb-3">
                            {!! Form::label('confirm', 'Новый пароль', ['class' => 'control-label']) !!}
                            {!! Form::text('confirm','',['class' => 'form-control title', '']) !!}
                        </div>


                        <div class="mb-3">
                            {!! Form::label('role', 'Права доступа', ['class' => 'control-label']) !!}
                            {!! Form::select('role', $roles , $user->role , ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success" value="Применить"/>
                </form>
            </div>
        </div>
    </div>

@endsection
