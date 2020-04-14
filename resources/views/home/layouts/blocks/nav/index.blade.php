<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container"><a href="/" class="navbar-brand"><img src="{{asset('img/logo.svg')}}" alt="" class="img-fluid"></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">Menu<i class="fa fa-bars ml-2"></i></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"> <a href="/" class="nav-link">Главная</a></li>
                    <li class="nav-item"> <a href="{{route('works')}}" class="nav-link">Работы</a></li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown"><a id="pages" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{Auth::user()->name}}</a>
                            <div class="dropdown-menu">
                                <a href="{{ url('/userprofile') }}" class="dropdown-item">Мой профиль</a>
                                @if(Auth::user()->role->id == 1)
                                    <a href="{{ url('/dashboard/home') }}" class="dropdown-item">Админ панель</a>
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

@if (Route::has('login'))
    @guest
        <section class="hero">
            <div class="container mb-5">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="divider-heading">Создайте портфолио <br> за считанные минуты</h2>
                        <div class="row">
                            <div class="col-lg-10">
                                <p class="lead divider-subtitle mt-2 text-muted">Простая платформа для создания портфолио.Ориентирована на дизайнеров, фотографов и илюстраторов</p>
                            </div>
                        </div><a href="{{route('register')}}" class="btn btn-primary">Зарегистрироваться</a>
                    </div>
                    <div class="col-lg-6"><img src="{{asset('/img/objects.e4497cfa.svg')}}" alt="..." class="hero-image img-fluid d-none d-lg-block"></div>
                </div>
            </div>
        </section>
    @endguest
@endif