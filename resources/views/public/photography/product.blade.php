@extends('layouts.app')

@section('title', 'Product Photography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/product.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="product-hero"
    style="background: linear-gradient(120deg, rgba(0, 128, 128, 0.85), rgba(241, 196, 15, 0.2)),
            url('https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=1600&auto=format&fit=crop') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>Product Photography</h1>
            <p>Commercial product photography for catalogs, e-commerce, and advertising — crisp, professional, and visually striking images.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Session</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=1600&auto=format&fit=crop" alt="Product photography">
        </div>
    </div>
</section>

<div class="page-container" id="gallery">
    <!-- ===== SLIDER ===== -->
    <section class="slider" id="productSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <img src="https://images.unsplash.com/photo-1581093588401-3d81640b2d9b?q=80&w=1600&auto=format&fit=crop" alt="Product setup 1">
                <div class="caption">
                    <h4>Studio Product Shoot</h4>
                    <p>High-quality product photography for catalogs and online stores.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=1600&auto=format&fit=crop" alt="Product setup 2">
                <div class="caption">
                    <h4>Creative Angles</h4>
                    <p>Showcase products with creative lighting and angles.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?q=80&w=1600&auto=format&fit=crop" alt="Product setup 3">
                <div class="caption">
                    <h4>Commercial Ready</h4>
                    <p>Images optimized for advertisements, social media, and e-commerce.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><img src="https://images.unsplash.com/photo-1581093588401-3d81640b2d9b?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="1"><img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="2"><img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?q=80&w=800&auto=format&fit=crop" alt=""></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-camera-reels-fill"></i>
            <h4>Product Catalogs</h4>
            <p>Professional photos for catalogs and print materials.</p>
        </div>
        <div class="service"><i class="bi bi-box-seam"></i>
            <h4>E-commerce Images</h4>
            <p>Optimized images for online stores and marketplaces.</p>
        </div>
        <div class="service"><i class="bi bi-lightning-fill"></i>
            <h4>Creative Lighting</h4>
            <p>Use of lighting techniques to enhance product appeal.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"Our product catalog images have never looked better — truly professional work."</p>
            <div class="who">— Retail Brand</div>
        </div>
        <div class="testimonial">
            <p>"The e-commerce photos are clean, consistent, and attractive. Excellent service!"</p>
            <div class="who">— Online Store Owner</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statProducts">0</h3>
            <p>Product Shoots</p>
        </div>
        <div class="stat">
            <h3 id="statPhotos">0</h3>
            <p>Photos Delivered</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years of Experience</p>
        </div>
        <div class="stat">
            <h3 id="statSatisfaction">0</h3>
            <p>Client Satisfaction</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Book Your Product Shoot</h3>
            <p>High-quality, professional photography for your products — perfect for online and print marketing.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/product.js') }}"></script>
@endpush