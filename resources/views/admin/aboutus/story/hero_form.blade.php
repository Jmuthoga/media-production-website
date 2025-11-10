@extends('admin.layouts.app')

@section('title', 'Hero Section')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Hero Section</h1>

    <form action="{{ route('admin.aboutus.story.hero.save') }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
        @csrf

        <div class="row g-3">
            <!-- Hero Title -->
            <div class="col-md-6">
                <label class="form-label">Hero Title</label>
                <input type="text" name="title" value="{{ old('title', $hero->title ?? '') }}" class="form-control" required>
            </div>

            <!-- Hero Description -->
            <div class="col-md-6">
                <label class="form-label">Hero Description</label>
                <textarea name="description" rows="2" class="form-control">{{ old('description', $hero->description ?? '') }}</textarea>
            </div>

            @php
                $meta = $hero?->meta ? json_decode($hero->meta, true) : [];
            @endphp

            <!-- Background Image -->
            <div class="col-md-6">
                <label class="form-label">Background Image</label>
                <input type="file" name="hero_bg" class="form-control">
                @if(!empty($meta['hero_image']))
                    <div class="mt-2">
                        <p class="mb-1">Current Background:</p>
                        <img src="{{ asset('storage/'.$meta['hero_image']) }}" class="rounded" width="200">
                    </div>
                @endif
            </div>

            <!-- Right Side Image -->
            <div class="col-md-6">
                <label class="form-label">Right Side Image</label>
                <input type="file" name="hero_right" class="form-control">
                @if(!empty($meta['hero_right_image']))
                    <div class="mt-2">
                        <p class="mb-1">Current Right Image:</p>
                        <img src="{{ asset('storage/'.$meta['hero_right_image']) }}" class="rounded" width="200">
                    </div>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-4 d-flex justify-content-end gap-2">
            <a href="{{ route('admin.aboutus.story.index') }}" class="btn btn-secondary">Cancel</a>

            @if(!empty($hero))
                <form action="{{ route('admin.aboutus.story.hero.delete') }}" method="POST" onsubmit="return confirm('Delete hero section?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete Hero</button>
                </form>
            @endif

            <button type="submit" class="btn btn-primary">Save Hero</button>
        </div>
    </form>
</div>
@endsection
