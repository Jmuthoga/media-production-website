@extends('layouts.app')

@section('title', 'Our Story & Mission')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/aboutus/our-story.css') }}">
@endpush

@section('content')

@php
$heroBgUrl = !empty($heroMeta['hero_image'])
    ? asset('storage/'.$heroMeta['hero_image'])
    : 'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=1600&auto=format&fit=crop';

$heroRightUrl = !empty($heroMeta['hero_right_image'])
    ? asset('storage/'.$heroMeta['hero_right_image'])
    : $heroBgUrl;

$about1 = $pageMeta['about_paragraph1'] ?? 'Founded on creativity and innovation, JM Innovatech Photography has grown into a trusted name in visual storytelling.';
$about2 = $pageMeta['about_paragraph2'] ?? 'From weddings and corporate events to brand campaigns and studio productions — our team ensures excellence in every frame.';
$videoId = $pageMeta['video_id'] ?? 'nXo4uQ1iA3Y';
@endphp

<!-- === Hero Section === -->
<section class="about-hero" style="background: linear-gradient(rgba(0,43,255,0.65), rgba(0,85,255,0.65)), url('{{ $heroBgUrl }}') center/cover no-repeat;">
    <canvas id="tech-lines"></canvas>
    <div class="content">
        <div class="text-box">
            <h2>{{ $hero->title ?? 'Who Are We – Why Us?' }}</h2>
            <p>{{ $hero->description ?? 'At JM Innovatech Photography, we are more than just a creative studio — we’re storytellers driven by passion, precision, and purpose.' }}</p>
        </div>

        <img src="{{ $heroRightUrl }}" alt="Our Team">
    </div>
</section>

<!-- === About Company + YouTube + Counters === -->
<section class="about-company-section py-5">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <!-- Left: About Text -->
            <div class="col-lg-6">
                <h2>About Us</h2>
                <p class="text-muted" style="line-height: 1.8;">{{ $about1 }}</p>
                <p class="text-muted" style="line-height: 1.8;">{{ $about2 }}</p>

                <!-- Stats -->
                <div class="row text-center mt-4">
                    @foreach ($stats->take(2) as $stat)
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-primary">
                            {{ $stat['value'] ?? 0 }}+
                        </h3>
                        <p class="text-muted mb-0">{{ $stat['title'] ?? 'Stat' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right: YouTube Video -->
            <div class="col-lg-6 text-center">
                <div class="video-box shadow-lg rounded overflow-hidden position-relative">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=0&mute=1&rel=0&showinfo=0"
                        title="JM Innovatech Photography Intro" frameborder="0" allowfullscreen>
                    </iframe>
                </div>

                <div class="row text-center mt-4">
                    @foreach ($stats->slice(2,2) as $stat)
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-success">
                            {{ $stat['value'] ?? 0 }}+
                        </h3>
                        <p class="text-muted mb-0">{{ $stat['title'] ?? 'Stat' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- === FAQ Section === -->
<section class="faq-section py-5" style="background: #fafafa; font-family: 'Poppins', sans-serif;">
    <div class="container">
        <div class="row align-items-start g-5">
            <!-- FAQs -->
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4 position-relative d-inline-block" style="color: #001f5b;">
                    Frequently Asked Questions
                    <span class="underline-animation"></span>
                </h2>
                <div class="accordion" id="faqAccordion">
                    @forelse ($faqMeta['faqs'] ?? [] as $index => $item)
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded-3">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-semibold text-dark bg-white"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $index }}"
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $index }}">
                                {{ $item['question'] }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary">
                                {{ $item['answer'] }}
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-muted">No FAQs available at the moment.</p>
                    @endforelse
                </div>
            </div>

            <!-- Side Feature -->
            <div class="col-lg-6">
                @php
                $sideImage = !empty($faqMeta['side_image'])
                    ? asset('storage/'.$faqMeta['side_image'])
                    : 'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=800&auto=format&fit=crop';
                @endphp

                <div class="p-4 rounded-4 shadow-sm bg-white text-center">
                    <h3 class="fw-bold mb-3" style="color: #001f5b;">Need More Information?</h3>
                    <p class="text-secondary mb-4">
                        Can’t find what you’re looking for? Our team is ready to help — feel free to get in touch anytime.
                    </p>
                    <a href="{{ route('contact') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-envelope-fill me-2"></i> Contact Support
                    </a>
                    <div class="mt-5">
                        <img src="{{ $sideImage }}" alt="Support Team" class="img-fluid rounded-3" style="max-height: 250px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- === Clients Section === -->
<section class="our-clients-section py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4" style="color: #001f5b;">Our Clients</h2>
        <p class="text-muted mb-5">We’re proud to have collaborated with these amazing brands and organizations.</p>

        <div class="clients-slider">
            <div class="clients-track">
                @forelse ($clients as $client)
                   <img src="{{ asset('storage/'.$client->image) }}" 
                        alt="{{ $client->title }}"
                        style="height: 160px; width: auto; object-fit: contain; margin: 0 40px; filter: grayscale(0%); transition: transform 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.05)';"
                        onmouseout="this.style.transform='scale(1)';">
                @empty
                    <p class="text-muted">No clients uploaded yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/public/aboutus/our-story.js') }}"></script>
@endpush
