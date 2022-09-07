<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

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
        $data = [
            'title'=>'Home'
        ];
        $projects = Project::where('leader_id', auth()->user()->id)->withCount('tasks')->get();

        // $projects = Project::with('leader')->withCount('tasks')->get();
        // $projects = auth()->user()->projects;

        return view('home', $data, compact('projects'));
    }
}
