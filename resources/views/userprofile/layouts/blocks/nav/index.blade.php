<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container"><a href="/" class="navbar-brand"><img src="{{asset('img/logo.svg')}}" alt="" class="img-fluid"></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">Menu<i class="fa fa-bars ml-2"></i></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"> <a href="/" class="nav-link active">Главная</a></li>
                    <li class="nav-item"> <a href="/" class="nav-link">Работы</a></li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown"><a id="pages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{Auth::user()->name}}</a>
                            <div class="dropdown-menu">
                                <a href="{{ url('/userprofile') }}" class="dropdown-item">Мой профиль</a>
                                @if(Auth::user()->role->id == 3)
                                    <a href="{{ url('/dashboard') }}" class="dropdown-item">Админ панель</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        </ul><a href="{{ url('/login') }}" class="btn btn-primary navbar-btn ml-0 ml-lg-3">Войти</a>
                        @if (Route::has('register'))
                            </ul><a href="{{ route('register') }}" class="btn btn-primary navbar-btn ml-0 ml-lg-3">Зарегистрироваться</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>