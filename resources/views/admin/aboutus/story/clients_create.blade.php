@extends('admin.layouts.app')

@section('title', 'Add Client')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Add New Client</h1>

    <form action="{{ route('admin.aboutus.story.clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Client Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter client name">
        </div>

        <div class="mb-3">
            <label>Client Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save Client</button>
        <a href="{{ route('admin.aboutus.story.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
