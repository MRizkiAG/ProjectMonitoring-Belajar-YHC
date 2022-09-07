@extends('project.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h1 class="p-2 py-3">{{ $title }}</h1>
                            <div>
                                <a href="{{ url()->previous() }}" class="btn btn-warning my-3"><i
                                        class="fa-solid fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h2 class="text-capitalize fw-bold">{{ $project->name }}</h2>
                        <p class="fst-italic m-0">Leader : {{ $project->leader->name }}</p>
                        <p class="fst-italic">Owner : {{ $project->owner }}</p>
                        <p class="btn btn-success position-relative">
                            <i class="fa-solid fa-clock"></i> Deadline : {{ $project->deadline }}
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                {{ $project->progress }}%
                            </span>
                        </p>
                        <p class="mx-4">{{ $project->description }}</p>
                    </div>

                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="p-2 text-decoration-underline">Task List</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Task</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project->tasks as $task)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
