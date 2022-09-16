@extends('project.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="pagetitle">
                    <h1>{{ $title }}</h1>
                    <nav>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </nav>
                </div>

                <!-- Sales Card -->
                <section class="section dashboard">
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Project</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-code-slash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $projects_count }}</h6>
                                        <span class="text-success small pt-1 fw-bold">{{ $tasks_count }}</span>
                                        <span class="text-muted small pt-2 ps-1">Task</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section><!-- End Sales Card -->

                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Project List</h2>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Project Name</th>
                                    <th>Task</th>
                                    <th>Progress</th>
                                    @role('superadmin|admin')
                                    <th>Action</th>
                                    @endrole
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
                                                <div class="progress-bar bg-{{ $project->getProgressColor }}"
                                                    role="progressbar" aria-label="Example with label"
                                                    style="width: {{ $project->progress }}%;"
                                                    aria-valuenow="{{ $project->progress }}" aria-valuemin="0"
                                                    aria-valuemax="100">{{ $project->progress }}%</div>
                                            </div>
                                        </td>
                                        @role('superadmin|admin')
                                        <td>
                                            <x-sm_button route="{{ route('project.show', $project) }}" color="primary"
                                                icon="eye" />
                                        </td>
                                        @endrole
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
