@extends('layouts.app')

@section('title', 'Social Media Content')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/videography/social.css') }}">
@endpush


@section('content')
<!-- ===== HERO ===== -->
<section class="social-hero" aria-label="Hero - Social Media Content"
    style="background:radial-gradient(800px 400px at 85% 20%, rgba(138, 58, 185, 0.10), transparent 10%),linear-gradient(120deg, rgba(29, 161, 242, 0.9), rgba(255, 0, 102, 0.12)),
            url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;">
    <div class="inner">
        <div class="hero-left">
            <h1>Social Media Content</h1>
            <p>Short-form videos, Reels, Stories, and promo clips crafted to stop thumbs, spark shares, and grow engagement. Strategy and motion designed for platforms — fast turnaround and platform-optimised outputs.</p>
            <div class="hero-cta" role="group" aria-label="Hero actions">
                <a href="{{ route('contact') }}" class="btn-primary-hero" role="button">Start a Campaign</a>
                <a href="#gallery" class="btn-outline-light" role="button">See Reels</a>
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
    <section class="slider" id="socialSlider" aria-label="Video gallery">
        <div class="slider-main" id="sliderMain" role="region" aria-live="polite">

            <!-- Slide 0 -->
            <div class="slide active" data-index="0" aria-hidden="false">
                <video data-src="https://www.w3schools.com/html/mov_bbb.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption" role="status" aria-live="polite">
                    <h4>Instagram Reels — Product Teaser</h4>
                    <p>30s punchy product reveal built for high engagement and brand recall.</p>
                </div>
            </div>

            <!-- Slide 1 -->
            <div class="slide" data-index="1" aria-hidden="true">
                <video data-src="https://www.w3schools.com/html/movie.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption">
                    <h4>TikTok — Viral Cut</h4>
                    <p>Trend-aware edits with rapid cuts and motion design for virality.</p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="slide" data-index="2" aria-hidden="true">
                <video data-src="https://www.w3schools.com/html/mov_bbb.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption">
                    <h4>Facebook Ads — Short Promo</h4>
                    <p>Optimised ad creative (15s) for conversions and CTA click-through.</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="slide" data-index="3" aria-hidden="true">
                <video data-src="https://www.w3schools.com/html/movie.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption">
                    <h4>Stories — Vertical Sequence</h4>
                    <p>Multi-part story tiles built to keep users swiping and converting.</p>
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
            <i class="bi bi-camera-reels-fill" aria-hidden="true"></i>
            <h4>Short-Form Strategy</h4>
            <p>Concept -> Hook -> Edit: creative flows structured for shareability and retention.</p>
        </div>
        <div class="service">
            <i class="bi bi-lightning-fill" aria-hidden="true"></i>
            <h4>Fast Turnaround</h4>
            <p>Rapid shoots and edits for timely trends and campaign needs.</p>
        </div>
        <div class="service">
            <i class="bi bi-graph-up" aria-hidden="true"></i>
            <h4>Ad-Optimised Cuts</h4>
            <p>Multiple crop and length variants ready for ads, stories, and feed.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials" aria-label="Testimonials">
        <div class="testimonial">
            <p>"Engagement rose 3x after our first month — creative, fast, and results-driven."</p>
            <div class="who">— Social Media Manager, Retail Brand</div>
        </div>
        <div class="testimonial">
            <p>"They understood platform nuance — TikTok native edits that actually converted."</p>
            <div class="who">— Founder, Startup</div>
        </div>
    </section>

    <!-- ===== STATS ===== -->
    <section class="stats-row" aria-label="Statistics">
        <div class="stat">
            <h3 id="statPosts">0</h3>
            <p>Short Clips Delivered</p>
        </div>
        <div class="stat">
            <h3 id="statReels">0</h3>
            <p>Reels & TikToks</p>
        </div>
        <div class="stat">
            <h3 id="statCampaigns">0</h3>
            <p>Campaigns Launched</p>
        </div>
        <div class="stat">
            <h3 id="statClients">0</h3>
            <p>Happy Clients</p>
        </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="cta" aria-label="Call to action">
        <div class="left">
            <h3>Ready to go viral?</h3>
            <p>Book a short-form content package and get platform-optimised creatives ready to publish.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn" role="button">Book Now</a>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/videography/social.js') }}"></script>
@endpush