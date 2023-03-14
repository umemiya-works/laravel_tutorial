@forelse($tasks as $task)
    <tr>
        <td class="align-middle"><a href="{{ route('tasks.show', $task) }}" class="">{{ $task->title }}</a></td>
        <td class="align-middle">
            <div class="align-middle">{{ $task->created_at }}</div>
        </td>
        <td class="align-middle">
            @if($task->status == true)
                <div class="w-50 btn btn-success align-middle">完了</div>
            @else
                <div class="w-50 btn btn-danger align-middle">未完了</div>
            @endif
        </td>
    </tr>
@empty
    <h2>Todoが登録されていません</h2>
@endforelse
