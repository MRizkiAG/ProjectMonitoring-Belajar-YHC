@extends('project.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="pagetitle">
                    <h1>{{ $title }}</h1>
                    <nav>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Project</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2>Project Data</h2>
                            <div>
                                <a href="{{ route('project.create') }}" class="btn btn-success my-3">
                                    <div class="d-flex align-items-center">

                                        <span class="btn-label me-2">
                                            <i class="bi bi-plus-circle"></i>
                                        </span>
                                        Tambah
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    @if (Session::get('icon') != '')
                        <x-alert message="{{ $message = Session::get('message') }}"
                            icon="{{ $icon = Session::get('icon') }}" />
                    @endif

                    <div class="card-body">

                        <table class="table table-borderless table-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Leader</th>
                                    <th>Owner</th>
                                    <th>Task</th>
                                    <th>Deadline</th>
                                    <th>Progress</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->leader->name }}</td>
                                        <td>{{ $project->owner }}</td>
                                        <td>{{ $project->tasks_count }}</td>
                                        {{-- <td>{{ $project->deadline }}</td> --}}
                                        <td>{{ date('d-M-Y', strtotime($project->deadline)) }}</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-{{ $project->getProgressColor }}" role="progressbar"
                                                    aria-label="Example with label"
                                                    style="width: {{ $project->progress }}%;"
                                                    aria-valuenow="{{ $project->progress }}" aria-valuemin="0"
                                                    aria-valuemax="100">{{ $project->progress }}%</div>
                                            </div>
                                        </td>
                                        <td class="d-flex ">
                                            {{-- Tombol Show --}}
                                            <x-sm_button route="{{ route('project.show', $project) }}" color="primary"
                                                icon="eye" />

                                            {{-- Tombol Edit --}}
                                            <x-sm_button route="{{ route('project.edit', $project) }}" color="warning mx-1"
                                                icon="pencil-square" />

                                            {{-- Tombol Delete --}}
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#Modal{{ $project->id }}">
                                                <span class="btn-label">
                                                    <i class="bi bi-trash"></i>
                                                </span>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="Modal{{ $project->id }}" tabindex="-1"
                                                aria-labelledby="Modal{{ $project->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="Modal{{ $project->id }}Label">Apakah anda
                                                                yakin ingin menghapus project?
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form action="{{ route('project.destroy', $project->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                {{-- Delete --}}
                                                                <button type="submit" class="btn btn-labeled btn-danger">
                                                                    Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
