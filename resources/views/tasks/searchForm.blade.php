<h1 class="text-center mb-4">Todo一覧</h1>
<form method="get" action="{{ route('tasks.index') }}" class="mb-4">
    <div class="input-group max-width">
        <input type="search" placeholder="検索ワードを入力" name="search" value="@if (isset($search)) {{ $search }} @endif" class="form-control">
        <div class="form-check form-check-inline is-invalid">
            <input class="form-check-input form-check-inline" type="radio" name="status" id="statusChoice1" value=1>
            <label class="form-check-label" for="statusChoice1">完了</label>
        </div>
        <div class="form-check form-check-inline is-invalid">
            <input class="form-check-input form-check-inline" type="radio" name="status" id="statusChoice2" value=0>
            <label class="form-check-label" for="statusChoice2">未完了</label>
        </div>
        <button type="submit" class="btn btn-outline-success">
            検索
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
        <button type="button" class="btn btn-outline-info">
            <a href="{{ route('tasks.index') }}">
                クリア
            </a>
        </button>
    </div>
</form>
