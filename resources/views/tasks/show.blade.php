@extends('layouts.app')
@section('content')
<task class="task-detail">
    <h1 class="task-title">{{ $task->title }}</h1>
    <div class="task-info">{{ $task->created_at }}</div>
    <div class="task-body">{!! nl2br(e($task->body)) !!}</div>
    @can('update', $task)
    <div class="task-control">
        <form action="{{ route('tasks.update', $task) }}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="status" value="{{ $task->status }}">
            <button type="submit">完了</button>
        </form>
        <a href="{{ route('tasks.edit', $task) }}">編集</a>
        <form onsubmit="return confirm('本当に削除しますか?')" action="{{ route('tasks.destroy', $task) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">削除</button>
        </form>
    </div>
    @endcan
</task>
@endsection()
