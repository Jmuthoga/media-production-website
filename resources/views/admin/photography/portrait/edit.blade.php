@extends('admin.layouts.app')

@section('title', 'Edit Portrait Photography')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Portrait Photography</h1>

    <form action="{{ route('admin.photography.portrait.update', $portrait) }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <!-- Title -->
            <div class="col-md-6">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $portrait->title) }}" required>
            </div>

            <!-- Description -->
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control">{{ old('description', $portrait->description) }}</textarea>
            </div>

            <!-- Hero Image -->
            <div class="col-md-6">
                <label class="form-label">Hero Image</label>
                <input type="file" name="hero_image" class="form-control">
                @if($portrait->hero_image)
                <img src="{{ asset('storage/'.$portrait->hero_image) }}" class="img-fluid rounded mt-2" style="max-height:150px;">
                @endif
            </div>

            <!-- Hero Right Image -->
            <div class="col-md-6">
                <label class="form-label">Hero Right Image</label>
                <input type="file" name="hero_right_image" class="form-control">
                @if($portrait->hero_right_image)
                <img src="{{ asset('storage/'.$portrait->hero_right_image) }}" class="img-fluid rounded mt-2" style="max-height:150px;">
                @endif
            </div>

            <!-- Gallery Images -->
            <div class="col-12">
                <label class="form-label">Gallery Images</label>
                <input type="file" name="gallery[]" multiple class="form-control">
                @if(!empty($portrait->gallery))
                <div class="d-flex flex-wrap gap-2 mt-2">
                    @foreach($portrait->gallery as $img)
                    <img src="{{ asset('storage/'.$img) }}" class="img-fluid rounded" style="width:80px; height:80px; object-fit:cover;">
                    @endforeach
                </div>
                @endif
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('admin.photography.portrait.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection