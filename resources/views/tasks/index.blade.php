@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        Todo一覧
      </div>
      <div class="card-body">
        <table class="table">
          <tbody>
            @include('tasks.tasks')
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- <h1 class="page-heading">Todo検索</h1>
<form method="get" action="{{ route('tasks.index') }}">
    <input type="search" placeholder="検索ワードを入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
        <button type="button" class="btn btn-light">検索</button>
        <button type="button" class="btn btn-light">
            <a href="{{ route('tasks.index') }}">
                クリア
            </a>
        </button>
    </div>
</form>
    @include('tasks.tasks') -->
@endsection()
