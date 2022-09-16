@extends('project.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="pagetitle">
                        <h1>{{ $title }}</h1>
                        <nav>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/project') }}">Task</a></li>
                                <li class="breadcrumb-item active">
                                    @if (@$task)
                                        {{ 'Edit' }}
                                    @else
                                        {{ 'Tambah' }}
                                    @endif
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ url()->previous() }}" class="btn btn-dark my-3"><i class="bi bi-arrow-left"></i>
                            Kembali</a>
                    </div>
                </div>
                <div class="card">
                    {{-- <div class="card-header">
                    </div> --}}
                    <div class="card-body">
                        <form action="{{ $url }}" method="post">
                            @csrf
                            @if (@$task)
                                @method('PUT')
                            @endif
                            <input type="hidden" name="project_id" value="{{ $project_id }}">
                            <div class="form-group my-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Masukkan nama task" aria-describedby="helpId"
                                    value="{{ @$task->name ?? old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" id="description" class="form-control"
                                    placeholder="Masukkan deskripsi task" aria-describedby="helpId">{{ @$task->description ?? old('description') }}</textarea>
                            </div>
                            <div class="form-group my-3">
                                <label for="status">Status
                                </label>
                                <select class="form-select" aria-label="Default select example" id="status" name="status">
                                    <option {{ @$task->status=="PENDING"?'selected':'' }} value="PENDING">Pending</option>
                                    <option {{ @$task->status=="ON PROGRESS"?'selected':'' }} value="ON PROGRESS">On Progress</option>
                                    <option {{ @$task->status=="DONE"?'selected':'' }} value="DONE">Done</option>
                                  </select>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
