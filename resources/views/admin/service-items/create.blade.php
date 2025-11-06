@extends('admin.layouts.app')
@section('content')
<h3>Add Service</h3>
<form action="{{ route('admin.service-items.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input class="form-control" name="title" required>
    </div>
    <div class="mb-3">
        <label>Slug</label>
        <input class="form-control" name="slug" required>
    </div>
    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            @foreach(\App\Models\Category::all() as $cat)
            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <div class="form-check">
        <input type="checkbox" name="is_active" class="form-check-input" id="is_active">
        <label for="is_active" class="form-check-label">Active</label>
    </div>
    <button class="btn btn-primary mt-3">Save</button>
</form>
@endsection