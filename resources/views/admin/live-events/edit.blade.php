@extends('admin.layouts.app')

@section('content')
<h3>Edit Live Event</h3>

<form action="{{ route('admin.live-events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Title</label>
        <input name="title" value="{{ old('title', $event->title) }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Slug</label>
        <input name="slug" value="{{ old('slug', $event->slug) }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stream URL (YouTube/Facebook Embed)</label>
        <input name="stream_url" value="{{ old('stream_url', $event->stream_url) }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description', $event->description) }}</textarea>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.live-events.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection