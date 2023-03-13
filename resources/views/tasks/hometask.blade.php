@if($task != "")
    <div class="card">
        <h6 class="card-header">最新の未完了Todo</h6>
        <div class="card-body">
            <div class="card-title"><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></div>
            <div class="card-text">{{ $task->body }}</div>
        </div>
        <div class="card-footer">{{ $task->created_at }}</div>
    </div>
@else
    <h2>未完了のタスクはありません</h2>
@endif
