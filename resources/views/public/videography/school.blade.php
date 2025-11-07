@extends('layouts.app')

@section('title', 'School & Institutional Videography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/videography/school.css') }}">
@endpush


@section('content')
<!-- ===== HERO ===== -->
<section class="school-hero"
    style="background: linear-gradient(120deg,rgba(52, 152, 219, 0.85),rgba(241, 196, 15, 0.2)),
    url('https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=1600&auto=format&fit=crop')center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>School & Institutional Videography</h1>
            <p>Capture every school event, graduation, sports day, and institutional ceremony professionally on video for lasting memories.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Videographer</a>
                <a href="#gallery" class="btn-outline-light">View Videos</a>
            </div>
        </div>
        <div class="hero-right">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" autoplay muted loop></video>
        </div>
    </div>
</section>

<div class="page-container" id="gallery">
    <!-- ===== VIDEO SLIDER ===== -->
    <section class="slider" id="schoolSlider">
        <div class="slider-main">
            <div class="slide active" data-index="0">
                <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                <div class="caption">
                    <h4>School Assembly</h4>
                    <p>Professional coverage of school gatherings and ceremonies.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <video src="https://www.w3schools.com/html/movie.mp4" controls></video>
                <div class="caption">
                    <h4>Sports Day</h4>
                    <p>Capture every exciting moment of the school's sports events.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                <div class="caption">
                    <h4>Graduation Ceremony</h4>
                    <p>Memorable graduation videos delivered in high quality.</p>
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
            <div class="thumb" data-index="2"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-mortarboard-fill"></i>
            <h4>Graduations</h4>
            <p>Professional graduation videography capturing all key moments.</p>
        </div>
        <div class="service"><i class="bi bi-people-fill"></i>
            <h4>School Events</h4>
            <p>Sports, assemblies, and other events filmed with care.</p>
        </div>
        <div class="service"><i class="bi bi-building"></i>
            <h4>Institutional Ceremonies</h4>
            <p>Awards, ceremonies, and institutional events professionally recorded.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"Our school sports day videos were amazing — full of energy and professionalism."</p>
            <div class="who">— School Administrator</div>
        </div>
        <div class="testimonial">
            <p>"Graduation ceremony coverage was flawless and delivered quickly."</p>
            <div class="who">— Parent Committee</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statEvents">0</h3>
            <p>School Events Covered</p>
        </div>
        <div class="stat">
            <h3 id="statVideos">0</h3>
            <p>Videos Delivered</p>
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
            <h3>Book Your School Event Today</h3>
            <p>Ensure every moment at your school or institution is captured beautifully on video.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/videography/school.js') }}"></script>
@endpush