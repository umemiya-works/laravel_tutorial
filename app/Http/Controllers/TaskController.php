<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $user_id = Auth::id();
        $query = Task::query()->where('user_id', '=', $user_id)->orderBy('created_at', 'desc');
        if(!empty($search)) {
            $query->where('title', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%");
        }
        if($status != null) {
            $query->where('status', '=', $status);
        }
        $tasks = $query->paginate(5);
        $data = ['tasks' => $tasks];
        return view('tasks.index', $data);
    }

    public function create()
    {
        $task = new Task();
        $data = ['task' => $task];
        return view('tasks.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required|max:255'
        ]);
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

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);
        if($request->status === null) {
            $this->validate($request, [
                'title' => 'required|max:255',
                'body'=> 'required|max:255'
            ]);
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
