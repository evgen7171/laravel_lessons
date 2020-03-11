<nav class="navbar navbar-expand-md navbar-light shadow-sm menu-bg bg-white menu-bg-admin">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
<<<<<<< HEAD
                    <a class="nav-link" href="{{ route('home') }}"><span
                            class="nav-link-white {{ request()->routeIs('home')?'active':'' }}">Главная</span></a>
                </li>
                <li class="nav-item">
<<<<<<< HEAD
                    <a class="nav-link {{ request()->routeIs('admin.news.create') ? 'active' : '' }}"
                       href="{{ route('admin.news.create') }}">
=======
                    <a class="nav-link {{ request()->routeIs('admin.addNews') ? 'active' : '' }}"
                       href="{{ route('admin.addNews') }}">
=======
                    <a class="nav-link {{ request()->routeIs('') ? 'home' : '' }}" href="{{ route('home') }}">
                        <span class="nav-link-white">Главная</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.addNews') ? 'active' : '' }}" href="{{ route('admin.addNews') }}">
>>>>>>> master
>>>>>>> master
                        <span class="nav-link-white">Добавить новость</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.addCategory') ? 'active' : '' }}"
                       href="{{ route('admin.categories.add') }}">
                        <span class="nav-link-white">Добавить категорию</span></a>
                </li>

<<<<<<< HEAD
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link {{ request()->routeIs('admin.download') ? 'active' : '' }}"--}}
                       {{--href="{{ route('admin.download') }}">--}}
                        {{--<span class="nav-link-white">Скачать данные</span></a>--}}
                {{--</li>--}}
=======
                <li class="nav-item">
<<<<<<< HEAD
                    <a class="nav-link {{ request()->routeIs('admin.download') ? 'active' : '' }}"
                       href="{{ route('admin.download') }}">
=======
                    <a class="nav-link {{ request()->routeIs('admin.addNews2') ? 'active' : '' }}" href="{{ route('admin.addNews2') }}">
                        <span class="nav-link-white">FORM</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.download') ? 'active' : '' }}" href="{{ route('admin.download') }}">
>>>>>>> master
                        <span class="nav-link-white">Скачать данные</span></a>
                </li>
>>>>>>> master
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('admin.news.index') }}"><span
                            class="nav-link-white {{ request()->routeIs('admin.news.index') ? 'active' : '' }}">Новости</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('admin.categories') }}"><span
                                class="nav-link-white {{ request()->routeIs('admin.categories') ? 'active' : '' }}">Категории</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('admin.profiles') }}"><span
                                class="nav-link-white {{ request()->routeIs('admin.profiles') ? 'active' : '' }}">Пользователи</span></a>
                </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
<<<<<<< HEAD
                        <a class="nav-link" href="{{ route('login') }}"><span
                                class="nav-link-white {{ request()->routeIs('login') ? 'active' : '' }}">{{ __('Login') }}</span></a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><span
<<<<<<< HEAD
                                    class="nav-link-white {{ request()->routeIs('register') ? 'active' : '' }}">{{ __('Register') }}</span></a>
=======
                                    class="nav-link-white">{{ __('Register') }}</span></a>
=======
                        <a class="nav-link" href="{{ route('login') }}"><span class="nav-link-white">{{ __('Login') }}</span></a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><span class="nav-link-white">{{ __('Register') }}</span></a>
>>>>>>> master
>>>>>>> master
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
<<<<<<< HEAD
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
<<<<<<< HEAD
                            <span class="nav-link-white active">{{ Auth::user()->name }} <span class="caret"></span></span>
=======
=======
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
>>>>>>> master
                            <span class="nav-link-white">{{ Auth::user()->name }} <span class="caret"></span></span>
>>>>>>> master
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="nav-link-dark">{{ __('Logout') }}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
