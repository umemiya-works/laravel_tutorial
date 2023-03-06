<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todoes = \Auth::user()->todoes()->orderBy('created_at', 'desc')->get();
        $data = [
            'todoes' => $todoes,
        ];
        return view('home', $data);
    }
}
