@extends('layouts.app')

@section('title', 'Weddings & Engagements')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/weddings.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="wedding-hero"
    style="background:
            linear-gradient(120deg, rgba(229, 152, 155, 0.75), rgba(181, 131, 141, 0.75)),
            url('https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=1600&auto=format&fit=crop');">
    <div class="inner">
        <div class="hero-left">
            <h1>Weddings & Engagements — Your Forever Begins Here</h1>
            <p>We capture every emotion, every detail, and every spark — from intimate engagements to grand wedding celebrations. Let your story shine through timeless photography.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book Your Date</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=1200&auto=format&fit=crop" alt="Wedding couple portrait">
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- SLIDER -->
    <section class="slider" id="weddingSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1600&auto=format&fit=crop" alt="">
                <div class="caption">
                    <h4>Elegant Wedding Moments</h4>
                    <p>Capturing your most magical day beautifully and authentically.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=1600&auto=format&fit=crop" alt="">
                <div class="caption">
                    <h4>Romantic Engagements</h4>
                    <p>Celebrate your love story with intimate engagement sessions.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <img src="https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?q=80&w=1600&auto=format&fit=crop" alt="">
                <div class="caption">
                    <h4>Bridal Details</h4>
                    <p>Every lace, ring, and petal captured in artistic perfection.</p>
                </div>
            </div>
            <div class="slide" data-index="3">
                <img src="https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?q=80&w=1600&auto=format&fit=crop" alt="">
                <div class="caption">
                    <h4>Grand Celebrations</h4>
                    <p>Unforgettable moments filled with joy and love.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="1"><img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="2"><img src="https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="3"><img src="https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?q=80&w=800&auto=format&fit=crop" alt=""></div>
        </aside>
    </section>

    <!-- SERVICES -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-heart-fill"></i>
            <h4>Engagement Shoots</h4>
            <p>Capture your love story before the big day in elegant, intimate frames.</p>
        </div>
        <div class="service"><i class="bi bi-camera-fill"></i>
            <h4>Wedding Day Coverage</h4>
            <p>Every moment, every emotion — documented in timeless detail.</p>
        </div>
        <div class="service"><i class="bi bi-gift-fill"></i>
            <h4>Albums & Prints</h4>
            <p>Premium prints and handcrafted albums that last a lifetime.</p>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"They made our wedding memories unforgettable — stunning photos that tell our story perfectly!"</p>
            <div class="who">— Mr. & Mrs. Njoroge</div>
        </div>
        <div class="testimonial">
            <p>"Our engagement shoot was magical — we felt natural and completely at ease!"</p>
            <div class="who">— Angela & Peter</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statWeddings">0</h3>
            <p>Weddings Captured</p>
        </div>
        <div class="stat">
            <h3 id="statEngagements">0</h3>
            <p>Engagement Sessions</p>
        </div>
        <div class="stat">
            <h3 id="statPhotographers">0</h3>
            <p>Professional Photographers</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years of Experience</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Let’s Tell Your Love Story</h3>
            <p>We’re here to make your wedding day memories eternal — elegant, emotional, and extraordinary.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Your Wedding</a>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/weddings.js') }}"></script>
@endpush