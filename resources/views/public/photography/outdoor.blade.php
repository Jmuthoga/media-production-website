@extends('layouts.app')

@section('title', 'Outdoor & Nature Shoots')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/outdoor.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="outdoor-hero"
    style="background: linear-gradient(120deg, rgba(46, 125, 50, 0.85), rgba(241, 196, 15, 0.2)),
            url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>Outdoor & Nature Shoots</h1>
            <p>Capturing landscapes, wildlife, and outdoor sessions — emphasizing natural light, scenic beauty, and artistic framing.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Shoot</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop" alt="Outdoor photography">
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- ===== SLIDER ===== -->
    <section class="slider" id="outdoorSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop" alt="Forest landscape">
                <div class="caption">
                    <h4>Forest Landscapes</h4>
                    <p>Vibrant, serene forests captured with natural lighting.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1600&auto=format&fit=crop" alt="Wildlife photography">
                <div class="caption">
                    <h4>Wildlife Photography</h4>
                    <p>Dynamic shots of wildlife in their natural habitat.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1600&auto=format&fit=crop" alt="Mountain scenery">
                <div class="caption">
                    <h4>Mountain Views</h4>
                    <p>Epic vistas and panoramic outdoor captures.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="1"><img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="2"><img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop" alt=""></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-tree-fill"></i>
            <h4>Landscape Shoots</h4>
            <p>Capturing scenic beauty from forests, mountains, and rivers.</p>
        </div>
        <div class="service"><i class="bi bi-binoculars-fill"></i>
            <h4>Wildlife Sessions</h4>
            <p>Professional wildlife photography in natural habitats.</p>
        </div>
        <div class="service"><i class="bi bi-sun-fill"></i>
            <h4>Golden Hour Shots</h4>
            <p>Artistic sunrise and sunset captures for stunning visuals.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"Absolutely breathtaking outdoor shots! Every frame tells a story."</p>
            <div class="who">— Nature Photography Enthusiast</div>
        </div>
        <div class="testimonial">
            <p>"The team captured our adventure trip perfectly with natural light and colors."</p>
            <div class="who">— Adventure Travel Company</div>
        </div>
    </section>

    <!-- ===== STATS ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statOutdoor">0</h3>
            <p>Outdoor Sessions</p>
        </div>
        <div class="stat">
            <h3 id="statWildlife">0</h3>
            <p>Wildlife Shoots</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years Experience</p>
        </div>
        <div class="stat">
            <h3 id="statSatisfaction">0</h3>
            <p>Client Satisfaction</p>
        </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="cta">
        <div class="left">
            <h3>Ready to Explore?</h3>
            <p>Book your outdoor or nature photography session and bring the beauty of the wild to life in every shot.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/outdoor.js') }}"></script>
@endpush