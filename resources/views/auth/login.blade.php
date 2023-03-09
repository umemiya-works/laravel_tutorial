@extends('layouts.app')
@section('content')
<div class="text-center">
    <main class="form-signin w-100 m-auto">
        @include('commons.errors')
        <form action="{{ route('login') }}" method="post">
            @csrf
            <h1 class="h3 mb-4 fw-normal">ログイン</h1>
            <div class="form-floating mb-2">
                <label>メールアドレス</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                <label>パスワード</label>
                <input class="form-control" type="password" name="password"></input>
            </div>
            <div class="checkbox mb-2">
                <label><input type="checkbox" value="remember-me">ログインしたままにする</label>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="w-24 btn btn-lg btn-primary" type="submit">ログイン</button>
                <a class="w-24 btn btn-lg btn-danger" href="/">キャンセル</a>
            </div>
        </form>
    </main>
</div>
@endsection
