@extends('admin.layouts.app')

@section('title', 'Edit School & Institution Photography')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit School & Institution Photography</h1>

    <form action="{{ route('admin.photography.school.update', $school) }}"
        method="POST"
        enctype="multipart/form-data"
        class="card shadow-sm p-4">

        @csrf
        @method('PUT')

        <div class="row g-3">
            <!-- Title -->
            <div class="col-md-6">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $school->title) }}"
                    required>
            </div>

            <!-- Description / Content -->
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description"
                    rows="4"
                    class="form-control">{{ old('description', $school->description ?? $school->content) }}</textarea>
            </div>

            <!-- Hero Image -->
            <div class="col-md-6">
                <label class="form-label">Hero Image</label>
                <input type="file" name="hero_image" class="form-control">
                @if($school->hero_image)
                <img src="{{ asset('storage/'.$school->hero_image) }}"
                    class="img-fluid rounded mt-2"
                    style="max-height:150px;">
                @endif
            </div>

            <!-- Hero Right Image -->
            <div class="col-md-6">
                <label class="form-label">Hero Right Image</label>
                <input type="file" name="hero_right_image" class="form-control">
                @if($school->hero_right_image)
                <img src="{{ asset('storage/'.$school->hero_right_image) }}"
                    class="img-fluid rounded mt-2"
                    style="max-height:150px;">
                @endif
            </div>

            <!-- Gallery Images -->
            <div class="col-12">
                <label class="form-label">Gallery Images (Upload More)</label>
                <input type="file" name="gallery[]" multiple class="form-control">

                @if(!empty($school->gallery))
                <div class="d-flex flex-wrap gap-2 mt-2">
                    @foreach($school->gallery as $img)
                    <img src="{{ asset('storage/'.$img) }}"
                        class="img-fluid rounded"
                        style="width:80px; height:80px; object-fit:cover;">
                    @endforeach
                </div>
                @endif
            </div>

        </div>

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('admin.photography.school.index') }}"
                class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
</div>
@endsection