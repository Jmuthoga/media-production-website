@extends('layouts.app')

@section('title', 'Studio Sessions & Hire')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/studio.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="studio-hero"
    style="background: linear-gradient(120deg, rgba(18, 18, 18, 0.9), rgba(44, 40, 28, 0.85)),
            url('https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?q=80&w=1600&auto=format&fit=crop') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>Studio Sessions & Equipment Hire</h1>
            <p>Book premium studio sessions or hire our professional gear for your next shoot — lighting, lenses, and setup designed for flawless captures.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book Studio</a>
                <a href="#gallery" class="btn-outline-light">View Studio</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?q=80&w=1600&auto=format&fit=crop" alt="Studio setup">
        </div>
    </div>
</section>

<!-- ===== CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- ===== SLIDER ===== -->
    <section class="slider" id="studioSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <img src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?q=80&w=1600&auto=format&fit=crop" alt="Studio space 1">
                <div class="caption">
                    <h4>Professional Studio Space</h4>
                    <p>Spacious environment with advanced lighting and backdrops.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?q=80&w=1600&auto=format&fit=crop" alt="Studio lighting">
                <div class="caption">
                    <h4>Lighting Setup</h4>
                    <p>Customizable lighting for portraits, products, and creative shots.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <img src="https://images.unsplash.com/photo-1590602847861-f357a9332bbc?q=80&w=1600&auto=format&fit=crop" alt="Equipment hire">
                <div class="caption">
                    <h4>Gear & Equipment Hire</h4>
                    <p>Top-quality cameras, tripods, lenses, and audio gear for rent.</p>
                </div>
            </div>
            <div class="slide" data-index="3">
                <img src="https://images.unsplash.com/photo-1622151834677-70ef93c6a16b?q=80&w=1600&auto=format&fit=crop" alt="Studio session in progress">
                <div class="caption">
                    <h4>Studio in Action</h4>
                    <p>Where creativity meets comfort — your vision, perfectly captured.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><img src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="1"><img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="2"><img src="https://images.unsplash.com/photo-1590602847861-f357a9332bbc?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="3"><img src="https://images.unsplash.com/photo-1622151834677-70ef93c6a16b?q=80&w=800&auto=format&fit=crop" alt=""></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-lightbulb-fill"></i>
            <h4>Studio Lighting</h4>
            <p>Professional-grade lighting systems for every mood and concept.</p>
        </div>
        <div class="service"><i class="bi bi-camera-reels-fill"></i>
            <h4>Equipment Hire</h4>
            <p>From DSLRs to lenses and tripods — everything for your perfect shot.</p>
        </div>
        <div class="service"><i class="bi bi-building"></i>
            <h4>Private Studio Booking</h4>
            <p>Exclusive use of our fully equipped studio for individual or team projects.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"The studio is top-notch — we shot our entire campaign here without a single issue!"</p>
            <div class="who">— Vision Media Team</div>
        </div>
        <div class="testimonial">
            <p>"Clean, well-lit, and organized. The hire process was smooth and affordable."</p>
            <div class="who">— Jane, Photographer</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statSessions">0</h3>
            <p>Studio Sessions</p>
        </div>
        <div class="stat">
            <h3 id="statRentals">0</h3>
            <p>Equipment Rentals</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years of Service</p>
        </div>
        <div class="stat">
            <h3 id="statSatisfaction">0</h3>
            <p>Client Satisfaction</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Ready to Create?</h3>
            <p>Book your next photo or video session in our modern, fully equipped studio — or hire top-tier gear for your location shoot.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/studio.js') }}"></script>
@endpush