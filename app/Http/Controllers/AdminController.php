<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard',
            'projects' => Project::with('leader')->withCount('tasks')->get(),
            'projects_count' => Project::where('leader_id', auth()->user()->id)->count()
        ];
        return view('admin.dashboard', $data);
    }
}
