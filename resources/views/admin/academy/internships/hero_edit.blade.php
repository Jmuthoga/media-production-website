@extends('admin.layouts.app')

@section('title', 'Edit Hero Section')

@section('content')
<div class="container py-4">
    <h1>Edit Hero Section</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('internships.hero.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $hero->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $hero->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Background Image</label>
            <input type="file" name="hero_bg" class="form-control">
            @if(!empty($hero->meta['hero_image']))
                <img src="{{ asset('storage/'.$hero->meta['hero_image']) }}" class="img-fluid mt-2" style="max-height:150px;">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Right Side Image</label>
            <input type="file" name="hero_right" class="form-control">
            @if(!empty($hero->meta['hero_right_image']))
                <img src="{{ asset('storage/'.$hero->meta['hero_right_image']) }}" class="img-fluid mt-2" style="max-height:150px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Hero</button>
    </form>
</div>
@endsection
