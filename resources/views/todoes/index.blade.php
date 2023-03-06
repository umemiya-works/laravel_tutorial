@extends('layouts.app')
@section('content')
<p><a href="{{ route('todoes.create') }}">Todoを作成する</a></p>
@foreach ($todoes as $todo)
<todo class="todo-item">
    <div class="todo-title">
        <a href="{{ route('todoes.show', $todo) }}">{{ $todo->title }}</a>
    </div>
    <div class="todo-info">{{ $todo->created_at }}</div>
</todo>
@endforeach
@endsection()
