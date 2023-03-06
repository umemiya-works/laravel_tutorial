@extends('layouts.app')
@section('content')
@include('commons.errors')
<div class="container">
<h1>マイページ</h1>
<p>ようこそ、{{ Auth::user()->name }}さん | <a href="{{ route('todoes.create') }}">記事を書く</a></p>
@include('todoes.todoes')
@endsection()
