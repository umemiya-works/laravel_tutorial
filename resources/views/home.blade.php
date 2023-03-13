@extends('layouts.app')
@section('content')
<div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold">マイページ</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">ようこそ、{{ Auth::user()->name }}さん</p>
        <div class="mb-4">
            <a class="btn btn-primary" href="{{ route('tasks.create') }}">Todoを追加する</a>
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            @include('tasks.hometask')
        </div>
    </div>
</div>
@endsection()
