@forelse($tasks as $task)
    <task class="task-item">
        <div class="task-title"><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></div>
        <div class="task-info">
                {{ $task->created_at }}
            @if($task->status == true)
                <div>完了</div>
            @else
                <div>未完了</div>
            @endif
        </div>
    </task>
    {{ $tasks->links() }}
@empty
    <h2>Todoが登録されていません</h2>
@endforelse
