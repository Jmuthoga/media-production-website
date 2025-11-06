@extends('admin.layouts.app')
@section('content')
<h3>Create Blog Post</h3>
<form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3"><label>Title</label><input name="title" class="form-control"></div>
    <div class="mb-3"><label>Slug</label><input name="slug" class="form-control"></div>
    <div class="mb-3"><label>Image</label><input type="file" name="image" class="form-control"></div>
    <div class="mb-3"><label>Excerpt</label><textarea name="excerpt" class="form-control"></textarea></div>
    <div class="mb-3"><label>Content</label><textarea name="content" class="form-control" rows="6"></textarea></div>
    <div class="form-check mb-3"><input type="checkbox" name="published" class="form-check-input"> Publish</div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection