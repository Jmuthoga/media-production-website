@extends('admin.layouts.app')

@section('title', 'Create Role')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Create Role</h1>

    <form action="{{ route('internships.roles.store') }}" method="POST" enctype="multipart/form-data" class="card p-4">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title *</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description *</label>
            <textarea name="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Icon (bootstrap class)</label>
                <input type="text" name="icon" class="form-control" placeholder="bi-camera-fill" value="{{ old('icon') }}">
            </div>
        </div>

        <div class="row g-3 mt-3">
            <div class="col-md-6">
                <label class="form-label">Apply Link</label>
                <input type="url" name="apply_link" class="form-control" value="{{ old('apply_link') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="open" {{ old('status') === 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ old('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
        </div>

        <div class="mt-4 text-end">
            <a href="{{ route('internships.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button class="btn btn-primary">Create Role</button>
        </div>
    </form>
</div>
@endsection
