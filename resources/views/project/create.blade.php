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
                                <a href="{{ route('project.index') }}" class="btn btn-warning my-3"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ $url }}" method="post">
                            @csrf
                            @if (@$project)
                                @method('PUT')
                            @endif
                            <div class="form-group my-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Masukkan nama project" aria-describedby="helpId"
                                    value="{{ @$project->name ?? old('name') }}">
                            </div>
                            <div class="form-group my-3">
                                <label for="leader_id">Leader ID</label>
                                <input type="number" name="leader_id" id="leader_id" class="form-control"
                                    placeholder="Masukkan leader id" aria-describedby="helpId"
                                    value="{{ @$project->leader_id ?? old('leader_id') }}">
                            </div>
                            <div class="form-group my-3">
                                <label for="owner">Owner</label>
                                <input type="text" name="owner" id="owner" class="form-control"
                                    placeholder="Masukkan nama owner" aria-describedby="helpId"
                                    value="{{ @$project->owner ?? old('owner') }}">
                            </div>
                            <div class="form-group my-3">
                                <label for="deadline">Deadline</label>
                                <input type="date" name="deadline" id="deadline"
                                    class="form-control"aria-describedby="helpId"
                                    value="{{ @$project->deadline ?? old('deadline') }}">
                            </div>
                            <div class="form-group my-3">
                                <label for="progress">Progress</label>
                                <input type="number" name="progress" id="progress" class="form-control"
                                    placeholder="Masukkan progress project" aria-describedby="helpId"
                                    value="{{ @$project->progress ?? old('progress') }}">
                            </div>
                            <div class="form-group my-3">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" id="description" class="form-control"
                                    placeholder="Masukkan deskripsi project" aria-describedby="helpId">{{ @$project->description ?? old('description') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
