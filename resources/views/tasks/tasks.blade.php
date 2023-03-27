@forelse($tasks as $task)
    <tr>
        <td class="align-middle"><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></td>
        <td class="align-middle">
            <div class="align-middle">{{ $task->created_at }}</div>
        </td>
        <td class="align-middle">
            <form action="{{ route('tasks.updateStatus', $task) }}" method="post" class="mr-2">
                @csrf
                @method('put')
                <input type="hidden" name="status" value="{{ $task->status }}">
                @if($task->status == true)
                    <button type="submit" class="w-50 btn btn-success align-middle">完了</button>
                @else
                    <button type="submit" class="w-50 btn btn-danger align-middle">未完了</button>
                @endif
            </form>
        </td>
    </tr>
@empty
    <h2 class="text-center">Todoは登録されていません</h2>
@endforelse
