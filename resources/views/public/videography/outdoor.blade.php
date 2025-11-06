@extends('layouts.app')

@section('title', 'Outdoor & Nature Videography')

@section('content')
<!--
  Outdoor & Nature Videography Page
  - Full structure: Hero, Slider, Services, Testimonials, Stats, CTA
  - Nature theme: greens, earth tones, soft background
  - Videos replace images (hero + slider + thumbnails)
  - Autoplay previews on thumbnails, active slide video plays, others pause
  - Keyboard accessibility, touch support, and counters animate on scroll
-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

    :root {
        --forest: #2e7d32;
        --leaf: #81c784;
        --earth: #a1887f;
        --sun: #fbc02d;
        --muted: #6c757d;
        --bg: #edf7ef;
        --card: #ffffff;
        --shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        --rounded: 12px;
        --text: #2e2e2e;
        --glass: rgba(255, 255, 255, 0.06);
    }

    html,
    body {
        font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        margin: 0;
        padding: 0;
        color: var(--text);
        background: var(--bg);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    /* ===== HERO ===== */
    .outdoor-hero {
        min-height: 62vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background:
            linear-gradient(120deg, rgba(46, 125, 50, 0.9), rgba(241, 196, 15, 0.08)),
            url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;
        padding: 6rem 0;
        overflow: hidden;
        color: #fff;
    }

    .outdoor-hero::after {
        /* subtle vignette */
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.18), rgba(0, 0, 0, 0.22));
        pointer-events: none;
    }

    .outdoor-hero .inner {
        width: 92%;
        max-width: 1200px;
        display: flex;
        gap: 2rem;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .hero-left {
        flex: 1;
        max-width: 720px;
    }

    .hero-left h1 {
        font-size: clamp(1.9rem, 3.6vw, 3.2rem);
        font-weight: 800;
        margin: 0 0 1rem 0;
        color: var(--forest);
        text-shadow: 0 2px 18px rgba(0, 0, 0, 0.25);
    }

    .hero-left p {
        margin: 0 0 1.25rem 0;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.95);
        max-width: 54em;
    }

    .hero-cta {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .btn-primary-hero {
        background: linear-gradient(90deg, var(--forest), var(--leaf));
        color: #fff;
        padding: 12px 26px;
        border-radius: 28px;
        font-weight: 700;
        border: none;
        cursor: pointer;
        box-shadow: 0 6px 18px rgba(46, 125, 50, 0.18);
    }

    .btn-outline-light {
        background: transparent;
        border: 1.6px solid rgba(255, 255, 255, 0.18);
        color: #fff;
        padding: 12px 22px;
        border-radius: 28px;
        font-weight: 600;
        cursor: pointer;
    }

    .hero-right {
        width: 480px;
        height: 320px;
        border-radius: var(--rounded);
        overflow: hidden;
        box-shadow: var(--shadow);
        flex-shrink: 0;
        background: #000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-right video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* subtle floating accent */
    .hero-badge {
        position: absolute;
        right: 6%;
        top: 8%;
        z-index: 3;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 10px;
        padding: 10px 14px;
        color: #fff;
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255, 255, 255, 0.04);
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .hero-badge small {
        font-weight: 700;
        color: var(--leaf);
    }

    /* ===== PAGE CONTAINER ===== */
    .page-container {
        width: 92%;
        max-width: 1300px;
        margin: 2.5rem auto 6rem auto;
    }

    /* ===== SLIDER ===== */
    .slider {
        display: grid;
        grid-template-columns: 1fr 280px;
        gap: 1rem;
        background: var(--card);
        border-radius: var(--rounded);
        box-shadow: var(--shadow);
        overflow: hidden;
    }

    .slider-main {
        position: relative;
        min-height: 520px;
        background: #000;
        overflow: hidden;
    }

    .slide {
        position: absolute;
        inset: 0;
        opacity: 0;
        transform: scale(1.02);
        transition: opacity 700ms ease, transform 800ms ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slide.active {
        opacity: 1;
        transform: scale(1);
        z-index: 2;
    }

    .slide video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        background: #000;
    }

    .caption {
        position: absolute;
        left: 24px;
        bottom: 24px;
        background: rgba(46, 125, 50, 0.78);
        color: #fff;
        padding: 12px 16px;
        border-radius: 8px;
        max-width: 64%;
        box-shadow: 0 6px 18px rgba(46, 125, 50, 0.12);
    }

    .caption h4 {
        margin: 0 0 6px 0;
        font-size: 1.1rem;
    }

    .caption p {
        margin: 0;
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.92);
    }

    .slider-controls {
        position: absolute;
        top: 16px;
        left: 16px;
        display: flex;
        gap: 8px;
        z-index: 5;
    }

    .slider-controls button {
        background: var(--glass);
        border: 1px solid rgba(255, 255, 255, 0.06);
        color: #fff;
        padding: 8px 10px;
        border-radius: 8px;
        cursor: pointer;
        backdrop-filter: blur(4px);
    }

    .autoplay-toggle {
        position: absolute;
        right: 16px;
        top: 16px;
        z-index: 5;
        background: rgba(0, 0, 0, 0.4);
        padding: 8px 12px;
        border-radius: 9px;
        color: #fff;
        font-weight: 700;
    }

    .slider-thumbs {
        padding: 18px;
        background: linear-gradient(180deg, #d9f0e0, #edf7ef);
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: stretch;
        overflow: auto;
    }

    .thumb {
        height: 86px;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 240ms ease, transform 200ms ease;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #000;
    }

    .thumb.active {
        border-color: var(--forest);
        transform: translateY(-3px);
        box-shadow: 0 6px 18px rgba(46, 125, 50, 0.08);
    }

    .thumb video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* small label for thumb */
    .thumb-label {
        position: absolute;
        left: 8px;
        bottom: 8px;
        background: rgba(0, 0, 0, 0.45);
        color: #fff;
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 12px;
    }

    /* ===== SERVICES ===== */
    .services-grid {
        margin-top: 2.5rem;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.25rem;
    }

    .service {
        background: var(--card);
        border-radius: var(--rounded);
        padding: 20px;
        box-shadow: var(--shadow);
        text-align: center;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .service:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
    }

    .service i {
        font-size: 1.6rem;
        color: var(--forest);
        display: block;
        margin-bottom: 10px;
    }

    .service h4 {
        margin: 6px 0 8px 0;
        color: var(--sun);
        font-weight: 700;
    }

    .service p {
        color: var(--muted);
        margin: 0;
    }

    /* ===== TESTIMONIALS ===== */
    .testimonials {
        margin-top: 2.5rem;
        display: flex;
        gap: 1.25rem;
        flex-wrap: wrap;
    }

    .testimonial {
        flex: 1;
        background: var(--card);
        border-radius: var(--rounded);
        padding: 18px;
        box-shadow: var(--shadow);
    }

    .testimonial p {
        font-style: italic;
        color: var(--text);
        margin: 0 0 12px 0;
    }

    .testimonial .who {
        font-weight: 700;
        color: var(--forest);
    }

    /* ===== STATS & CTA ===== */
    .stats-row {
        margin-top: 2.5rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .stat {
        flex: 1;
        background: var(--card);
        border-radius: var(--rounded);
        padding: 18px;
        text-align: center;
        box-shadow: var(--shadow);
    }

    .stat h3 {
        margin: 0;
        font-size: 2rem;
        color: var(--forest);
        font-weight: 800;
    }

    .stat p {
        color: var(--muted);
        margin: 8px 0 0 0;
    }

    .cta {
        margin-top: 2.5rem;
        background: linear-gradient(90deg, var(--forest), var(--leaf));
        color: #fff;
        border-radius: var(--rounded);
        padding: 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .cta h3 {
        margin: 0;
        font-size: 1.4rem;
        font-weight: 800;
    }

    .cta p {
        margin: 4px 0 0 0;
        color: rgba(255, 255, 255, 0.95);
    }

    .cta .cta-btn {
        background: var(--earth);
        color: #fff;
        padding: 12px 22px;
        border-radius: 28px;
        font-weight: 700;
        text-decoration: none;
    }

    /* ===== Responsive ===== */
    @media (max-width: 1100px) {
        .slider {
            grid-template-columns: 1fr 220px;
        }

        .hero-right {
            width: 380px;
            height: 260px;
        }
    }

    @media (max-width: 920px) {
        .outdoor-hero .inner {
            flex-direction: column;
            text-align: center;
            padding: 0 12px;
        }

        .hero-right {
            width: 92%;
            height: 220px;
        }

        .slider {
            grid-template-columns: 1fr;
        }

        .slider-thumbs {
            flex-direction: row;
            gap: 8px;
            padding: 12px;
            overflow-x: auto;
        }

        .thumb {
            min-width: 160px;
            height: 92px;
        }

        .services-grid {
            grid-template-columns: 1fr;
        }

        .cta {
            flex-direction: column;
            text-align: center;
        }
    }

    /* keyboard focus */
    .thumb:focus,
    .slider-controls button:focus,
    .btn-primary-hero:focus,
    .btn-outline-light:focus {
        outline: 3px solid rgba(46, 125, 50, 0.18);
        outline-offset: 2px;
    }
</style>

<!-- ===== HERO ===== -->
<section class="outdoor-hero" aria-label="Hero - Outdoor & Nature Videography">
    <div class="inner">
        <div class="hero-left">
            <h1>Outdoor & Nature Videography</h1>
            <p>We craft cinematic outdoor films — from sweeping landscapes and golden-hour portraits to wildlife documentaries and adventure recaps. Motion, sound, and light combined to preserve nature's stories.</p>
            <div class="hero-cta" role="group" aria-label="Hero actions">
                <a href="{{ route('contact') }}" class="btn-primary-hero" role="button">Book a Shoot</a>
                <a href="#gallery" class="btn-outline-light" role="button">View Samples</a>
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
    <section class="slider" id="natureSlider" aria-label="Video gallery">
        <div class="slider-main" id="sliderMain" role="region" aria-live="polite">

            <!-- Slide 0 -->
            <div class="slide active" data-index="0" aria-hidden="false">
                <video data-src="https://www.w3schools.com/html/mov_bbb.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption" role="status" aria-live="polite">
                    <h4>Forest Landscapes</h4>
                    <p>Vast forest canopies and tranquil walking trails, captured with cinematic motion.</p>
                </div>
            </div>

            <!-- Slide 1 -->
            <div class="slide" data-index="1" aria-hidden="true">
                <video data-src="https://www.w3schools.com/html/movie.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption">
                    <h4>Wildlife Closeups</h4>
                    <p>Dedicated wildlife sequences shot with patience and a storytelling eye.</p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="slide" data-index="2" aria-hidden="true">
                <video data-src="https://www.w3schools.com/html/mov_bbb.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption">
                    <h4>Mountain Vistas</h4>
                    <p>Epic aerial and tracking shots for panoramic storytelling.</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="slide" data-index="3" aria-hidden="true">
                <video data-src="https://www.w3schools.com/html/movie.mp4" preload="metadata" playsinline controls muted></video>
                <div class="caption">
                    <h4>Golden Hour Films</h4>
                    <p>Sunrise/sunset sequences that emphasize color, warmth, and motion.</p>
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
            <i class="bi bi-camera-video-fill" aria-hidden="true"></i>
            <h4>Landscape Films</h4>
            <p>Slow, cinematic approaches to highlight scenery — ideal for documentaries and brand films.</p>
        </div>
        <div class="service">
            <i class="bi bi-binoculars-fill" aria-hidden="true"></i>
            <h4>Wildlife Sequences</h4>
            <p>Carefully planned shoots to capture authentic animal behavior with minimal disturbance.</p>
        </div>
        <div class="service">
            <i class="bi bi-sun-fill" aria-hidden="true"></i>
            <h4>Golden Hour Shoots</h4>
            <p>Sunrise and sunset video sessions for warm, emotive results.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials" aria-label="Testimonials">
        <div class="testimonial">
            <p>"Absolutely beautiful films — the team captured our retreat with cinematic finesse."</p>
            <div class="who">— Nature Retreat Organizer</div>
        </div>
        <div class="testimonial">
            <p>"The wildlife footage surpassed our expectations. Professional and patient crew."</p>
            <div class="who">— Conservation Project</div>
        </div>
    </section>

    <!-- ===== STATS ===== -->
    <section class="stats-row" aria-label="Statistics">
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
    <section class="cta" aria-label="Call to action">
        <div class="left">
            <h3>Ready to Explore?</h3>
            <p>Book your outdoor or nature videography session and bring the beauty of the wild to life in motion.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn" role="button">Book Now</a>
        </div>
    </section>

</div>

<!-- ===== SCRIPTS ===== -->
<script>
    /* ============================
   Helper utilities
   ============================ */
    function $(sel, root = document) {
        return root.querySelector(sel);
    }

    function $all(sel, root = document) {
        return Array.from(root.querySelectorAll(sel));
    }

    document.addEventListener('DOMContentLoaded', function() {

        /* ============================
           Slider state
           ============================ */
        const slider = document.getElementById('natureSlider');
        const slides = $all('.slide', slider);
        const thumbs = $all('.thumb', slider);
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const autoplayToggle = document.getElementById('autoplayToggle');
        const heroVideo = document.getElementById('heroVideo');

        let index = 0;
        let auto = true;
        let timer = null;
        const AUTO_INTERVAL = 4500;

        // lazy-load video sources from data-src to src
        function lazyLoadVideo(el) {
            if (!el) return;
            const src = el.getAttribute('data-src');
            if (!el.getAttribute('src') && src) {
                el.setAttribute('src', src);
            }
        }

        // ensure thumb video previews are playing muted loop silently
        function initThumbPreviews() {
            thumbs.forEach((t, i) => {
                const vid = t.querySelector('video');
                if (vid) {
                    lazyLoadVideo(vid);
                    vid.muted = true;
                    vid.loop = true;
                    // autoplay for modern browsers: try play, ignore rejection
                    vid.play().catch(() => {
                        /* silence */
                    });
                }
            });
        }

        // prepare slides: lazy load first slide immediately
        slides.forEach((s, i) => {
            const v = s.querySelector('video');
            if (i === index) {
                lazyLoadVideo(v);
                v.muted = true;
                v.playsInline = true;
                // we'll control play/pause when slide becomes active
            }
        });

        // play only the active slide video
        function playActiveVideo(i) {
            slides.forEach((s, idx) => {
                const v = s.querySelector('video');
                if (!v) return;
                if (idx === i) {
                    lazyLoadVideo(v);
                    // ensure it's ready to play
                    v.muted = true;
                    // if controls are present, keep them; user can unmute if needed
                    v.play().catch(() => {
                        /* autoplay blocked; fine */
                    });
                } else {
                    try {
                        v.pause();
                        v.currentTime = 0;
                    } catch (e) {}
                }
            });
        }

        // update visible slide and thumb classes and accessibility attributes
        function showSlide(i, userTriggered = false) {
            if (i < 0) i = slides.length - 1;
            if (i >= slides.length) i = 0;
            slides.forEach((s, idx) => {
                const isActive = idx === i;
                s.classList.toggle('active', isActive);
                s.setAttribute('aria-hidden', !isActive);
            });
            thumbs.forEach((t, idx) => {
                t.classList.toggle('active', idx === i);
                t.setAttribute('aria-current', idx === i ? 'true' : 'false');
            });
            index = i;
            // lazy load the active slide's video and its immediate neighbors for smoother transitions
            const actVid = slides[i].querySelector('video');
            lazyLoadVideo(actVid);
            // pre-load neighbors
            const nextIdx = (i + 1) % slides.length;
            const prevIdx = (i - 1 + slides.length) % slides.length;
            [nextIdx, prevIdx].forEach(j => {
                const v = slides[j].querySelector('video');
                lazyLoadVideo(v);
            });
            // play the active video
            playActiveVideo(i);

            // if user triggered, temporarily pause autoplay (then reset)
            if (userTriggered) {
                resetAuto();
                // keep autoplay resumed after delay
                // handled by resetAuto
            }
        }

        // navigation helpers
        function nextSlide(userTriggered = false) {
            showSlide((index + 1) % slides.length, userTriggered);
        }

        function prevSlide(userTriggered = false) {
            showSlide((index - 1 + slides.length) % slides.length, userTriggered);
        }

        // autoplay engine
        function startAuto() {
            if (timer) clearInterval(timer);
            if (!auto) return;
            timer = setInterval(() => nextSlide(false), AUTO_INTERVAL);
            autoplayToggle.textContent = 'Auto • On';
            autoplayToggle.setAttribute('aria-pressed', 'true');
        }

        function stopAuto() {
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
            autoplayToggle.textContent = 'Auto • Off';
            autoplayToggle.setAttribute('aria-pressed', 'false');
        }

        function resetAuto() {
            stopAuto();
            if (auto) {
                // short delay then restart to avoid immediate jump while user watches
                setTimeout(startAuto, 1400);
            }
        }

        // attach events
        nextBtn.addEventListener('click', () => nextSlide(true));
        prevBtn.addEventListener('click', () => prevSlide(true));
        autoplayToggle.addEventListener('click', () => {
            auto = !auto;
            if (auto) startAuto();
            else stopAuto();
        });
        autoplayToggle.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                auto = !auto;
                if (auto) startAuto();
                else stopAuto();
            }
        });

        thumbs.forEach((t, idx) => {
            t.addEventListener('click', () => {
                showSlide(idx, true);
            });
            // keyboard nav
            t.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    showSlide(idx, true);
                } else if (e.key === 'ArrowRight') {
                    showSlide(Math.min(idx + 1, thumbs.length - 1), true);
                } else if (e.key === 'ArrowLeft') {
                    showSlide(Math.max(idx - 1, 0), true);
                }
            });
            // hover preview — if device supports hover, briefly play the thumb preview louder (still muted)
            t.addEventListener('mouseenter', () => {
                const v = t.querySelector('video');
                if (v) {
                    lazyLoadVideo(v);
                    v.play().catch(() => {});
                }
            });
            t.addEventListener('mouseleave', () => {
                const v = t.querySelector('video');
                if (v) {
                    try {
                        v.pause();
                        v.currentTime = 0;
                    } catch (e) {}
                }
            });
        });

        // keyboard support for slider arrows
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') {
                nextSlide(true);
            }
            if (e.key === 'ArrowLeft') {
                prevSlide(true);
            }
        });

        // touch swipe for slider-main
        (function addTouch() {
            const el = document.getElementById('sliderMain');
            if (!el) return;
            let startX = 0,
                startY = 0,
                dist = 0,
                startTime = 0;
            el.addEventListener('touchstart', function(e) {
                const t = e.changedTouches[0];
                startX = t.pageX;
                startY = t.pageY;
                startTime = new Date().getTime();
                stopAuto();
            }, {
                passive: true
            });
            el.addEventListener('touchend', function(e) {
                const t = e.changedTouches[0];
                dist = t.pageX - startX;
                const elapsed = new Date().getTime() - startTime;
                // threshold
                if (Math.abs(dist) > 60 && elapsed < 600) {
                    if (dist < 0) nextSlide(true);
                    else prevSlide(true);
                }
                if (auto) startAuto();
            }, {
                passive: true
            });
        })();

        // initialize thumb previews
        initThumbPreviews();

        // start first slide active video playing
        showSlide(index, false);
        if (auto) startAuto();

        /* ============================
           Counter animation on scroll
           ============================ */
        const counters = [{
                id: 'statOutdoor',
                target: 300
            },
            {
                id: 'statWildlife',
                target: 150
            },
            {
                id: 'statYears',
                target: 10
            },
            {
                id: 'statSatisfaction',
                target: 97
            }
        ];
        const ANIM_DURATION = 1500;

        function animateCounter(el, end, duration) {
            let start = 0;
            let startTime = null;

            function step(ts) {
                if (!startTime) startTime = ts;
                const progress = Math.min((ts - startTime) / duration, 1);
                const value = Math.floor(progress * (end - start) + start);
                el.textContent = value + (end > 1 ? '+' : '');
                if (progress < 1) requestAnimationFrame(step);
                else el.textContent = end + '+';
            }
            requestAnimationFrame(step);
        }

        let countersStarted = false;

        function checkCounters() {
            if (countersStarted) return;
            const section = document.querySelector('.stats-row');
            if (!section) return;
            const rect = section.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) {
                counters.forEach(c => {
                    const el = document.getElementById(c.id);
                    if (el) animateCounter(el, c.target, ANIM_DURATION);
                });
                countersStarted = true;
                window.removeEventListener('scroll', checkCounters);
            }
        }
        window.addEventListener('scroll', checkCounters);
        window.addEventListener('load', checkCounters);
        setTimeout(checkCounters, 300);

        /* ============================
           Accessibility: Pause hero on reduced motion
           ============================ */
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (prefersReducedMotion) {
            if (heroVideo) {
                heroVideo.pause();
                heroVideo.removeAttribute('autoplay');
            }
            // stop thumb previews
            thumbs.forEach(t => {
                const v = t.querySelector('video');
                if (v) {
                    try {
                        v.pause();
                    } catch (e) {}
                }
            });
            // pause slides
            slides.forEach(s => {
                const v = s.querySelector('video');
                if (v) {
                    try {
                        v.pause();
                    } catch (e) {}
                }
            });
            stopAuto();
        }
    });
</script>
@endsection