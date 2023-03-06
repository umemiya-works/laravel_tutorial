@extends('layouts.app')
@section('content')
<todo class="todo-detail">
    <h1 class="todo-title">{{ $todo->title }}</h1>
    <div class="todo-info">{{ $todo->created_at }}</div>
    <div class="todo-body">{!! nl2br(e($todo->body)) !!}</div>
</todo>
@endsection()
