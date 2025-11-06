@extends('admin.layouts.app')
@section('content')
<h3>Create Live Event</h3>
<form action="{{ route('admin.live-events.store') }}" method="POST">
    @csrf
    <div class="mb-3"><label>Title</label><input name="title" class="form-control"></div>
    <div class="mb-3"><label>Slug</label><input name="slug" class="form-control"></div>
    <div class="mb-3"><label>Stream URL (YouTube/Facebook Embed)</label><input name="stream_url" class="form-control"></div>
    <div class="mb-3"><label>Description</label><textarea name="description" class="form-control"></textarea></div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection