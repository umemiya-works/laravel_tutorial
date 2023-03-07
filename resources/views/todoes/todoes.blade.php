@foreach ($todoes as $todo)
<todo class="todo-item">
    <div class="todo-title"><a href="{{ route('todoes.show', $todo) }}">{{ $todo->title }}</a></div>
    <div class="todo-info">
        {{ $todo->created_at }} | {{ $todo->user->name }}
    </div>
</todo>
@endforeach
{{ $todoes->links() }}
