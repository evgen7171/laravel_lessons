<nav class="navbar navbar-expand-md navbar-light shadow-sm menu-bg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"><span class="nav-link-white {{ request()->routeIs('home')?'active':'' }}">Главная</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.all') }}"><span class="nav-link-white {{ request()->routeIs('news.all')?'active':'' }}">Новости</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('news.categories') }}"><span class="nav-link-white {{ request()->routeIs('news.categories') ? 'active' : '' }}">Категории</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('admin.admin') }}"><span class="nav-link-white {{ request()->routeIs('admin.admin') ? 'active' : '' }}">Админка</span></a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><span class="nav-link-white {{ request()->routeIs('login') ? 'active' : '' }}">{{ __('Login') }}</span></a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><span class="nav-link-white {{ request()->routeIs('register') ? 'active' : '' }}">{{ __('Register') }}</span></a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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


