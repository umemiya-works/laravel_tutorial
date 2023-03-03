@extends('layouts.app')
@section('content')
<form action="{{ route('todoes.store') }}" method="post">
    @include('todoes.form')
    <button type="submit">投稿する</button>
    <a href="{{ route('todoes.index') }}">キャンセル</a>
</form>
@endsection()
