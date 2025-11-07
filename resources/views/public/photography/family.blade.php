@extends('layouts.app')

@section('title', 'Family Photography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/family.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="family-hero"
    style="background: linear-gradient(120deg,rgba(27, 38, 59, 0.9),rgba(65, 90, 119, 0.8)),
    url('https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=1600&auto=format&fit=crop')center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>Family Photography — Capture Love & Legacy</h1>
            <p>From newborns to grandparents, we create timeless family portraits that celebrate connection, laughter, and life’s unforgettable moments — beautifully framed forever.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Session</a>
                <a href="#portfolio" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1200&auto=format&fit=crop" alt="Happy family portrait">
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="portfolio">

    <!-- ===== SLIDER ===== -->
    <section class="slider" id="familySlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=1600&auto=format&fit=crop" alt="Outdoor family portrait">
                <div class="caption">
                    <h4>Outdoor Family Moments</h4>
                    <p>Natural light and smiles that feel real.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <img src="https://images.unsplash.com/photo-1598970434795-0c54fe7c0642?q=80&w=1600&auto=format&fit=crop" alt="Indoor family portrait">
                <div class="caption">
                    <h4>Indoor Comfort Sessions</h4>
                    <p>Cozy, candid moments at home with loved ones.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?q=80&w=1600&auto=format&fit=crop" alt="Siblings smiling">
                <div class="caption">
                    <h4>Sibling Love</h4>
                    <p>Capturing the pure bond between brothers and sisters.</p>
                </div>
            </div>
            <div class="slide" data-index="3">
                <img src="https://images.unsplash.com/photo-1581578017423-6c0b3c6c9c86?q=80&w=1600&auto=format&fit=crop" alt="Generational photo">
                <div class="caption">
                    <h4>Generations Together</h4>
                    <p>Three generations in one frame — a memory to cherish.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="1"><img src="https://images.unsplash.com/photo-1598970434795-0c54fe7c0642?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="2"><img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="3"><img src="https://images.unsplash.com/photo-1581578017423-6c0b3c6c9c86?q=80&w=800&auto=format&fit=crop" alt=""></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-people-fill"></i>
            <h4>Family Sessions</h4>
            <p>Heartwarming family portraits that reflect your personality, laughter, and bonds.</p>
        </div>
        <div class="service"><i class="bi bi-camera-fill"></i>
            <h4>Outdoor & Studio Shoots</h4>
            <p>Choose between open-air beauty or our professional lighting setup.</p>
        </div>
        <div class="service"><i class="bi bi-heart-fill"></i>
            <h4>Memories That Last</h4>
            <p>High-resolution photos ready for framing, printing, and keepsakes.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"The photos captured our family’s love perfectly. We’ll treasure these for a lifetime!"</p>
            <div class="who">— The Mwangi Family</div>
        </div>
        <div class="testimonial">
            <p>"Our children felt so comfortable — the laughter in the photos was genuine."</p>
            <div class="who">— Lucy & Brian</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statClients">0</h3>
            <p>Happy Families</p>
        </div>
        <div class="stat">
            <h3 id="statLocations">0</h3>
            <p>Outdoor Locations</p>
        </div>
        <div class="stat">
            <h3 id="statMemories">0</h3>
            <p>Memories Captured</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years Experience</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Preserve Your Family’s Story</h3>
            <p>Let’s create beautiful, lasting portraits that remind you what matters most — love, togetherness, and joy.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Your Session</a>
        </div>
    </section>
</div>
@endsection


@push('scripts')
<script src="{{ asset('js/public/photography/family.js') }}"></script>
@endpush