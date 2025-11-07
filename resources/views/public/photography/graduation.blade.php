@extends('layouts.app')

@section('title', 'Graduation Photography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/graduation.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="grad-hero"
    style="background: linear-gradient(120deg, rgba(13, 27, 42, 0.9), rgba(60, 9, 108, 0.85)),
            url('https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>Graduation Photography</h1>
            <p>Capture the excitement, pride, and memories of your graduation day with professional photography tailored for ceremonies, gowns, and celebrations.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Session</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop" alt="Graduation cap and gown">
        </div>
    </div>
</section>

<!-- ===== CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- ===== SLIDER ===== -->
    <section class="slider" id="gradSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <img src="https://images.unsplash.com/photo-1606312619385-2e2b4ee64e02?q=80&w=1600&auto=format&fit=crop" alt="Graduation ceremony 1">
                <div class="caption">
                    <h4>Cap & Gown Moments</h4>
                    <p>Memorable shots of graduates in ceremonial attire.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <img src="https://images.unsplash.com/photo-1579370318446-2d9b0869e3ab?q=80&w=1600&auto=format&fit=crop" alt="Throwing caps">
                <div class="caption">
                    <h4>Celebratory Throw</h4>
                    <p>Capture the iconic moment of joy and celebration.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <img src="https://images.unsplash.com/photo-1596496050023-5c2e41a4748b?q=80&w=1600&auto=format&fit=crop" alt="Graduation portraits">
                <div class="caption">
                    <h4>Individual Portraits</h4>
                    <p>Professional close-ups to preserve memories for a lifetime.</p>
                </div>
            </div>
            <div class="slide" data-index="3">
                <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop" alt="Group photo">
                <div class="caption">
                    <h4>Group Shots</h4>
                    <p>Friends, classmates, and family together on your big day.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><img src="https://images.unsplash.com/photo-1606312619385-2e2b4ee64e02?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="1"><img src="https://images.unsplash.com/photo-1579370318446-2d9b0869e3ab?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="2"><img src="https://images.unsplash.com/photo-1596496050023-5c2e41a4748b?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="3"><img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=800&auto=format&fit=crop" alt=""></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-mortarboard-fill"></i>
            <h4>Ceremony Coverage</h4>
            <p>From processions to speeches, every moment captured in style.</p>
        </div>
        <div class="service"><i class="bi bi-camera-reels-fill"></i>
            <h4>Portrait Sessions</h4>
            <p>Professional close-ups and posed shots for graduates and family.</p>
        </div>
        <div class="service"><i class="bi bi-people-fill"></i>
            <h4>Group & Family Shots</h4>
            <p>Memorable photos with friends, classmates, and loved ones.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"Our graduation photos were stunning — the colors and emotions were perfectly captured!"</p>
            <div class="who">— University Alumni</div>
        </div>
        <div class="testimonial">
            <p>"Professional, timely, and fun! They made our graduation day unforgettable."</p>
            <div class="who">— Jane, Graduate</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statGraduations">0</h3>
            <p>Graduations Covered</p>
        </div>
        <div class="stat">
            <h3 id="statPhotos">0</h3>
            <p>Memorable Photos</p>
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
            <h3>Celebrate Your Achievement</h3>
            <p>Book your graduation photography session now and preserve your proudest moments in vibrant, professional images.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/graduation.js') }}"></script>
@endpush