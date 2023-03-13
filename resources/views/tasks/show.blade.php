@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">{{ $task->title }}</h2>
        <div class="card-text my-4">{!! nl2br(e($task->body)) !!}</div>
        <div class="small text-muted mb-4">{{ $task->created_at }}</div>
        @can('update', $task)
        <div class="d-flex justify-content-end">
            <form action="{{ route('tasks.update', $task) }}" method="post" class="mr-2">
                @csrf
                @method('put')
                <input type="hidden" name="status" value="{{ $task->status }}">
                <button type="submit" class="btn btn-primary">完了</button>
            </form>
            <button class="btn btn-success mr-2">
                <a href="{{ route('tasks.edit', $task) }}" class="text-white">編集</a>
            </button>
            <form onsubmit="return confirm('本当に削除しますか?')" action="{{ route('tasks.destroy', $task) }}" method="post" class="mr-2">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>
        @endcan
    </div>
</div>
@endsection()
