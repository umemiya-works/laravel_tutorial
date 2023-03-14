@extends('layouts.app')
@section('content')
@include('commons.errors')
<div class="text-center">
    <main class="w-100 m-auto">
        <form action="{{ route('tasks.store') }}" method="post">
            @csrf
            @include('tasks.form')
            <div class="mx-auto">
                <button class="btn btn-lg btn-primary mr-2" type="submit">作成する</button>
                <a class="btn btn-lg btn-danger" href="{{ route('tasks.index') }}">キャンセル</a>
            </div>
        </form>
    </main>
</div>
@endsection()
