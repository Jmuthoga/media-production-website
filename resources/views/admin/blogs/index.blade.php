@extends('admin.layouts.app')
@section('content')
<h3>Blogs</h3>
<a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">New Blog</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Published</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $b)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $b->title }}</td>
            <td>{{ $b->slug }}</td>
            <td>{{ $b->published ? 'Yes' : 'No' }}</td>
            <td>
                <a href="{{ route('admin.blogs.edit',$b) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.blogs.destroy',$b) }}" method="POST" style="display:inline">@csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection