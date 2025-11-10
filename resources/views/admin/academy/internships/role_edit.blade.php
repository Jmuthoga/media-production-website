@extends('admin.layouts.app')

@section('title', 'Edit Role')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Role</h1>

    <form action="{{ route('internships.roles.update', $internship) }}" method="POST" enctype="multipart/form-data" class="card p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title *</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $internship->title) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description *</label>
            <textarea name="description" rows="4" class="form-control" required>{{ old('description', $internship->description) }}</textarea>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @if($internship->image)
                    <img src="{{ asset('storage/'.$internship->image) }}" class="img-fluid mt-2" style="max-height:150px;">
                @endif
            </div>
            <div class="col-md-6">
                <label class="form-label">Icon (bootstrap class)</label>
                <input type="text" name="icon" class="form-control" value="{{ old('icon', $internship->icon) }}">
            </div>
        </div>

        @php $meta = $internship->meta ?? []; $meta = is_string($meta) ? json_decode($meta, true) : $meta; @endphp

        <div class="row g-3 mt-3">
            <div class="col-md-6">
                <label class="form-label">Apply Link</label>
                <input type="url" name="apply_link" class="form-control" value="{{ old('apply_link', $internship->apply_link) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="open" {{ (old('status', $meta['status'] ?? 'open') === 'open') ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ (old('status', $meta['status'] ?? 'open') === 'closed') ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
        </div>

        <div class="mt-4 text-end">
            <a href="{{ route('internships.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button class="btn btn-primary">Update Role</button>
        </div>
    </form>
</div>
@endsection
