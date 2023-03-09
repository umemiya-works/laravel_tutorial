@extends('layouts.app')
@section('content')
<task class="">
    <h1 class="">{{ $task->title }}</h1>
    <div class="">{{ $task->created_at }}</div>
    <div class="">{!! nl2br(e($task->body)) !!}</div>
    @can('update', $task)
    <div class="">
        <form action="{{ route('tasks.update', $task) }}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="status" value="{{ $task->status }}">
            <button type="submit" class="btn btn-primary">完了</button>
        </form>
        <button class="btn btn-secondary">
            <a href="{{ route('tasks.edit', $task) }}">編集</a>
        </button>
        <form onsubmit="return confirm('本当に削除しますか?')" action="{{ route('tasks.destroy', $task) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">削除</button>
        </form>
    </div>
    @endcan
</task>
@endsection()
