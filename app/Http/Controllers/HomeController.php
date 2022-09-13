<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'title' => 'Dashboard'
        ];
        $projects = Project::where('leader_id', auth()->user()->id)->withCount('tasks')->get();
        $projects_count = Project::where('leader_id', auth()->user()->id)->count();

        return view('home', $data, compact('projects', 'projects_count'));
    }
}
