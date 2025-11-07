@extends('layouts.app')

@section('title', 'Corporate & Event Coverage')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/corporate.css') }}">
@endpush

@section('content')

<!-- ===== HERO ===== -->
<section class="corp-hero"
    style="background: linear-gradient(120deg, rgba(26, 26, 26, 0.9), rgba(44, 62, 80, 0.85)),
            url('https://images.unsplash.com/photo-1556740765-90d3d3e5a1d4?q=80&w=1600&auto=format&fit=crop') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>Corporate & Event Coverage</h1>
            <p>Professional photography and videography services for corporate events, conferences, product launches, and all types of special events.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Session</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1556740765-90d3d3e5a1d4?q=80&w=1600&auto=format&fit=crop" alt="Corporate event">
        </div>
    </div>
</section>

<!-- ===== CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- ===== SLIDER ===== -->
    <section class="slider" id="corpSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <img src="https://images.unsplash.com/photo-1556740765-90d3d3e5a1d4?q=80&w=1600&auto=format&fit=crop" alt="Corporate event">
                <div class="caption">
                    <h4>Professional Conferences</h4>
                    <p>Covering all aspects of corporate conferences and seminars.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1600&auto=format&fit=crop" alt="Product launch">
                <div class="caption">
                    <h4>Product Launch Events</h4>
                    <p>Highlighting your products with high-quality visual coverage.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <img src="https://images.unsplash.com/photo-1542223616-9b7db5ffb267?q=80&w=1600&auto=format&fit=crop" alt="Corporate gathering">
                <div class="caption">
                    <h4>Corporate Gatherings</h4>
                    <p>Documenting team building, celebrations, and corporate culture.</p>
                </div>
            </div>
            <div class="slide" data-index="3">
                <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=1600&auto=format&fit=crop" alt="Networking event">
                <div class="caption">
                    <h4>Networking & Gala Events</h4>
                    <p>Capturing memorable moments from gala dinners and networking nights.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><img src="https://images.unsplash.com/photo-1556740765-90d3d3e5a1d4?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="1"><img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="2"><img src="https://images.unsplash.com/photo-1542223616-9b7db5ffb267?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="3"><img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=800&auto=format&fit=crop" alt=""></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-briefcase-fill"></i>
            <h4>Corporate Events</h4>
            <p>Conferences, seminars, workshops and annual meetings professionally covered.</p>
        </div>
        <div class="service"><i class="bi bi-camera-reels-fill"></i>
            <h4>Product Launches</h4>
            <p>High-impact visuals that showcase your products or services.</p>
        </div>
        <div class="service"><i class="bi bi-people-fill"></i>
            <h4>Networking & Social Events</h4>
            <p>Gala dinners, team events, and professional gatherings captured in style.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"The team captured our annual conference flawlessly — from speakers to candid networking shots."</p>
            <div class="who">— Corporate Client</div>
        </div>
        <div class="testimonial">
            <p>"Professional, discreet, and creative coverage for our gala dinner. Highly recommended!"</p>
            <div class="who">— Event Manager</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statEvents">0</h3>
            <p>Events Covered</p>
        </div>
        <div class="stat">
            <h3 id="statShots">0</h3>
            <p>Professional Shots</p>
        </div>
        <div class="stat">
            <h3 id="statExperience">0</h3>
            <p>Years of Experience</p>
        </div>
        <div class="stat">
            <h3 id="statSatisfaction">0</h3>
            <p>Client Satisfaction</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Professional Event Coverage</h3>
            <p>Book your corporate or social event with us to ensure every moment is captured with quality and style.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/corporate.js') }}"></script>
@endpush