@extends('layouts.app')
@section('content')
<div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">Todoリスト</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">
            今日のあなたのTodoを登録しよう
        </p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            @auth
            <a class="btn btn-primary btn-lg px-4 me-sm-3 mr-2" href="{{ route('home') }}">マイページ</a>
            <a class="btn btn-outline-secondary btn-lg px-4" href="{{ route('tasks.index') }}">Todoリスト</a>
            @else
            <a class="btn btn-primary btn-lg px-4 me-sm-3 mr-2" href="{{ route('register') }}">会員登録</a>
            <a class="btn btn-outline-secondary btn-lg px-4" href="{{ route('login') }}">ログイン</a>
            @endauth
        </div>
    </div>
</div>
@endsection()
