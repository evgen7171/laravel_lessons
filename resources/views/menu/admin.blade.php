<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm menu-bg menu-bg-admin">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"><span
                            class="nav-link-white {{ request()->routeIs('home')?'active':'' }}">Главная</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.news.create') ? 'active' : '' }}"
                       href="{{ route('admin.news.create') }}">
                        <span class="nav-link-white">Добавить новость</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.addCategory') ? 'active' : '' }}"
                       href="{{ route('admin.addCategory') }}">
                        <span class="nav-link-white">Добавить категорию</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.download') ? 'active' : '' }}"
                       href="{{ route('admin.download') }}">
                        <span class="nav-link-white">Скачать данные</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('admin.news.index') }}"><span
                            class="nav-link-white {{ request()->routeIs('admin.news.index') ? 'active' : '' }}">Админка (новости)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('admin.categories') }}"><span
                            class="nav-link-white {{ request()->routeIs('admin.categories') ? 'active' : '' }}">Админка (категории)</span></a>
                </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><span
                                class="nav-link-white">{{ __('Login') }}</span></a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><span
                                    class="nav-link-white">{{ __('Register') }}</span></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="nav-link-white">{{ Auth::user()->name }} <span class="caret"></span></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="nav-link-white">{{ __('Logout') }}</span>
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
