@extends('layouts.app')

@section('title', 'Portrait Photography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/portrait.css') }}">
@endpush

@section('content')
<!-- ============= HERO ============= -->
<section class="portrait-hero" aria-labelledby="portrait-hero-heading"
    style="background: linear-gradient(120deg, var(--deep-rose), var(--rose)),
            url('https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1200&auto=format&fit=crop') center/cover;">
    <div class="inner">
        <div class="hero-left" role="region" aria-label="Introduction">
            <h1 id="portrait-hero-heading">Portrait Photography — Capture Personality & Presence</h1>
            <p>Professional portrait sessions for individuals, families, and talent. We craft lighting, pose, and mood so your photographs speak with confidence — editorial, corporate, lifestyle, or creative portraits.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero" aria-label="Book portrait session">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" style="margin-right:6px">
                        <path d="M22 12L2 3v18L22 12z" fill="white" />
                    </svg>
                    Book a Session
                </a>
                <a href="#portfolio" class="btn-outline-light">View Portfolio</a>
            </div>
        </div>

        <div class="hero-right" aria-hidden="false">
            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1200&auto=format&fit=crop" alt="Portrait hero preview" loading="lazy">
        </div>
    </div>
</section>

<div class="page-container" id="portfolio">

    <!-- ============= SLIDER ============= -->
    <section aria-label="Portrait Gallery" style="margin-top: 5rem">
        <div class="slider" id="portraitSlider" role="region" aria-roledescription="carousel" aria-label="Portrait images carousel">
            <div class="slider-main" id="sliderMain">
                <!-- Slides: replace src urls with your image assets -->
                <div class="slide active" data-index="0" tabindex="0" aria-hidden="false">
                    <img src="https://images.unsplash.com/photo-1524503033411-c9566986fc8f?q=80&w=1600&auto=format&fit=crop" alt="Portrait 1" loading="lazy">
                    <div class="caption">
                        <h4>Studio Portrait</h4>
                        <p>Classic lighting, refined look for headshots and editorial portraits.</p>
                    </div>
                </div>

                <div class="slide" data-index="1" tabindex="-1" aria-hidden="true">
                    <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop" alt="Portrait 2" loading="lazy">
                    <div class="caption">
                        <h4>Outdoor Portrait</h4>
                        <p>Natural light and environmental storytelling.</p>
                    </div>
                </div>

                <div class="slide" data-index="2" tabindex="-1" aria-hidden="true">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1600&auto=format&fit=crop" alt="Portrait 3" loading="lazy">
                    <div class="caption">
                        <h4>Creative Portrait</h4>
                        <p>Stylized and conceptual portraits for artists and creatives.</p>
                    </div>
                </div>

                <div class="slide" data-index="3" tabindex="-1" aria-hidden="true">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1600&auto=format&fit=crop" alt="Portrait 4" loading="lazy">
                    <div class="caption">
                        <h4>Environmental Portrait</h4>
                        <p>Photos that show personality in context — workplace, studio or outdoors.</p>
                    </div>
                </div>

                <!-- slider controls -->
                <div class="slider-controls" aria-hidden="false">
                    <button id="prevBtn" title="Previous (Left arrow)">◀</button>
                    <button id="nextBtn" title="Next (Right arrow)">▶</button>
                </div>

                <div class="autoplay-indicator" id="autoplayIndicator">Auto • On</div>
            </div>

            <!-- Thumbnails column -->
            <aside class="slider-thumbs" aria-label="Gallery thumbnails">
                <div class="thumb active" data-index="0" tabindex="0" aria-pressed="true" role="button" aria-label="Show slide 1">
                    <img src="https://images.unsplash.com/photo-1524503033411-c9566986fc8f?q=80&w=800&auto=format&fit=crop" alt="Thumb 1" loading="lazy">
                </div>
                <div class="thumb" data-index="1" tabindex="0" role="button" aria-label="Show slide 2">
                    <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=800&auto=format&fit=crop" alt="Thumb 2" loading="lazy">
                </div>
                <div class="thumb" data-index="2" tabindex="0" role="button" aria-label="Show slide 3">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=800&auto=format&fit=crop" alt="Thumb 3" loading="lazy">
                </div>
                <div class="thumb" data-index="3" tabindex="0" role="button" aria-label="Show slide 4">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=800&auto=format&fit=crop" alt="Thumb 4" loading="lazy">
                </div>
            </aside>
        </div>
    </section>

    <!-- ============= SERVICES ============= -->
    <section class="services-grid" aria-label="What we offer">
        <div class="service" role="article">
            <i class="bi bi-camera-fill" aria-hidden="true"></i>
            <h4>Professional Studio Setup</h4>
            <p>Full studio environment with multiple lighting setups, premium backdrops, and hair/makeup coordination if required.</p>
        </div>
        <div class="service" role="article">
            <i class="bi bi-people-fill" aria-hidden="true"></i>
            <h4>Personalized Sessions</h4>
            <p>We plan each session with a pre-shoot consultation to tailor lighting, wardrobe guidance, and mood for your goals.</p>
        </div>
        <div class="service" role="article">
            <i class="bi bi-brush-fill" aria-hidden="true"></i>
            <h4>Advanced Retouching</h4>
            <p>Professional skin retouching, color grading, and multiple delivery formats for print and web.</p>
        </div>
    </section>

    <!-- ============= TESTIMONIALS ============= -->
    <section class="testimonials" aria-label="Client testimonials">
        <div class="testimonial" role="article">
            <p>"Working with Unimax changed my portfolio — the level of craft and direction was outstanding."</p>
            <div class="who">— Naomi A., Creative Director</div>
        </div>
        <div class="testimonial" role="article">
            <p>"Excellent studio environment and direction. The images delivered exceeded my expectations."</p>
            <div class="who">— Michael R., Actor</div>
        </div>
    </section>

    <!-- ============= STATS & CTA ============= -->
    <section class="stats-row" aria-label="Statistics and booking">
        <div class="stat" role="region" aria-label="Client reviews">
            <h3 id="statClients">0</h3>
            <p>Client Reviews</p>
        </div>
        <div class="stat" role="region" aria-label="Support team">
            <h3 id="statTeam">0</h3>
            <p>Support Team</p>
        </div>
        <div class="stat" role="region" aria-label="Projects completed">
            <h3 id="statProjects">0</h3>
            <p>Projects Completed</p>
        </div>
        <div class="stat" role="region" aria-label="Years of experience">
            <h3 id="statYears">0</h3>
            <p>Years Experience</p>
        </div>
    </section>

    <section class="cta" role="region" aria-label="Call to action">
        <div class="left">
            <h3>Ready for your portrait session?</h3>
            <p>Book an in-studio or on-location session. We’ll prepare a tailored plan and guide you through wardrobe, pose, and expression to capture your best self.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn" aria-label="Contact us to book">Contact & Book</a>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/portrait.js') }}"></script>
@endpush