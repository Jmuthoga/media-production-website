@extends('layouts.app')

@section('title', 'Weddings & Engagements Videography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/videography/weddings.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="video-hero"
    style="background: linear-gradient(120deg, rgba(229, 152, 155, 0.75), rgba(181, 131, 141, 0.75)),
            url('https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop');">
    <div class="inner">
        <div class="hero-left">
            <h1>Weddings & Engagements Videography</h1>
            <p>Relive every smile, tear, and dance with cinematic videography. Capture your love story with romantic elegance.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book Your Videographer</a>
                <a href="#gallery" class="btn-outline-light">View Sample Videos</a>
            </div>
        </div>
        <div class="hero-right">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" autoplay muted loop></video>
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- VIDEO SLIDER -->
    <section class="video-slider" id="videoSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                <div class="caption">
                    <h4>Elegant Wedding Highlights</h4>
                    <p>Experience your wedding in cinematic storytelling.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <video src="https://www.w3schools.com/html/movie.mp4" controls></video>
                <div class="caption">
                    <h4>Romantic Engagements</h4>
                    <p>Capture your love story before the big day.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                <div class="caption">
                    <h4>Grand Wedding Celebrations</h4>
                    <p>Relive the joy, laughter, and dancing from your wedding day.</p>
                </div>
            </div>

            <button id="prevBtn">◀</button>
            <button id="nextBtn">▶</button>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
            <div class="thumb" data-index="1"><video src="https://www.w3schools.com/html/movie.mp4"></video></div>
            <div class="thumb" data-index="2"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
        </aside>
    </section>

    <!-- SERVICES -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-camera-video-fill"></i>
            <h4>Cinematic Wedding Films</h4>
            <p>High-quality cinematic storytelling capturing your special day.</p>
        </div>
        <div class="service"><i class="bi bi-heart-fill"></i>
            <h4>Engagement Videos</h4>
            <p>Romantic, intimate moments captured before the big day.</p>
        </div>
        <div class="service"><i class="bi bi-gift-fill"></i>
            <h4>Highlight Reels & Albums</h4>
            <p>Professional highlight reels and digital keepsakes to cherish forever.</p>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"Our wedding video was magical — we relived every moment as if it was happening again!"</p>
            <div class="who">— Mr. & Mrs. Njoroge</div>
        </div>
        <div class="testimonial">
            <p>"The engagement video perfectly captured our love and excitement before the wedding!"</p>
            <div class="who">— Angela & Peter</div>
        </div>
    </section>

    <!-- STATS -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statWeddings">0</h3>
            <p>Weddings Filmed</p>
        </div>
        <div class="stat">
            <h3 id="statEngagements">0</h3>
            <p>Engagement Videos</p>
        </div>
        <div class="stat">
            <h3 id="statVideographers">0</h3>
            <p>Professional Videographers</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years of Experience</p>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <div class="left">
            <h3>Let’s Bring Your Love Story to Life</h3>
            <p>We ensure your wedding and engagement moments are captured with cinematic storytelling and timeless artistry.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Your Videographer</a>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/videography/weddings.js') }}"></script>
@endpush