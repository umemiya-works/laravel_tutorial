    <div class="form-floating mb-4">
        <label>タイトル</label>
        <input class="form-control" type="text" name="title" value="{{ old('title', $task->title) }}">
        <label>本文</label>
        <textarea class="form-control" name="body" rows="5">{{ old('body', $task->body) }}</textarea>
    </div>
