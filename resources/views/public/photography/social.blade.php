@extends('layouts.app')

@section('title', 'TikTok & Social Media Shoots')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/social.css') }}">
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="social-hero"
    style="background: linear-gradient(120deg,rgba(131, 58, 180, 0.8),rgba(252, 176, 69, 0.4)),
        url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1600&auto=format&fit=crop')center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>TikTok & Social Media Shoots</h1>
            <p>Content creation for TikTok, Instagram, and other platforms — short videos, reels, and creative photos that stand out online.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Session</a>
                <a href="#gallery" class="btn-outline-light">View Portfolio</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1600&auto=format&fit=crop" alt="Social media content">
        </div>
    </div>
</section>

<div class="page-container" id="gallery">

    <!-- ===== SLIDER ===== -->
    <section class="slider" id="socialSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <img src="https://images.unsplash.com/photo-1590502593740-6c9158b0fa14?q=80&w=1600&auto=format&fit=crop" alt="TikTok content">
                <div class="caption">
                    <h4>TikTok Videos</h4>
                    <p>Dynamic short-form videos designed for viral content.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?q=80&w=1600&auto=format&fit=crop" alt="Instagram content">
                <div class="caption">
                    <h4>Instagram Reels</h4>
                    <p>Creative photo and video content optimized for engagement.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1600&auto=format&fit=crop" alt="Social media campaign">
                <div class="caption">
                    <h4>Social Campaigns</h4>
                    <p>Full creative direction for campaigns across platforms.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><img src="https://images.unsplash.com/photo-1590502593740-6c9158b0fa14?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="1"><img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="2"><img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=800&auto=format&fit=crop" alt=""></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-tiktok"></i>
            <h4>TikTok Content</h4>
            <p>Engaging short-form videos designed for virality.</p>
        </div>
        <div class="service"><i class="bi bi-instagram"></i>
            <h4>Instagram Reels</h4>
            <p>Vibrant photos and video clips optimized for feed and stories.</p>
        </div>
        <div class="service"><i class="bi bi-share-fill"></i>
            <h4>Multi-Platform Campaigns</h4>
            <p>Creative shoots for Facebook, YouTube Shorts, and other platforms.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"Amazing social media content — our engagement skyrocketed!"</p>
            <div class="who">— Digital Marketing Agency</div>
        </div>
        <div class="testimonial">
            <p>"They perfectly captured our brand style for TikTok and Instagram."</p>
            <div class="who">— Influencer Team</div>
        </div>
    </section>

    <!-- ===== STATS ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statSocialShoots">0</h3>
            <p>Social Shoots</p>
        </div>
        <div class="stat">
            <h3 id="statTikTok">0</h3>
            <p>TikTok Campaigns</p>
        </div>
        <div class="stat">
            <h3 id="statInstagram">0</h3>
            <p>Instagram Reels</p>
        </div>
        <div class="stat">
            <h3 id="statClient">0</h3>
            <p>Client Satisfaction</p>
        </div>
    </section>

    <!-- ===== CTA ===== -->
    <section class="cta">
        <div class="left">
            <h3>Go Viral Now!</h3>
            <p>Book your social media content session and watch your engagement grow with professionally created videos and photos.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>

</div>
@endsection


@push('scripts')
<script src="{{ asset('js/public/photography/social.js') }}"></script>
@endpush