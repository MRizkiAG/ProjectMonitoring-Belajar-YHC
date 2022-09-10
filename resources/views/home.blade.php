@extends('project.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-uppercase p-4">{{ auth()->user()->name }}'s Project</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Project Name</th>
                                    <th>Task</th>
                                    <th>Progress</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->tasks_count }}</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" aria-label="Example with label"
                                                    style="width: {{ $project->progress }}%;" aria-valuenow="{{ $project->progress }}" aria-valuemin="0"
                                                    aria-valuemax="100">{{ $project->progress }}%</div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('project.show', $project) }}"
                                                class="btn btn-labeled btn-primary btn-sm">
                                                <span class="btn-label">
                                                    <i class="bi bi-eye"></i>
                                                </span>
                                            </a>
                                        </td>
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
