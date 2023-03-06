@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('todoes.update', $todo) }}" method="post">
    @method('patch')
    @include('todoes.form')
    <button type="submit">更新する</button>
    <a href="{{ route('todoes.show', $todo) }}">キャンセル</a>
</form>
@endsection()
