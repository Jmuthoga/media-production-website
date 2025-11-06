@extends('admin.layouts.app')

@section('content')
<h3>Pricing Plans</h3>
<a href="{{ route('admin.pricing-plans.create') }}" class="btn btn-primary mb-3">Add Plan</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Price</th>
            <th>Features</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pricingPlans as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->title }}</td>
            <td>{{ $p->price }}</td>
            <td>{{ $p->features }}</td>
            <td>
                <a href="{{ route('admin.pricing-plans.edit',$p->id) }}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('admin.pricing-plans.destroy',$p->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection