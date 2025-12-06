@extends('admin.layouts.app')

@section('title', 'Edit Product Photography')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Product Photography</h1>

    <form action="{{ route('admin.photography.product.update', $product) }}"
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
                    value="{{ old('title', $product->title) }}"
                    required>
            </div>

            <!-- Description / Content -->
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description"
                    rows="4"
                    class="form-control">{{ old('description', $product->description ?? $product->content) }}</textarea>
            </div>

            <!-- Hero Image -->
            <div class="col-md-6">
                <label class="form-label">Hero Image</label>
                <input type="file" name="hero_image" class="form-control">
                @if($product->hero_image)
                <img src="{{ asset('storage/'.$product->hero_image) }}"
                    class="img-fluid rounded mt-2"
                    style="max-height:150px;">
                @endif
            </div>

            <!-- Hero Right Image -->
            <div class="col-md-6">
                <label class="form-label">Hero Right Image</label>
                <input type="file" name="hero_right_image" class="form-control">
                @if($product->hero_right_image)
                <img src="{{ asset('storage/'.$product->hero_right_image) }}"
                    class="img-fluid rounded mt-2"
                    style="max-height:150px;">
                @endif
            </div>

            <!-- Gallery Images -->
            <div class="col-12">
                <label class="form-label">Gallery Images (Upload More)</label>
                <input type="file" name="gallery[]" multiple class="form-control">

                @if(!empty($product->gallery))
                <div class="d-flex flex-wrap gap-2 mt-2">
                    @foreach($product->gallery as $img)
                    <img src="{{ asset('storage/'.$img) }}"
                        class="img-fluid rounded"
                        style="width:80px; height:80px; object-fit:cover;">
                    @endforeach
                </div>
                @endif
            </div>

        </div>

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('admin.photography.product.index') }}"
                class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
</div>
@endsection