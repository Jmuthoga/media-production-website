@extends('admin.layouts.app')

@section('title', 'Edit Studio Session & Hire')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Studio Session & Hire</h1>

    <form action="{{ route('admin.photography.studio.update', $studio) }}"
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
                    value="{{ old('title', $studio->title) }}"
                    required>
            </div>

            <!-- Description -->
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description"
                    rows="4"
                    class="form-control">{{ old('description', $studio->description) }}</textarea>
            </div>

            <!-- Hero Image -->
            <div class="col-md-6">
                <label class="form-label">Hero Image</label>
                <input type="file" name="hero_image" class="form-control">
                @if($studio->hero_image)
                <img src="{{ asset('storage/'.$studio->hero_image) }}"
                    class="img-fluid rounded mt-2"
                    style="max-height:150px;">
                @endif
            </div>

            <!-- Hero Right Image -->
            <div class="col-md-6">
                <label class="form-label">Hero Right Image</label>
                <input type="file" name="hero_right_image" class="form-control">
                @if($studio->hero_right_image)
                <img src="{{ asset('storage/'.$studio->hero_right_image) }}"
                    class="img-fluid rounded mt-2"
                    style="max-height:150px;">
                @endif
            </div>

            <!-- Gallery Images -->
            <div class="col-12">
                <label class="form-label">Gallery Images (Upload More)</label>
                <input type="file" name="gallery[]" multiple class="form-control">

                @if(!empty($studio->gallery))
                <div class="d-flex flex-wrap gap-2 mt-2">
                    @foreach($studio->gallery as $img)
                    <img src="{{ asset('storage/'.$img) }}"
                        class="img-fluid rounded"
                        style="width:80px; height:80px; object-fit:cover;">
                    @endforeach
                </div>
                @endif
            </div>

        </div>

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('admin.photography.studio.index') }}"
                class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
</div>
@endsection