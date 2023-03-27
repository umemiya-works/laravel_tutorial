@extends('layouts.app')
@section('content')
@include('commons.flash')
@include('tasks.searchForm')
<div class="mb-4 text-center">
    <a class="btn btn-outline-primary w-100" href="{{ route('tasks.create') }}">Todoを追加する</a>
</div>
<div class="container">
    <table class="table table-striped text-center mb-4">
        @if($tasks == null)
        <thead>
            <tr>
                <th scope="col">やること</th>
                <th scope="col">登録日</th>
                <th scope="col">状態</th>
            </tr>
        </thead>
        @endif
        <tbody>
        @include('tasks.tasks')
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $tasks->appends(request()->query())->links() }}
    </div>
</div>
@endsection()
