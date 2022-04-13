<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="text-muted" href="#">Subscribe</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="#">Large</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                </a>

                @guest
                    @if (Route::has('login'))
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a id="navbarDropdown" class="btn btn-sm btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="{{ route('main') }}">Главная - все статьи</a>
            @auth()
                <a class="p-2 text-muted" href="{{ route('articles.index') }}">Мои статьи</a>
                <a class="p-2 text-muted" href="{{ route('articles.create') }}">Создать статью</a>
            @endauth
            <a class="p-2 text-muted" href="{{ route('tidings.index') }}">Новости</a>
            <a class="p-2 text-muted" href="{{ route('about') }}">О нас</a>
            <a class="p-2 text-muted" href="{{ route('contacts') }}">Контакты</a>
            <a class="p-2 text-muted" href="{{ route('statistics') }}">Статистика</a>
            @admin
                <a class="p-2 text-muted" href="{{ route('admin') }}">Административный раздел</a>
                <a class="p-2 text-muted" href="{{ route('tidings.create') }}">Создать новость</a>
            @endadmin
        </nav>
    </div>
</div>
