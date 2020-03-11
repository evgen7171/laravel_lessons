@extends('layouts.app')

@section('title', '>> News Block >')

@section('menu')
    @if(is_admin())
        @include('menu.admin')
    @else
        @include('menu.main')
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(!is_admin())
                        <div class="card-header">Добро пожаловать на сайт NewsBlock !</div>
                    @else
                        <div class="card-header">Добро пожаловать в Админку NewsBlock!</div>
                    @endif

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                @forelse($images as $key=>$image)
                                    <div class="carousel-item {{!$key?'active':''}}">
<<<<<<< HEAD
                                        <img src="{{asset($image)}}"
                                             class="d-block w-100" alt="...">
=======
                                        <img src="{{public_path('storage/images/home/image1.jpg')}}" class="d-block w-100" alt="...">
>>>>>>> master
                                    </div>
                                @empty
                                    Нет изображений
                                @endforelse
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{route('telegram')}}" class="mt-3" method="post">
                    @csrf
                    <input type="submit" value="telegram">
                </form>
            </div>
        </div>
    </div>
@endsection


