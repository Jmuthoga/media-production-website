@extends('admin.layouts.app')

@section('title', 'Add Our Story Section')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Add Our Story Section</h1>

    <form action="{{ route('admin.aboutus.story.store') }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
        @csrf

        <div class="row g-3">
            <!-- Section Type -->
            <div class="col-md-6">
                <label class="form-label">Section Type <span class="text-danger">*</span></label>
                <select name="type" id="type" class="form-select" required>
                    <option value="">-- Select Type --</option>
                    <option value="hero" {{ old('type')=='hero' ? 'selected' : '' }}>Hero</option>
                    <option value="about" {{ old('type')=='about' ? 'selected' : '' }}>About / Page Info</option>
                    <option value="counter" {{ old('type')=='counter' ? 'selected' : '' }}>Counter</option>
                    <option value="faq" {{ old('type')=='faq' ? 'selected' : '' }}>FAQ</option>
                    <option value="side_feature" {{ old('type')=='side_feature' ? 'selected' : '' }}>Side Feature</option>
                    <option value="client" {{ old('type')=='client' ? 'selected' : '' }}>Client</option>
                </select>
            </div>

            <!-- Title / FAQ Question -->
            <div class="col-md-6 optional-field type-hero type-about type-counter type-faq type-side_feature type-client">
                <label class="form-label">Title / Question</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>

            <!-- Description / FAQ Answer / About Text -->
            <div class="col-12 optional-field type-hero type-about type-counter type-faq type-side_feature">
                <label class="form-label">Description / Content</label>
                <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
            </div>

            <!-- Image -->
            <div class="col-md-6 optional-field type-hero type-side_feature type-client">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <!-- Stat Value / Counter -->
            <div class="col-md-6 optional-field type-counter">
                <label class="form-label">Stat Value</label>
                <input type="number" name="stat_value" class="form-control" value="{{ old('stat_value') }}">
            </div>

            <!-- Meta / Extra Data -->
            <div class="col-12 optional-field type-counter type-client">
                <label class="form-label">Extra Data (JSON)</label>
                <textarea name="meta" rows="2" class="form-control" placeholder='e.g. {"label":"Projects Completed","alt":"Client Logo"}'>{{ old('meta') }}</textarea>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('admin.aboutus.story.index') }}" class="btn btn-secondary me-2">Cancel</a>
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

