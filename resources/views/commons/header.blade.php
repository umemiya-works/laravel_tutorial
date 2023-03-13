<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">Todoリスト</a>
<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    @if (Auth::check())
    <li><a class="nav-link px-2 link-secondary" href="{{ route('home') }}">マイページ</a></li>
    <li class="nav-link px-2 link-secondary">
        <a href="{{ route('tasks.index') }}">Todo一覧
        </a>
    </li>
    <li class="nav-link px-2 link-secondary">
        <form onSubmit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post" name="logout">
            @csrf
            <a href="#" onclick="document.logout.submit();">ログアウト</a>
        </form>
    </li>
    @else
        <li><a class="nav-link px-2 link-secondary" href="{{ route('login') }}">ログイン</a></li>
        <li><a class="nav-link px-2 link-secondary" href="{{ route('register') }}">会員登録</a></li>
    @endif
</ul>
