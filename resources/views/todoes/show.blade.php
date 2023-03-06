@extends('layouts.app')
@section('content')
<todo class="todo-detail">
    <h1 class="todo-title">{{ $todo->title }}</h1>
    <div class="todo-info">{{ $todo->created_at }}</div>
    <div class="todo-body">{!! nl2br(e($todo->body)) !!}</div>
    <div class="todo-control">
        <a href="{{ route('todoes.edit', $todo) }}">編集</a>
        <form action="{{ route('todoes.destroy', $todo) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">削除</button>
        </form>
    </div>
</todo>
@endsection()
