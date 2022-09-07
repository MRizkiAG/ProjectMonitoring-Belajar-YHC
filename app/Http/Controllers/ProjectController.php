<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Project Monitoring',
            // 'projects' => Project::with('leader')->where('leader_id', auth()->user()->id)->withCount('tasks')->get()
            'projects' => Project::with('leader')->withCount('tasks')->get()

        ];
        // $projects = Project::all();

        // $projects = Project::with('leader')->withCount('tasks')->get();


        // $projects = auth()->user()->projects;
        // return response()->json($projects);

        // return view('project.index', $data, compact('projects'));
        return view('project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Project'
        ];

        $url = route('project.store');

        return view('project.create', $data, compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'leader_id' => 'required|integer',
            'owner' => 'required|string',
            'deadline' => 'required|date',
            'progress' => 'required|integer',
            'description' => 'nullable',
        ]);
        Project::create($data);
        return redirect()->route('project.index')->with(['store-success' => 'Project berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'title' => 'Detail Project'
        ];
        $project = Project::findOrFail($id);
        $tasks = $project->tasks;
        // return response()->json($tasks);

        return view('project.show', $data, compact('project', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Project'
        ];
        $project = Project::findOrFail($id);
        $url = route('project.update', $project);

        return view('project.create', $data, compact('project', 'url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $project = Project::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'leader_id' => 'required|integer',
            'owner' => 'required|string',
            'deadline' => 'required|date',
            'progress' => 'required|integer',
            'description' => 'nullable',
        ]);

        $project->update($data);
        return redirect()->route('project.index')->with(['update-success' => 'Project berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('project.index')->with(['destroy-success' => 'Project berhasil dihapus!']);
    }
}
