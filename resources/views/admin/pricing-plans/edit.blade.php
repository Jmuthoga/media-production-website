@extends('admin.layouts.app')
@section('content')
<h3>Edit Pricing Plan</h3>
<form action="{{ route('admin.pricing-plans.update', $pricingPlan->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input class="form-control" name="title" value="{{ $pricingPlan->title }}" required>
    </div>
    <div class="mb-3">
        <label>Price (KES)</label>
        <input class="form-control" name="price" value="{{ $pricingPlan->price }}" required>
    </div>
    <div class="mb-3">
        <label>Features</label>
        <textarea class="form-control" name="features" rows="4">{{ $pricingPlan->features }}</textarea>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection