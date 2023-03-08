<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="/" class="site-title">Todoリスト</a>
        <nav class="tab">
            <ul>
                @if (Auth::check())
                <li><a class="tab-item{{ Request::is('home') ? 'active' : ''}}" href="{{ route('home') }}">マイページ</a></li>
                <li><a class="tab-item{{ Request::is('tasks') ? 'active' : ''}}" href="{{ route('tasks.index') }}">記事検索</a></li>
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
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer>
        &copy; Laravel
    </footer>
</body>
</html>
