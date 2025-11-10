@extends('layouts.app')

@section('title', 'Internship & Attachment')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/aboutus/internship.css') }}">
@endpush

@section('content')

@php
// Ensure meta exists
$heroMeta = $hero->meta ?? [];
$pageMeta = $page->meta ?? [];

// Hero images with fallback
$heroBgUrl = !empty($heroMeta['hero_image']) 
    ? asset('storage/'.$heroMeta['hero_image']) 
    : 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1600&q=80';

$heroRightUrl = !empty($heroMeta['hero_right_image']) 
    ? asset('storage/'.$heroMeta['hero_right_image']) 
    : $heroBgUrl;

// About paragraphs with fallback
$about1 = $pageMeta['about_paragraph1'] ?? 'Our Internship program is 3 months full-time, while the Attachment program is 1 month. Participants gain real project experience, mentorship, and professional skill development.';
$about2 = $pageMeta['about_paragraph2'] ?? 'Access professional equipment, build a portfolio, and network with industry experts to kickstart your creative career.';

// Video ID with fallback
$videoId = $pageMeta['video_id'] ?? 'nXo4uQ1iA3Y';

// Stats helper (array access)
$statValue = fn($stats, $index) => $stats[$index]['value'] ?? 0;
@endphp

<!-- Hero Section -->
<section class="internship-hero" style="background: linear-gradient(rgba(0,43,255,0.65), rgba(0,85,255,0.65)), url('{{ $heroBgUrl }}') center/cover no-repeat;">
    <div class="content">
        <div class="text-box">
            <h2>{{ $hero->title ?? 'Join Our Internship & Attachment Programs' }}</h2>
            <p>{{ $hero->description ?? 'Hands-on training, mentorship, and real project experience...' }}</p>
        </div>
        <img src="{{ $heroRightUrl }}" alt="Internship Team">
    </div>
</section>

<!-- Internship Section -->
<section class="internship-section py-5">
    <div class="container py-4">
        <div class="row align-items-center g-5">

            <!-- Left Column: About + first 2 stats -->
            <div class="col-lg-6">
                <h2>About Our Programs</h2>
                <p class="text-muted" style="line-height:1.8;">
                    {{ $page->meta['about_paragraph1'] ?? 'Our Internship program is 3 months full-time, while the Attachment program is 1 month. Participants gain real project experience, mentorship, and professional skill development.' }}
                </p>
                <p class="text-muted" style="line-height:1.8;">
                    {{ $page->meta['about_paragraph2'] ?? 'Access professional equipment, build a portfolio, and network with industry experts to kickstart your creative career.' }}
                </p>

                <div class="row text-center mt-4">
                    @foreach($stats->slice(0,2) as $index => $stat)
                        <div class="col-6 mb-3">
                            <h3 class="fw-bold text-primary">
                                {{ $stat['value'] ?? 0 }}+
                            </h3>
                            <p class="text-muted mb-0">{{ $stat['title'] ?? 'Stat Title' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Column: Video + remaining 2 stats -->
            <div class="col-lg-6 text-center">
                <div class="video-box shadow-lg rounded overflow-hidden position-relative mb-4">
                    <iframe 
                        width="100%" 
                        height="315" 
                        src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&rel=0&showinfo=0&loop=1&playlist={{ $videoId }}&playsinline=1" 
                        title="Internship Overview" 
                        frameborder="0" 
                        allow="autoplay; encrypted-media" 
                        allowfullscreen>
                    </iframe>
                </div>

                <div class="row text-center">
                    @foreach($stats->slice(2,2) as $index => $stat)
                        <div class="col-6 mb-3">
                            <h3 class="fw-bold text-success">
                                {{ $stat['value'] ?? 0 }}+
                            </h3>
                            <p class="text-muted mb-0">{{ $stat['title'] ?? 'Stat Title' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>



<!-- Roles Section -->
<section class="roles-section py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5"
            style="background: linear-gradient(90deg, #0d6efd, #00c6ff, #0072ff);
           -webkit-background-clip: text;
           -webkit-text-fill-color: transparent;
           font-weight: 700;
           letter-spacing: 1px;">
            Join Our Creative Team
        </h2>
        <div class="row g-4">
            @foreach ($roles as $role)
            @php
            $meta = $role->meta ? json_decode($role->meta, true) : [];
            $roleImage = $role->image ? asset('storage/'.$role->image) : ($meta['image'] ?? 'https://images.unsplash.com/photo-1524635962361-f25b8c3fcf83?auto=format&fit=crop&w=800&q=80');
            $status = strtolower($meta['status'] ?? 'open');
            @endphp
            <div class="col-md-4">
                <div class="role-card">
                    <div class="role-bg" style="background-image: url('{{ $roleImage }}');"></div>
                    <div class="role-overlay"></div>
                    <div class="role-content">
                        <h3 class="role-title"><i class="{{ $role->icon ?? 'bi bi-camera-fill' }}"></i> {{ $role->title }}</h3>
                        <span class="role-status {{ $status }}">{{ ucfirst($status) }}</span>

                        @if ($status === 'open' && $role->apply_link)
                            <a href="{{ $role->apply_link }}" class="btn btn-apply">Apply Now</a>
                        @elseif ($status === 'open')
                            <a href="#" class="btn btn-apply">Apply Now</a>
                        @else
                            <a href="#" class="btn btn-closed">Closed</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- What We Offer Section -->
<section class="offer-section py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">What We Offer</h2>
        <div class="row g-4">
            @foreach ($offers as $offer)
            <div class="col-md-6">
                <div class="offer-card">
                    <i class="{{ $offer->icon ?? 'bi bi-camera-fill' }}"></i>
                    <h4>{{ $offer->title }}</h4>
                    <p>{{ $offer->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Requirements Section -->
<section class="requirements-section py-5 bg-gradient-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Requirements</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <ul class="requirements-list">
                    @foreach ($requirements->slice(0,2) as $req)
                    <li><i class="{{ $req->icon ?? 'bi bi-lightning-fill' }}"></i>{{ $req->title }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="requirements-list">
                    @foreach ($requirements->slice(2,2) as $req)
                    <li><i class="{{ $req->icon ?? 'bi bi-clock-fill' }}"></i>{{ $req->title }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/public/aboutus/internship.js') }}"></script>
@endpush

