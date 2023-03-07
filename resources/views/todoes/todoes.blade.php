@if($todoes != "")
    @foreach ($todoes as $todo)
    <todo class="todo-item">
        <div class="todo-title"><a href="{{ route('todoes.show', $todo) }}">{{ optional($todo)->title }}</a></div>
        <div class="todo-info">
            {{ optional($todo)->created_at }}
        </div>
    </todo>
    @endforeach
@endif
