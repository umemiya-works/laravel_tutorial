@extends('layouts.app')
@section('content')
@include('commons.errors')
<div class="text-center">
    <main class="w-100 m-auto">
        <form action="{{ route('tasks.update', $task) }}" method="post">
            @csrf
            @method('patch')
            @include('tasks.form')
            <div class="mx-auto">
                <button class="btn btn-lg btn-primary mr-2" type="submit">更新する</button>
                <a class="btn btn-lg btn-danger" href="{{ route('tasks.show', $task) }}">キャンセル</a>
            </div>
        </form>
    </main>
</div>
@endsection()
