@extends('layouts.app')
@section('content')
<h1 class="text-center mb-4">Todo検索</h1>
<form method="get" action="{{ route('tasks.index') }}" class="mb-4">
    <div class="input-group max-width">
        <input type="search" placeholder="検索ワードを入力" name="search" value="@if (isset($search)) {{ $search }} @endif" class="form-control">
        <button type="button" class="btn btn-outline-success">検索</button>
        <button type="button" class="btn btn-outline-info">
            <a href="{{ route('tasks.index') }}">
                クリア
            </a>
        </button>
    </div>
</form>
<div class="container">
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">やること</th>
                <th scope="col">登録日</th>
                <th scope="col">状態</th>
            </tr>
        </thead>
        <tbody>
        @include('tasks.tasks')
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $tasks->links() }}
    </div>
</div>
@endsection()
