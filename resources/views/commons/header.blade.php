<nav class="site-navbar navbar-dark bg-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-xl-2">
                <h2 class="mb-0 site-logo">
                    <a href="/" class="text-blue-400 mb-0">Todoリスト</a>
                </h2>
            </div>

            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right">
                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                        @if (Auth::check())
                        <li>
                            <a href="{{ route('home') }}"><span>マイページ</span></a>
                        </li>
                        <li>
                            <a href="{{ route('tasks.index') }}"><span>Todo検索</span></a>
                        </li>
                        <li>
                            <form on-submit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">ログアウト</button>
                            </form>
                        </li>
                        @else
                        <li><a href="{{ route('login') }}"></a></li>
                        <li><a href="{{ route('register') }}">会員登録</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</nav>
