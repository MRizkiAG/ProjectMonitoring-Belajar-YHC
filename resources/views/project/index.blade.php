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
                                <a href="{{ route('project.create') }}" class="btn btn-primary my-3">
                                    <div class="d-flex align-items-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus-circle-fill me-1" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                        </svg>
                                        Tambah
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('store-success'))
                        <div class="alert alert-success d-flex align-items-center m-2 alert-dismissible fade show"
                            role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($message = Session::get('update-success'))
                        <div class="alert alert-warning d-flex align-items-center m-2 alert-dismissible fade show"
                            role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($message = Session::get('destroy-success'))
                        <div class="alert alert-danger d-flex align-items-center m-2 alert-dismissible fade show"
                            role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
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
                                        <th>{{ $project->name }}</th>
                                        <th>{{ $project->leader->name }}</th>
                                        <th>{{ $project->owner }}</th>
                                        <th>{{ $project->tasks_count }}</th>
                                        {{-- <th>{{ $project->deadline }}</th> --}}
                                        <th>{{ date('d-M-Y', strtotime($project->deadline)) }}</th>
                                        <th>{{ $project->progress }} %</th>
                                        <th class="d-flex ">
                                            {{-- Tombol Show --}}
                                            <a href="{{ route('project.show', $project) }}"
                                                class="btn btn-labeled btn-success">
                                                <span class="btn-label">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </a>

                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('project.edit', $project) }}"
                                                class="btn btn-labeled btn-warning mx-1">
                                                <span class="btn-label">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </span>
                                            </a>

                                            {{-- Tombol Delete --}}
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <span class="btn-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda
                                                                yakin ingin menghapus project?
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <form action="{{ route('project.destroy', $project) }}"
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
                                        </th>
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
