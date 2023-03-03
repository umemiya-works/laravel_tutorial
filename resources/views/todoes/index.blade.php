@extends('layouts.app')
@section('content')
<p><a href="{{ route('todoes.create') }}">Todoを作成する</a></p>
@foreach ($todoes as $todo)
<todo class="todo-item">
    <div class="todo-title">{{ $todo->title }}</div>
    <div class="todo-body">{{ $todo->body }}</div>
</todo>
@endforeach
@endsection()
