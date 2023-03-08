<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $task = Auth::user()->tasks->where('status', '=', false)->first();
        $data = [
            'task' => $task,
        ];
        return view('home', $data);
    }
}
