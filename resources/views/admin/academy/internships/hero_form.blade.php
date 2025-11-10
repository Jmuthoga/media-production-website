@extends('admin.layouts.app')

@section('title', $hero ? 'Edit Hero Section' : 'Create Hero Section')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">{{ $hero ? 'Edit Hero Section' : 'Create Hero Section' }}</h1>
        <a href="{{ route('internships.index') }}" class="btn btn-outline-secondary">Back to List</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('internships.hero.save') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <!-- Title -->
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $hero->title ?? '') }}" required>
                    </div>

                    <!-- Description -->
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ old('description', $hero->description ?? '') }}</textarea>
                    </div>

                    <!-- Background Image -->
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Background Image</label>
                        <input type="file" name="hero_bg" class="form-control">
                        @if(!empty($hero->meta['hero_image']))
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$hero->meta['hero_image']) }}" class="img-fluid rounded" style="max-height:150px;">
                            </div>
                        @endif
                    </div>

                    <!-- Right Side Image -->
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Right Side Image</label>
                        <input type="file" name="hero_right" class="form-control">
                        @if(!empty($hero->meta['hero_right_image']))
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$hero->meta['hero_right_image']) }}" class="img-fluid rounded" style="max-height:150px;">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ $hero ? 'Update Hero' : 'Create Hero' }}
                    </button>
                    <a href="{{ route('internships.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

