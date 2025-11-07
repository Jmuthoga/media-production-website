@extends('layouts.app')

@section('title', 'Family Videography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/videography/family.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="videography-hero"
    style="background: linear-gradient(120deg, rgba(27, 38, 59, 0.9), rgba(65, 90, 119, 0.8)),
            url('https://images.unsplash.com/photo-1605902711622-cfb43c443c3f?q=80&w=1600&auto=format&fit=crop') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>Family Videography — Capture Motion & Emotion</h1>
            <p>From newborn giggles to grandparent stories, we craft cinematic family videos that celebrate connection, joy, and life’s unforgettable moments — beautifully preserved forever.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Session</a>
                <a href="#portfolio" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" autoplay muted loop playsinline></video>
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="portfolio">

    <!-- ===== SLIDER ===== -->
    <section class="slider" id="videoSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                <div class="caption">
                    <h4>Outdoor Family Videos</h4>
                    <p>Natural moments captured in motion.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <video src="https://www.w3schools.com/html/movie.mp4" controls></video>
                <div class="caption">
                    <h4>Indoor Comfort Stories</h4>
                    <p>Cozy, candid family moments on film.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
            <div class="thumb" data-index="1"><video src="https://www.w3schools.com/html/movie.mp4"></video></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-camera-video-fill"></i>
            <h4>Family Video Sessions</h4>
            <p>Cinematic storytelling of your family's laughter, love, and life moments.</p>
        </div>
        <div class="service"><i class="bi bi-film"></i>
            <h4>Indoor & Outdoor Shoots</h4>
            <p>Capture family memories anywhere — at home or amidst nature.</p>
        </div>
        <div class="service"><i class="bi bi-play-btn-fill"></i>
            <h4>High-Quality Videos</h4>
            <p>Professional videos ready for sharing, keepsakes, or social media.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"The videography team captured our family moments beautifully — the videos made us relive our favorite memories!"</p>
            <div class="who">— The Njoroge Family</div>
        </div>
        <div class="testimonial">
            <p>"Our story in motion! The kids were thrilled and the results were stunning."</p>
            <div class="who">— Sarah & Paul</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statClients">0</h3>
            <p>Happy Families</p>
        </div>
        <div class="stat">
            <h3 id="statLocations">0</h3>
            <p>Video Locations</p>
        </div>
        <div class="stat">
            <h3 id="statMemories">0</h3>
            <p>Videos Captured</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years Experience</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Preserve Your Family’s Story in Motion</h3>
            <p>Let’s create cinematic videos that remind you of life’s most precious moments — love, joy, and togetherness.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Your Session</a>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/videography/family.js') }}"></script>
@endpush