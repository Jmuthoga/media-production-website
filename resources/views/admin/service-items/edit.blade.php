@extends('admin.layouts.app')
@section('content')
<h3>Edit Service</h3>
<form action="{{ route('admin.service-items.update', $serviceItem->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input class="form-control" name="title" value="{{ $serviceItem->title }}" required>
    </div>
    <div class="mb-3">
        <label>Slug</label>
        <input class="form-control" name="slug" value="{{ $serviceItem->slug }}" required>
    </div>
    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            @foreach(\App\Models\Category::all() as $cat)
            <option value="{{ $cat->id }}" @if($serviceItem->category_id==$cat->id) selected @endif>{{ $cat->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea class="form-control" name="description">{{ $serviceItem->description }}</textarea>
    </div>
    <div class="form-check">
        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" @if($serviceItem->is_active) checked @endif>
        <label for="is_active" class="form-check-label">Active</label>
    </div>
    <button class="btn btn-primary mt-3">Update</button>
</form>
@endsection