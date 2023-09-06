@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Create Project
                    </div>
                    <div class="card-body">
                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="technologies" class="form-label">Technologies</label>
                                <input type="text" class="form-control" id="technologies" name="technologies"
                                    value="{{ old('technologies') }}" required>
                            </div>
                            <div class="mb-3 d-flex gap-2 align-items-end">
                                <div class="col-11">
                                    <label for="screenshot" class="form-label">Screenshot</label>
                                    <input type="file" class="form-control" id="screenshot" name="screenshot">
                                </div>
                                <div class="col-1">
                                    <img src="{{ old('screenshot', 'https:marcolanci.it/utils/placeholder.jpg') }}"
                                        alt="preview" class="img-fluid" id="img-preview">
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured"
                                    {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">Is Featured?</label>
                            </div>
                            <div class="mb-3">
                                <label for="github_url" class="form-label">GitHub URL</label>
                                <input type="url" class="form-control" id="github_url" name="github_url"
                                    value="{{ old('github_url') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Create Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const placeholder = 'https://marcolanci.it/utils/placeholder.jpg';
        const imageField = document.getElementById('screenshot');
        const previewField = document.getElementById('img-preview');
        imageField.addEventListener('input', () => {
            previewField.src = imageField.value ? imageField.value : placeholder;
        });
    </script>
@endsection
