@extends('project.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="pagetitle">
                        <h1>{{ $title }}</h1>
                        <nav>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/project') }}">Project</a></li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('project.index') }}" class="btn btn-dark my-3"><i class="bi bi-arrow-left"></i>
                            Kembali</a>
                    </div>
                </div>
                <div class="card">
                    {{-- <div class="card-header">
                    </div> --}}
                    <div class="card-body">
                        <h2 class="my-4 text-capitalize fw-bold">{{ $project->name }}</h2>
                        <p class="fst-italic m-0">Leader : {{ $project->leader->name }}</p>
                        <p class="fst-italic">Owner : {{ $project->owner }}</p>
                        <p class="btn btn-danger position-relative">
                            <i class="bi bi-clock"></i> Deadline : {{ date('d-M-Y', strtotime($project->deadline)) }}
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                {{ $project->progress }}%
                            </span>
                        </p>
                        <p class="mx-4">{{ $project->description }}</p>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="p-4 text-decoration-underline">Task List</h3>
                            <div>
                                <a href="{{ route('task.create', ['project_id' => $project->id]) }}"
                                    class="btn btn-success my-3">
                                    <div class="d-flex align-items-center">
                                        <span class="btn-label me-2">
                                            <i class="bi bi-plus-circle"></i>
                                        </span>
                                        Tambah
                                    </div>
                                </a>
                            </div>
                        </div>
                        @if (Session::get('icon') != '')
                            <x-alert message="{{ $message = Session::get('message') }}"
                                icon="{{ $icon = Session::get('icon') }}" />
                        @endif
                        <table class="table table-borderless table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Task</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project->tasks as $task)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>
                                            <span class="badge text-bg-{{ $task->getStatusColor }} fst-italic">
                                                {{ $task->status }}
                                            </span>
                                        </td>

                                        <td class="d-flex ">
                                            {{-- Tombol Edit --}}
                                            <x-sm_button
                                                route="{{ route('task.edit', $task) }}"
                                                {{-- route="{{url('task/'.$task->id.'/edit?project_id='. $project->id)}}" --}}
                                                color="warning mx-1" icon="pencil-square" />
                                            @role('superadmin|admin')
                                                {{-- Tombol Delete --}}

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#Modal{{ $task->id }}">
                                                    <span class="btn-label">
                                                        <i class="bi bi-trash"></i>
                                                    </span>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="Modal{{ $task->id }}" tabindex="-1"
                                                    aria-labelledby="Modal{{ $task->id }}Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="Modal{{ $task->id }}Label">
                                                                    Apakah anda
                                                                    yakin ingin menghapus project?
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('task.destroy', $task->id) }}"
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
                                            @endrole
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
