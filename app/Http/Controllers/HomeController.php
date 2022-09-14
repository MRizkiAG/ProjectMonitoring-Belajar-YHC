<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'title' => 'Dashboard',
            'projects' => Project::where('leader_id', auth()->user()->id)->withCount('tasks')->get(),
            'projects_count' => Project::where('leader_id', auth()->user()->id)->count(),
            'tasks_count' => Auth::user()->tasks->count()
        ];

        // $test = Task::with('projects.leader')->get();
        // $user = Auth::user();

        // $test = Task::with(['projects' => function ($query) use ($user) {
        //     $query->where('leader_id', $user->id);
        // }])->get();
        // return response()->json($test);


        return view('home', $data);
    }
}
