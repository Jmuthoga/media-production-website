@extends('layouts.app')

@section('title', 'Product Videography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/videography/product.css') }}">
@endpush


@section('content')
<!-- ===== HERO ===== -->
<section class="videography-hero"
    style="background: linear-gradient(120deg, rgba(0, 128, 128, 0.85), rgba(241, 196, 15, 0.2)),
            url('https://images.unsplash.com/photo-1612277798899-5c091ed0d1d6?q=80&w=1600&auto=format&fit=crop') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>Product Videography</h1>
            <p>High-quality product videos for marketing, social media, and commercial campaigns — dynamic, clear, and visually engaging.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Shoot</a>
                <a href="#gallery" class="btn-outline-light">View Samples</a>
            </div>
        </div>
        <div class="hero-right">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" autoplay muted loop playsinline></video>
        </div>
    </div>
</section>

<div class="page-container" id="gallery">
    <!-- ===== SLIDER ===== -->
    <section class="slider" id="videoSlider">
        <div class="slider-main">
            <div class="slide active" data-index="0">
                <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                <div class="caption">
                    <h4>Studio Product Videos</h4>
                    <p>Clean, professional, commercial-ready product clips.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <video src="https://www.w3schools.com/html/movie.mp4" controls></video>
                <div class="caption">
                    <h4>Creative Angles</h4>
                    <p>Highlight product features with dynamic video angles.</p>
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
        <div class="service"><i class="bi bi-camera-reels-fill"></i>
            <h4>Commercial Videos</h4>
            <p>Professional clips suitable for social media, ads, and presentations.</p>
        </div>
        <div class="service"><i class="bi bi-box-seam"></i>
            <h4>Product Highlights</h4>
            <p>Showcase your products’ features in motion.</p>
        </div>
        <div class="service"><i class="bi bi-lightning-fill"></i>
            <h4>Creative Shots</h4>
            <p>Dynamic lighting and angles to make products pop on video.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"The product videos helped our online store sales soar — highly recommended!"</p>
            <div class="who">— E-commerce Brand</div>
        </div>
        <div class="testimonial">
            <p>"Professional, clear, and engaging videos. Perfect for our ad campaigns."</p>
            <div class="who">— Marketing Agency</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statProducts">0</h3>
            <p>Videos Produced</p>
        </div>
        <div class="stat">
            <h3 id="statClips">0</h3>
            <p>Clips Delivered</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years Experience</p>
        </div>
        <div class="stat">
            <h3 id="statClients">0</h3>
            <p>Happy Clients</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Bring Your Products to Life</h3>
            <p>Create engaging, dynamic product videos that captivate your audience.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Your Shoot</a>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/videography/product.js') }}"></script>
@endpush