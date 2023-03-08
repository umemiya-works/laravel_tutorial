@extends('layouts.app')
@section('content')
@include('commons.errors')
<h1 class="page-heading">マイページ</h1>
<p>ようこそ、{{ Auth::user()->name }}さん | <a href="{{ route('tasks.create') }}">記事を書く</a></p>
@include('tasks.hometask')
@endsection()
