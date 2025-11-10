@extends('admin.layouts.app')

@section('title', 'Add Internship / Attachment')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Add Internship / Attachment</h1>

    <form action="{{ route('internships.store') }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
        @csrf

        <div class="row g-3">
            <!-- Title -->
            <div class="col-md-6">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <!-- Organization -->
            <div class="col-md-6">
                <label class="form-label">Organization</label>
                <input type="text" name="organization" class="form-control" value="{{ old('organization') }}">
            </div>

            <!-- Duration -->
            <div class="col-md-6">
                <label class="form-label">Duration</label>
                <input type="text" name="duration" class="form-control" placeholder="e.g. 3 months" value="{{ old('duration') }}">
            </div>

            <!-- Type (excluding hero & role) -->
            <div class="col-md-6">
                <label class="form-label">Type <span class="text-danger">*</span></label>
                <select name="type" id="type" class="form-select" required>
                    <option value="">-- Select Type --</option>
                    <option value="stat" {{ old('type')=='stat' ? 'selected' : '' }}>Statistic</option>
                    <option value="offer" {{ old('type')=='offer' ? 'selected' : '' }}>Offer</option>
                    <option value="requirement" {{ old('type')=='requirement' ? 'selected' : '' }}>Requirement</option>
                </select>
            </div>

            <!-- Apply Link -->
            <div class="col-md-6 optional-field type-offer">
                <label class="form-label">Apply Link</label>
                <input type="url" name="apply_link" class="form-control" value="{{ old('apply_link') }}">
            </div>

            <!-- Icon -->
            <div class="col-md-6 optional-field type-stat type-offer type-requirement">
                <label class="form-label">Icon (Bootstrap class)</label>
                <input type="text" name="icon" class="form-control" placeholder="e.g. bi-camera-fill" value="{{ old('icon') }}">
            </div>

            <!-- Stat Value -->
            <div class="col-md-6 optional-field type-stat">
                <label class="form-label">Stat Value</label>
                <input type="number" name="stat_value" class="form-control" value="{{ old('stat_value') }}">
            </div>

            <!-- Image -->
            <div class="col-md-6 optional-field type-offer">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <!-- Description -->
            <div class="col-12">
                <label class="form-label">Description <span class="text-danger">*</span></label>
                <textarea name="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('internships.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const typeSelect = document.getElementById('type');
    const optionalFields = document.querySelectorAll('.optional-field');

    function toggleFields() {
        const selected = typeSelect.value;
        optionalFields.forEach(field => {
            field.style.display = field.classList.contains('type-' + selected) ? '' : 'none';
        });
    }

    typeSelect.addEventListener('change', toggleFields);
    toggleFields(); // Run once on load
});
</script>
@endpush
