@extends('admin.layouts.app')

@section('title')
@if($portrait)
Manage Gallery - {{ $portrait->title }}
@else
Manage Gallery
@endif
@endsection

@section('content')
<div class="container py-4">

    <h1 class="mb-4">
        @if($portrait)
        Manage Gallery for: {{ $portrait->title }}
        @else
        Manage Gallery (No Portrait Selected)
        @endif
    </h1>

    <!-- SUCCESS ALERT -->
    @if(session('success'))
    <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger shadow-sm">{{ session('error') }}</div>
    @endif

    <!-- UPLOAD NEW IMAGES -->
    <div class="card mb-4 shadow-sm p-4">
        <form action="{{ $portrait 
            ? route('admin.photography.portrait.gallery.store', $portrait) 
            : route('admin.photography.portrait.gallery.store', 0) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Add Gallery Images</label>
                <input type="file" name="gallery[]" multiple class="form-control">
                <small class="text-muted">You can select multiple images at once.</small>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
            <a href="{{ route('admin.photography.portrait.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>

    <!-- DISPLAY GALLERY IMAGES -->
    @if($portrait && !empty($portrait->gallery) && count($portrait->gallery) > 0)
    <div class="card shadow-sm p-4">
        <h5 class="fw-bold mb-3">Existing Gallery</h5>
        <div class="row g-3">
            @foreach($portrait->gallery as $index => $image)
            <div class="col-6 col-md-3">
                <div class="position-relative overflow-hidden rounded shadow-sm">
                    <img src="{{ asset('storage/'.$image) }}" class="img-fluid w-100 h-100" style="object-fit:cover;">
                    <form action="{{ route('admin.photography.portrait.gallery.destroy', [$portrait, $index]) }}"
                        method="POST" class="position-absolute top-0 end-0 m-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this image?')">&times;</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @elseif(!$portrait)
    <p class="text-muted fst-italic">Currently adding gallery images without associating to a portrait.</p>
    @else
    <p class="text-muted fst-italic">No gallery images uploaded yet.</p>
    @endif

</div>
@endsection