@if ($tasks != "")
    @foreach($tasks as $task)
    <task class="task-item">
        <div class="task-title"><a href="{{ route('tasks.show', $task) }}">{{ optional($task)->title }}</a></div>
        <div class="task-info">
            {{ optional($task)->created_at }}
        </div>
    </task>
    @endforeach
@endif
