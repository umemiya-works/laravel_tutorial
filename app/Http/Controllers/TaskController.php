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
        $data = ['tasks' => $tasks];
        return view('tasks.index', $data);
    }

    public function create()
    {
        $task = new Task();
        $data = ['task' => $task];
        return view('tasks.create', $data);
    }

    public function store(TaskPostRequest $request)
    {
        $task = new Task();
        $task->user_id = Auth::id();
        $task->title = $request->title;
        $task->body = $request->body;
        $task->save();

        return redirect(route('tasks.index'));
    }

    public function show(Task $task)
    {
        $this->authorize('show', $task);
        $data = ['task' => $task];
        return view('tasks.show', $data);
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        $data = ['task' => $task];
        return view('tasks.edit', $data);
    }

    public function update(TaskPostRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        if($request->status === null) {
            $task->title = $request->title;
            $task->body = $request->body;
            $task->save();
        } else {
            $task= Task::find($task->id);
            $task->status = true;
            $task->save();
        }
        return redirect(route('tasks.show', $task));
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect(route('tasks.index'));
    }
}
