@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('tasks.update', $task) }}" method="post">
    @method('patch')
    @include('tasks.form')
    <button type="submit">更新する</button>
    <a href="{{ route('tasks.show', $task) }}">キャンセル</a>
</form>
@endsection()
