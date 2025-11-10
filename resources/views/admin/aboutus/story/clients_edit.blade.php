@extends('admin.layouts.app')

@section('title', 'Edit Client')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Client</h1>

    <form action="{{ route('admin.aboutus.story.clients.update', $client) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Client Title</label>
            <input type="text" name="title" class="form-control" value="{{ $client->title }}">
        </div>

        <div class="mb-3">
            <label>Client Image</label>
            <input type="file" name="image" class="form-control">
            @if($client->image)
                <img src="{{ asset('storage/'.$client->image) }}" class="mt-2 rounded shadow-sm" style="max-height:100px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Client</button>
        <a href="{{ route('admin.aboutus.story.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
