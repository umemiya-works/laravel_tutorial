@if($task != "")
    <task class="task-item">
        <div class="task-title"><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></div>
        <div class="task-info">
            {{ $task->created_at }}
        </div>
    </task>
@else
    <h2>未完了のタスクはありません</h2>
@endif
