<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\Todo;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user()->todoes();
        $todoes = $user->first();
        $data = [
            'todoes' => $todoes,
        ];
        return view('home', $data);
    }
}
