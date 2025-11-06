@extends('admin.layouts.app')

@section('content')
<h3>Service Items</h3>
<a href="{{ route('admin.service-items.create') }}" class="btn btn-primary mb-3">Add Service</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($serviceItems as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->title }}</td>
            <td>{{ $s->category->title ?? '-' }}</td>
            <td>{{ $s->is_active ? 'Yes' : 'No' }}</td>
            <td>
                <a href="{{ route('admin.service-items.edit', $s->id) }}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('admin.service-items.destroy', $s->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection