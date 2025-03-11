<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = auth()->user()->projects()->with('category')->latest()->paginate(10);
        return view('dashboard', compact('projects'));
    }

    public function dashboard()
    {
        $projects = auth()->user()->projects()->with('category')->latest()->paginate(10);
        return view('dashboard', compact('projects'));
    }
}
