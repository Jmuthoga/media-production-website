@extends('admin.layouts.app')

@section('title', 'Add Studio Session & Hire')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Add Studio Session & Hire</h1>

    <form action="{{ route('admin.photography.studio.store') }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
        @csrf

        <div class="row g-3">
            <!-- Title -->
            <div class="col-md-6">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <!-- Description -->
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
            </div>

            <!-- Hero Image -->
            <div class="col-md-6">
                <label class="form-label">Hero Image</label>
                <input type="file" name="hero_image" class="form-control">
            </div>

            <!-- Hero Right Image -->
            <div class="col-md-6">
                <label class="form-label">Hero Right Image</label>
                <input type="file" name="hero_right_image" class="form-control">
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('admin.photography.studio.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection