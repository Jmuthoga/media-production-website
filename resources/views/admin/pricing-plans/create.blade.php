@extends('admin.layouts.app')
@section('content')
<h3>Add Pricing Plan</h3>
<form action="{{ route('admin.pricing-plans.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input class="form-control" name="title" required>
    </div>
    <div class="mb-3">
        <label>Price (KES)</label>
        <input class="form-control" name="price" required>
    </div>
    <div class="mb-3">
        <label>Features</label>
        <textarea class="form-control" name="features" rows="4"></textarea>
    </div>
    <button class="btn btn-primary">Save</button>
</form>
@endsection