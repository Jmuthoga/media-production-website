@extends('admin.layouts.app')

@section('title', 'FAQ & Side Feature')

@section('content')
<div class="container py-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold">{{ $faqSection ? 'Edit' : 'Create' }} FAQ & Side Feature</h1>
        <a href="{{ route('admin.aboutus.story.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to Items
        </a>
    </div>

    <!-- Form Card -->
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('admin.aboutus.story.faq.save') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @php
                    $meta = $faqSection?->meta ? json_decode($faqSection->meta, true) : [];
                    $faqs = $meta['faqs'] ?? [['question' => '', 'answer' => '']];
                @endphp

                <!-- FAQ Section -->
                <h5 class="mb-3 text-primary fw-bold">FAQs</h5>
                <div id="faq-container">
                    @foreach($faqs as $i => $faq)
                        <div class="card p-3 mb-3 faq-row border border-secondary rounded-3 shadow-sm">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Question</label>
                                <input type="text" name="faqs[{{ $i }}][question]" class="form-control" value="{{ $faq['question'] }}" placeholder="Enter question" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Answer</label>
                                <textarea name="faqs[{{ $i }}][answer]" class="form-control" rows="3" placeholder="Enter answer" required>{{ $faq['answer'] }}</textarea>
                            </div>
                            <button type="button" class="btn btn-outline-danger btn-sm fw-semibold remove-faq">
                                <i class="bi bi-trash"></i> Remove FAQ
                            </button>
                        </div>
                    @endforeach
                </div>

                <div class="d-grid mb-4">
                    <button type="button" class="btn btn-outline-primary fw-semibold" id="add-faq">
                        <i class="bi bi-plus-circle"></i> Add FAQ
                    </button>
                </div>

                <!-- Side Feature Image -->
                <h5 class="mb-3 text-primary fw-bold">Side Feature Image</h5>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Image</label>
                    <input type="file" name="side_image" class="form-control">
                    @if(!empty($meta['side_image']))
                        <img src="{{ asset('storage/'.$meta['side_image']) }}" class="mt-3 rounded shadow-sm" width="250">
                    @endif
                </div>

                <!-- Form Buttons -->
                <div class="d-flex justify-content-end mt-4 gap-2">
                    <a href="{{ route('admin.aboutus.story.index') }}" class="btn btn-secondary fw-semibold">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                    <button class="btn btn-success fw-semibold" type="submit">
                        <i class="bi bi-save"></i> Save FAQ & Image
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    let faqIndex = {{ count($faqs) }};
    const container = document.getElementById('faq-container');
    const addBtn = document.getElementById('add-faq');

    addBtn.addEventListener('click', () => {
        const div = document.createElement('div');
        div.className = 'card p-3 mb-3 faq-row border border-secondary rounded-3 shadow-sm';
        div.innerHTML = `
            <div class="mb-3">
                <label class="form-label fw-semibold">Question</label>
                <input type="text" name="faqs[${faqIndex}][question]" class="form-control" placeholder="Enter question" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Answer</label>
                <textarea name="faqs[${faqIndex}][answer]" class="form-control" rows="3" placeholder="Enter answer" required></textarea>
            </div>
            <button type="button" class="btn btn-outline-danger btn-sm fw-semibold remove-faq">
                <i class="bi bi-trash"></i> Remove FAQ
            </button>
        `;
        container.appendChild(div);
        faqIndex++;
    });

    container.addEventListener('click', e => {
        if (e.target.classList.contains('remove-faq') || e.target.closest('.remove-faq')) {
            e.target.closest('.faq-row').remove();
        }
    });
});
</script>
@endpush
@endsection






