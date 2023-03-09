@if($task != "")
    <task class="">
        <div class=""><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></div>
        <div class="">
            {{ $task->created_at }}
        </div>
    </task>
@else
    <h2>未完了のタスクはありません</h2>
@endif
