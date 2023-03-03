<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
    <header>
        <div class="site-title">Todoリスト</div>
    </header>
    <main class="container">
        <p><a href="{{ route('todoes.create') }}">Todoを作成する</a></p>
        @foreach ($todoes as $todo)
        <todo class="todo-item">
            <div class="todo-title">{{ $todo->title }}</div>
            <div class="todo-body">{{ $todo->body }}</div>
        </todo>
        @endforeach
    </main>
    <footer>
        &copy; Laravel
    </footer>
</body>
</html>
