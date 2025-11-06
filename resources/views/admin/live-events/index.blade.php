@extends('admin.layouts.app')
@section('content')
<h3>Live Events</h3>
<a href="{{ route('admin.live-events.create') }}" class="btn btn-primary mb-3">Add Event</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Stream URL</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($liveEvents as $ev)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ev->title }}</td>
            <td>{{ $ev->slug }}</td>
            <td><a href="{{ $ev->stream_url }}" target="_blank">Watch</a></td>
            <td>
                <a href="{{ route('admin.live-events.edit',$ev) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.live-events.destroy',$ev) }}" method="POST" style="display:inline">@csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection