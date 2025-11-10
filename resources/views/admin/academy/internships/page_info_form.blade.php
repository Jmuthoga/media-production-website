@extends('admin.layouts.app')

@section('title', 'Internship Page Info')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">{{ $pageInfo ? 'Edit' : 'Create' }} Internship Page Info</h1>
        <a href="{{ route('internships.index') }}" class="btn btn-outline-secondary">Back to Items</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('internships.pageinfo.save') }}" method="POST">
                @csrf

                <!-- About Section -->
                <h5 class="mb-3">About Section</h5>
                <div class="mb-3">
                    <label class="form-label">About Paragraph 1</label>
                    <textarea name="about1" class="form-control" rows="3" required>{{ old('about1', $pageInfo->meta['about_paragraph1'] ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">About Paragraph 2</label>
                    <textarea name="about2" class="form-control" rows="3" required>{{ old('about2', $pageInfo->meta['about_paragraph2'] ?? '') }}</textarea>
                </div>

                <!-- YouTube Video Link -->
                <h5 class="mt-4 mb-3">YouTube Video</h5>
                <div class="mb-3">
                    <label class="form-label">Video Link</label>
                    <input type="url" name="video_link" class="form-control" 
                           value="{{ old('video_link', $pageInfo->meta['video_link'] ?? '') }}">
                    <small class="text-muted">Example: https://www.youtube.com/watch?v=nXo4uQ1iA3Y</small>
                </div>

                <!-- Stats Section (all 4 stats, 2 per row) -->
                <h5 class="mt-4 mb-3">Stats</h5>
                @php
                    $stats = $pageInfo->meta['stats'] ?? [
                        ['title'=>'Successful Interns','value'=>0],
                        ['title'=>'Mentors & Staff','value'=>0],
                        ['title'=>'Projects Completed','value'=>0],
                        ['title'=>'Years Running','value'=>0],
                    ];
                @endphp

                <div class="row">
                    @foreach($stats as $i => $stat)
                        <div class="col-md-6 mb-3">
                            <div class="card p-2 h-100">
                                <input type="text" name="stats[{{$i}}][title]" class="form-control mb-2" 
                                       value="{{ old("stats.$i.title", $stat['title']) }}" placeholder="Stat Title" required>
                                <input type="number" name="stats[{{$i}}][value]" class="form-control" 
                                       value="{{ old("stats.$i.value", $stat['value']) }}" placeholder="Value" required>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Form Buttons -->
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('internships.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button class="btn btn-primary" type="submit">Save Page Info</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection




