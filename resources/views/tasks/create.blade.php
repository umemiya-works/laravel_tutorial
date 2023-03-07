@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('tasks.store') }}" method="post">
    @include('tasks.form')
    <button type="submit">投稿する</button>
    <a href="{{ route('tasks.index') }}">キャンセル</a>
</form>
@endsection()
