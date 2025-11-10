@extends('admin.layouts.app')

@section('title', 'Edit Internship/Attachment')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Internship/Attachment</h1>

    <form action="{{ route('internships.update', $internship) }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Title *</label>
                <input type="text" name="title" class="form-control" required value="{{ old('title', $internship->title) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Organization</label>
                <input type="text" name="organization" class="form-control" value="{{ old('organization', $internship->organization) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Duration</label>
                <input type="text" name="duration" class="form-control" value="{{ old('duration', $internship->duration) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Type</label>
                <select name="type" class="form-select">
                    @foreach(['role','stat','offer','requirement'] as $type)
                    <option value="{{ $type }}" {{ old('type', $internship->type) == $type ? 'selected' : '' }}>
                        {{ ucfirst($type) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Apply Link</label>
                <input type="url" name="apply_link" class="form-control" value="{{ old('apply_link', $internship->apply_link) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Icon (Bootstrap class)</label>
                <input type="text" name="icon" class="form-control" value="{{ old('icon', $internship->icon) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Stat Value</label>
                <input type="number" name="stat_value" class="form-control" value="{{ old('stat_value', $internship->stat_value) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Image</label><br>
                @if($internship->image)
                <img src="{{ asset('storage/' . $internship->image) }}" alt="" width="100" class="mb-2 rounded d-block">
                @endif
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-12">
                <label class="form-label">Description *</label>
                <textarea name="description" rows="4" class="form-control">{{ old('description', $internship->description) }}</textarea>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('internships.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Internship</button>
        </div>
    </form>
</div>
@endsection