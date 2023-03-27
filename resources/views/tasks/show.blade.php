@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">{{ $task->title }}</h2>
        <div class="card-text my-4">{!! nl2br(e($task->body)) !!}</div>
        <div class="small text-muted mb-4">{{ $task->created_at }}</div>
        @can('update', $task)
        <div class="d-flex justify-content-end">
            <form action="{{ route('tasks.updateStatus', $task) }}" method="post" class="mr-2">
                @csrf
                @method('put')
                <input type="hidden" name="status" value="{{ $task->status }}">
                @if($task->status == true)
                    <button type="submit" class="btn btn-success">完了</button>
                @else
                    <button type="submit" class="btn btn-danger">未完了</button>
                @endif
            </form>
            <button class="btn btn-primary mr-2">
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
