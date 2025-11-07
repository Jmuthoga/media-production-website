@extends('layouts.app')

@section('title', 'Parties & Concerts')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/parties.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="party-hero"
    style="background: linear-gradient(120deg, var(--rose-overlay), var(--rose-overlay)),
            url('https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?q=80&w=1200&auto=format&fit=crop') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>Parties & Concerts — Capture the Energy</h1>
            <p>We bring your events to life through vibrant photography — capturing lights, laughter, and music in every frame. From intimate parties to grand concerts, we make sure every emotion shines through.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Photographer</a>
                <a href="#portfolio" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?q=80&w=1200&auto=format&fit=crop" alt="Party Concert Preview">
        </div>
    </div>
</section>

<div class="page-container" id="portfolio">
    <!-- ===== SLIDER ===== -->
    <section style="margin-top:5rem">
        <div class="slider" id="partySlider">
            <div class="slider-main">
                <div class="slide active"><img src="https://images.unsplash.com/photo-1518972559570-7cc1309f3229?q=80&w=1600&auto=format&fit=crop" alt="">
                    <div class="caption">
                        <h4>Live DJ Event</h4>
                        <p>Energy-filled moments captured under colorful lights.</p>
                    </div>
                </div>
                <div class="slide"><img src="https://images.unsplash.com/photo-1541534401786-2077eed87a76?q=80&w=1600&auto=format&fit=crop" alt="">
                    <div class="caption">
                        <h4>Concert Lights</h4>
                        <p>Vibrant stage lighting and crowd moments.</p>
                    </div>
                </div>
                <div class="slide"><img src="https://images.unsplash.com/photo-1487180144351-b8472da7d491?q=80&w=1600&auto=format&fit=crop" alt="">
                    <div class="caption">
                        <h4>Party Night</h4>
                        <p>Unforgettable dance floor vibes and happy faces.</p>
                    </div>
                </div>
                <div class="slide"><img src="https://images.unsplash.com/photo-1556767576-cfba5c8df6fc?q=80&w=1600&auto=format&fit=crop" alt="">
                    <div class="caption">
                        <h4>Festival Moments</h4>
                        <p>Open-air concerts and festival joy perfectly captured.</p>
                    </div>
                </div>

                <div class="slider-controls">
                    <button id="prevBtn">◀</button><button id="nextBtn">▶</button>
                </div>
                <div class="autoplay-indicator" id="autoplayIndicator">Auto • On</div>
            </div>
            <aside class="slider-thumbs">
                <div class="thumb active"><img src="https://images.unsplash.com/photo-1518972559570-7cc1309f3229?q=80&w=800&auto=format&fit=crop" alt=""></div>
                <div class="thumb"><img src="https://images.unsplash.com/photo-1541534401786-2077eed87a76?q=80&w=800&auto=format&fit=crop" alt=""></div>
                <div class="thumb"><img src="https://images.unsplash.com/photo-1487180144351-b8472da7d491?q=80&w=800&auto=format&fit=crop" alt=""></div>
                <div class="thumb"><img src="https://images.unsplash.com/photo-1556767576-cfba5c8df6fc?q=80&w=800&auto=format&fit=crop" alt=""></div>
            </aside>
        </div>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-lightning-fill"></i>
            <h4>Dynamic Event Coverage</h4>
            <p>We cover every moment — from setup to peak energy and crowd reactions.</p>
        </div>
        <div class="service"><i class="bi bi-camera-video-fill"></i>
            <h4>Concert Photography</h4>
            <p>Professional lighting and action shots for performers, fans, and venues.</p>
        </div>
        <div class="service"><i class="bi bi-music-note-beamed"></i>
            <h4>Aftermovie Creation</h4>
            <p>Combine photos and clips into energetic highlight reels of your event.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"The concert photos were absolutely stunning — you could feel the energy in every shot!"</p>
            <div class="who">— DJ Matrix</div>
        </div>
        <div class="testimonial">
            <p>"Our event coverage was flawless. The team captured everything perfectly."</p>
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
            <h3 id="statPhotos">0</h3>
            <p>Photos Delivered</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years of Experience</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Ready to make your event unforgettable?</h3>
            <p>Book our team for your next party, concert, or festival and relive the thrill through world-class photos and videos.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/parties.js') }}"></script>
@endpush