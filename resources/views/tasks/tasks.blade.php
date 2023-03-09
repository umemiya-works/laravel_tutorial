@forelse($tasks as $task)
    <tr>
        <td class=""><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></td>
        <td class="">
            {{ $task->created_at }}
        </td>
        <td class="">
            @if($task->status == true)
                <div class="btn btn-info">完了</div>
            @else
                <div class="btn btn-primary">未完了</div>
            @endif
        </td>
    </tr>
@empty
    <h2>Todoが登録されていません</h2>
@endforelse
