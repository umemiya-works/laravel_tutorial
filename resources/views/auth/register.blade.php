@extends('layouts.app')
@section('content')
<div class="text-center">
    <main class="w-100 m-auto">
        @include('commons.errors')
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="h3 mb-4 fw-normal">会員登録</h1>
            <div class="form-floating mb-4">
                <label>名前</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                <label>メールアドレス</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}"></input>
                <label>パスワード</label>
                <input class="form-control" type="password" name="password"></input>
                <label>パスワード(確認用)</label>
                <input class="form-control" type="password" name="password_confirmation" placeholder="もう一度入力"></input>
            </div>
            <div class="mx-auto">
                <button class="w-16 btn btn-lg btn-primary" type="submit">登録する</button>
                <a class="w-16 btn btn-lg btn-danger" href="/">キャンセル</a>
            </div>
        </form>
    </main>
@endsection
