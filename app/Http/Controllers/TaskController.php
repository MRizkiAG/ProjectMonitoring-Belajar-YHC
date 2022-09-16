<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'title' => 'Tambah Task',
            'project_id' => $request->project_id
        ];

        $url = route('task.store');


        return view('task.create', $data, compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create($request->all());
        $project = Project::findOrFail($request->project_id);

        return redirect()->route('project.show', $project->id)->with([
            'message' => 'Task berhasil ditambahkan!',
            'icon' => 'check-circle-fill'
        ]);
        // return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = [
            'title' => 'Edit Task',
            'project_id' => $request->project_id
        ];
        $task = Task::findOrFail($id);
        $url = route('task.update', $task);

        return view('task.create', $data, compact('task', 'url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        // dd($request->all());
        $task = Task::findOrFail($id);
        $task->update($request->all());
        $project = Project::findOrFail($request->project_id);
        return redirect()->route('project.show', $project->id)->with([
            'message' => 'Task berhasil diupdate!',
            'icon' => 'pencil-square'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        $project = Project::findOrFail($request->project_id);

        return redirect()->route('project.show', $project->id)->with([
            'message' => 'Task berhasil dihapus!',
            'icon' => 'trash'
        ]);
    }
}
