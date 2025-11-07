@extends('layouts.app')

@section('title', 'Parties & Concerts Videography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/videography/parties.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="party-hero"
    style="background: linear-gradient(120deg, var(--rose-overlay), var(--rose-overlay)),
            url('https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?q=80&w=1200&auto=format&fit=crop') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>Parties & Concerts Videography</h1>
            <p>Bring your events to life with vibrant video coverage. From DJ nights to festivals, capture every beat and every smile.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Videographer</a>
                <a href="#portfolio" class="btn-outline-light">View Sample Videos</a>
            </div>
        </div>
        <div class="hero-right">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" autoplay muted loop></video>
        </div>
    </div>
</section>

<div class="page-container" id="portfolio">
    <!-- ===== VIDEO SLIDER ===== -->
    <section style="margin-top:5rem">
        <div class="slider" id="videoSlider">
            <div class="slider-main">
                <div class="slide active">
                    <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                    <div class="caption">
                        <h4>DJ Night Highlights</h4>
                        <p>Energetic crowd, lights, and music captured seamlessly.</p>
                    </div>
                </div>
                <div class="slide">
                    <video src="https://www.w3schools.com/html/movie.mp4" controls></video>
                    <div class="caption">
                        <h4>Concert Vibes</h4>
                        <p>Performers and audience moments filmed professionally.</p>
                    </div>
                </div>
                <div class="slide">
                    <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                    <div class="caption">
                        <h4>Festival Aftermovie</h4>
                        <p>Outdoor events captured in cinematic style.</p>
                    </div>
                </div>

                <div class="slider-controls">
                    <button id="prevBtn">◀</button><button id="nextBtn">▶</button>
                </div>
                <div class="autoplay-indicator" id="autoplayIndicator">Auto • On</div>
            </div>

            <aside class="slider-thumbs">
                <div class="thumb active"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
                <div class="thumb"><video src="https://www.w3schools.com/html/movie.mp4"></video></div>
                <div class="thumb"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
            </aside>
        </div>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-camera-video-fill"></i>
            <h4>Dynamic Event Coverage</h4>
            <p>Capture every high-energy moment from start to finish.</p>
        </div>
        <div class="service"><i class="bi bi-lightning-fill"></i>
            <h4>Concert Videography</h4>
            <p>Professional coverage for performers and audience interactions.</p>
        </div>
        <div class="service"><i class="bi bi-music-note-beamed"></i>
            <h4>Aftermovie Production</h4>
            <p>Highlight reels and cinematic event videos for marketing or memories.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"The videography team captured the party energy perfectly — it felt like we were back at the event!"</p>
            <div class="who">— DJ Matrix</div>
        </div>
        <div class="testimonial">
            <p>"Our concert coverage videos were amazing — professional and lively!"</p>
            <div class="who">— Event Planner, VibeX</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statClients">0</h3>
            <p>Happy Clients</p>
        </div>
        <div class="stat">
            <h3 id="statEvents">0</h3>
            <p>Events Covered</p>
        </div>
        <div class="stat">
            <h3 id="statVideos">0</h3>
            <p>Videos Delivered</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years of Experience</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Relive Your Event Through Videography</h3>
            <p>Book our team for your next party, concert, or festival and capture every unforgettable moment on video.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/videography/parties.js') }}"></script>
@endpush