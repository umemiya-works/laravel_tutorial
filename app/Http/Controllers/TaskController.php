<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\TaskService;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $tasks = TaskService::searchTask($search, $status);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $task = new Task();
        return view('tasks.create', ['task' => $task]);
    }

    public function store(TaskPostRequest $request)
    {
        $task = new Task();
        $task->user_id = Auth::id();
        $task->title = $request->title;
        $task->body = $request->body;
        $task->save();

        return redirect(route('tasks.index'))->with('success', '新しいTodoを作成しました');
    }

    public function show(Task $task)
    {
        $this->authorize('show', $task);
        return view('tasks.show', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(TaskPostRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $task->title = $request->title;
        $task->body = $request->body;
        $task->save();
        return redirect(route('tasks.show', $task))->with('success', '編集に成功しました');
    }

    public function updateStatus(Task $task)
    {
        $task = Task::find($task->id);
        $task->status = ($task->status) ? 0 : 1;
        $task->save();
        return redirect(route('tasks.index'))->with('success', 'ステータスを更新しました');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect(route('tasks.index'))->with('danger', 'Todoを削除しました');
    }
}
