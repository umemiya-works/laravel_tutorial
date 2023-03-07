<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function index()
    {
        $todoes = Todo::where('status', '=', false)->orderBy('created_at', 'desc')->paginate(10);
        $data = ['todoes' => $todoes];
        return view('todoes.index', $data);
    }

    public function create()
    {
        $todo = new Todo();
        $data = ['todo' => $todo];
        return view('todoes.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required|max:255'
        ]);
        $article = new Todo();
        $article->user_id = Auth::id();
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();

        return redirect(route('todoes.index'));
    }

    public function show(Todo $todo)
    {
        $data = ['todo' => $todo];
        return view('todoes.show', $data);
    }

    public function edit(Todo $todo)
    {
        $this->authorize($todo);
        $data = ['todo' => $todo];
        return view('todoes.edit', $data);
    }

    public function update(Request $request, Todo $todo)
    {
        $this->authorize($todo);
        if($request->status === null) {
            $this->validate($request, [
                'title' => 'required|max:255',
                'body'=> 'required|max:255'
            ]);
            $todo->title = $request->title;
            $todo->body = $request->body;
            $todo->save();
        } else {
            $todo = Todo::find($todo->id);
            $todo->status = true;
            $todo->save();
        }
        return redirect(route('todoes.show', $todo));
    }

    public function destroy(Todo $todo)
    {
        $this->authorize($todo);
        $todo->delete();
        return redirect(route('todoes.index'));
    }
}
