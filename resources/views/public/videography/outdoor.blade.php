@extends('layouts.app')

@section('title', 'Outdoor & Nature Videography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/videography/outdoor.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="outdoor-hero" aria-label="Hero - Outdoor & Nature Videography"
    style="background:
            linear-gradient(120deg, rgba(46, 125, 50, 0.9), rgba(241, 196, 15, 0.08)),
            url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;">
    <div class="inner">
        <div class="hero-left">
            <h1>Outdoor & Nature Videography</h1>
            <p>We craft cinematic outdoor films — from sweeping landscapes and golden-hour portraits to wildlife documentaries and adventure recaps. Motion, sound, and light combined to preserve nature's stories.</p>
            <div class="hero-cta" role="group" aria-label="Hero actions">
                <a href="{{ route('contact') }}" class="btn-primary-hero" role="button">Book a Shoot</a>
                <a href="#gallery" class="btn-outline-light" role="button">View Samples</a>
            </div>
        </div>

        <div class="hero-right" aria-hidden="false">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" autoplay muted loop playsinline></video>
        </div>
    </div>

</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery" tabindex="-1">

    <!-- ===== SLIDER ===== -->
    <section class="slider" id="natureSlider" aria-label="Video gallery">
        <div class="slider-main" id="sliderMain" role="region" aria-live="polite">

            <!-- Slide 0 -->
            <div class="slide active" data-index="0" aria-hidden="false">
                <video data-src="https://www.w3schools.com/html/mov_bbb.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption" role="status" aria-live="polite">
                    <h4>Forest Landscapes</h4>
                    <p>Vast forest canopies and tranquil walking trails, captured with cinematic motion.</p>
                </div>
            </div>

            <!-- Slide 1 -->
            <div class="slide" data-index="1" aria-hidden="true">
                <video data-src="https://www.w3schools.com/html/movie.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption">
                    <h4>Wildlife Closeups</h4>
                    <p>Dedicated wildlife sequences shot with patience and a storytelling eye.</p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="slide" data-index="2" aria-hidden="true">
                <video data-src="https://www.w3schools.com/html/mov_bbb.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption">
                    <h4>Mountain Vistas</h4>
                    <p>Epic aerial and tracking shots for panoramic storytelling.</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="slide" data-index="3" aria-hidden="true">
                <video data-src="https://www.w3schools.com/html/movie.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption">
                    <h4>Golden Hour Films</h4>
                    <p>Sunrise/sunset sequences that emphasize color, warmth, and motion.</p>
                </div>
            </div>

            <div class="slider-controls" role="toolbar" aria-label="Slider controls">
                <button id="prevBtn" aria-label="Previous slide">◀</button>
                <button id="nextBtn" aria-label="Next slide">▶</button>
            </div>

            <div class="autoplay-toggle" id="autoplayToggle" role="button" tabindex="0" aria-pressed="true">Auto • On</div>
        </div>


        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
            <div class="thumb" data-index="1"><video src="https://www.w3schools.com/html/movie.mp4"></video></div>
            <div class="thumb" data-index="2"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
            <div class="thumb" data-index="3"><video src="https://www.w3schools.com/html/movie.mp4"></video></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid" aria-label="Videography services">
        <div class="service">
            <i class="bi bi-camera-video-fill" aria-hidden="true"></i>
            <h4>Landscape Films</h4>
            <p>Slow, cinematic approaches to highlight scenery — ideal for documentaries and brand films.</p>
        </div>
        <div class="service">
            <i class="bi bi-binoculars-fill" aria-hidden="true"></i>
            <h4>Wildlife Sequences</h4>
            <p>Carefully planned shoots to capture authentic animal behavior with minimal disturbance.</p>
        </div>
        <div class="service">
            <i class="bi bi-sun-fill" aria-hidden="true"></i>
            <h4>Golden Hour Shoots</h4>
            <p>Sunrise and sunset video sessions for warm, emotive results.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials" aria-label="Testimonials">
        <div class="testimonial">
            <p>"Absolutely beautiful films — the team captured our retreat with cinematic finesse."</p>
            <div class="who">— Nature Retreat Organizer</div>
        </div>
        <div class="testimonial">
            <p>"The wildlife footage surpassed our expectations. Professional and patient crew."</p>
            <div class="who">— Conservation Project</div>
        </div>
    </section>

    <!-- ===== STATS ===== -->
    <section class="stats-row" aria-label="Statistics">
        <div class="stat">
            <h3 id="statOutdoor">0</h3>
            <p>Outdoor Sessions</p>
        </div>
        <div class="stat">
            <h3 id="statWildlife">0</h3>
            <p>Wildlife Shoots</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years Experience</p>
        </div>
        <div class="stat">
            <h3 id="statSatisfaction">0</h3>
            <p>Client Satisfaction</p>
        </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="cta" aria-label="Call to action">
        <div class="left">
            <h3>Ready to Explore?</h3>
            <p>Book your outdoor or nature videography session and bring the beauty of the wild to life in motion.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn" role="button">Book Now</a>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/videography/outdoor.js') }}"></script>
@endpush