@extends('layouts.app')

@section('title', 'Social Media Content')

@section('content')
<!--
  Social Media Content Page
  - Full structure: Hero, Slider, Services, Testimonials, Stats, CTA
  - Social theme: vibrant gradients, punchy accents, glassy cards
  - Videos replace images (hero + slider + thumbnails)
  - Autoplay previews on thumbnails, active slide video plays, others pause
  - Keyboard accessibility, touch support, and counters animate on scroll
-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

    :root {
        --primary: #1da1f2;
        /* bright social blue */
        --accent: #ff0066;
        /* punchy magenta (instagramy) */
        --violet: #8a3ab9;
        /* deep violet */
        --muted: #6c757d;
        --bg: linear-gradient(180deg, #fff 0%, #fff6fb 100%);
        --card: #ffffff;
        --glass: rgba(255, 255, 255, 0.06);
        --shadow: 0 10px 28px rgba(15, 23, 42, 0.08);
        --rounded: 14px;
        --text: #1f2937;
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
    .social-hero {
        min-height: 62vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        padding: 5.5rem 0;
        overflow: hidden;
        color: #fff;
        background:
            radial-gradient(800px 400px at 85% 20%, rgba(138, 58, 185, 0.10), transparent 10%),
            linear-gradient(120deg, rgba(29, 161, 242, 0.9), rgba(255, 0, 102, 0.12)),
            url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;
    }

    .social-hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.12), rgba(255, 255, 255, 0.03));
        pointer-events: none;
    }

    .social-hero .inner {
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
        color: #fff;
        text-shadow: 0 6px 22px rgba(0, 0, 0, 0.28);
    }

    .hero-left h1 {
        font-size: clamp(1.8rem, 3.4vw, 3.1rem);
        font-weight: 800;
        margin: 0 0 1rem 0;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .hero-left p {
        margin: 0 0 1.25rem 0;
        line-height: 1.6;
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
        background: linear-gradient(90deg, var(--primary), var(--violet));
        color: #fff;
        padding: 12px 26px;
        border-radius: 999px;
        font-weight: 700;
        border: none;
        cursor: pointer;
        box-shadow: 0 8px 30px rgba(29, 161, 242, 0.18);
    }

    .btn-outline-light {
        background: transparent;
        border: 1.6px solid rgba(255, 255, 255, 0.18);
        color: #fff;
        padding: 12px 22px;
        border-radius: 999px;
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
        border: 1px solid rgba(255, 255, 255, 0.06);
    }

    .hero-right video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .hero-badge {
        position: absolute;
        right: 6%;
        top: 8%;
        z-index: 3;
        background: rgba(255, 255, 255, 0.06);
        border-radius: 10px;
        padding: 10px 14px;
        color: #fff;
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255, 255, 255, 0.04);
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .hero-badge small {
        font-weight: 700;
        color: var(--primary);
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
        grid-template-columns: 1fr 320px;
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
        left: 20px;
        bottom: 20px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        color: #fff;
        padding: 12px 14px;
        border-radius: 10px;
        max-width: 66%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.24);
    }

    .caption h4 {
        margin: 0 0 6px 0;
        font-size: 1.05rem;
    }

    .caption p {
        margin: 0;
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.95);
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
        background: rgba(255, 255, 255, 0.06);
        border: none;
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
        background: linear-gradient(180deg, #fff6fb, #ffffff);
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: stretch;
        overflow: auto;
    }

    .thumb {
        height: 96px;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 240ms ease, transform 200ms ease;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #000;
        position: relative;
    }

    .thumb.active {
        border-color: var(--accent);
        transform: translateY(-4px);
        box-shadow: 0 10px 30px rgba(138, 58, 185, 0.06);
    }

    .thumb video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

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
        margin-top: 2.25rem;
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
        box-shadow: 0 18px 48px rgba(15, 23, 42, 0.06);
    }

    .service i {
        font-size: 1.6rem;
        color: var(--accent);
        display: block;
        margin-bottom: 10px;
    }

    .service h4 {
        margin: 6px 0 8px 0;
        color: var(--primary);
        font-weight: 700;
    }

    .service p {
        color: var(--muted);
        margin: 0;
    }

    /* ===== TESTIMONIALS ===== */
    .testimonials {
        margin-top: 2.25rem;
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
        color: var(--violet);
    }

    /* ===== STATS & CTA ===== */
    .stats-row {
        margin-top: 2.25rem;
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
        color: var(--accent);
        font-weight: 800;
    }

    .stat p {
        color: var(--muted);
        margin: 8px 0 0 0;
    }

    .cta {
        margin-top: 2.5rem;
        background: linear-gradient(90deg, var(--primary), var(--violet));
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
        background: var(--accent);
        color: #fff;
        padding: 12px 22px;
        border-radius: 999px;
        font-weight: 700;
        text-decoration: none;
    }

    /* ===== Responsive ===== */
    @media (max-width: 1100px) {
        .slider {
            grid-template-columns: 1fr 260px;
        }

        .hero-right {
            width: 380px;
            height: 260px;
        }
    }

    @media (max-width: 920px) {
        .social-hero .inner {
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
        outline: 3px solid rgba(138, 58, 185, 0.14);
        outline-offset: 2px;
    }
</style>

<!-- ===== HERO ===== -->
<section class="social-hero" aria-label="Hero - Social Media Content">
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
        const slider = document.getElementById('socialSlider');
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
                    // if the thumb already has src, keep it; otherwise try to lazy load from data-src attr
                    lazyLoadVideo(vid);
                    vid.muted = true;
                    vid.loop = true;
                    vid.playsInline = true;
                    vid.play().catch(() => {
                        /* autoplay blocked — ok */
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
            }
        });

        // play only the active slide video
        function playActiveVideo(i) {
            slides.forEach((s, idx) => {
                const v = s.querySelector('video');
                if (!v) return;
                if (idx === i) {
                    lazyLoadVideo(v);
                    v.muted = true;
                    v.play().catch(() => {
                        /* autoplay blocked; user can press play */
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
            // lazy load current and neighbors
            const actVid = slides[i].querySelector('video');
            lazyLoadVideo(actVid);
            const nextIdx = (i + 1) % slides.length;
            const prevIdx = (i - 1 + slides.length) % slides.length;
            [nextIdx, prevIdx].forEach(j => {
                const v = slides[j].querySelector('video');
                lazyLoadVideo(v);
            });
            playActiveVideo(i);

            if (userTriggered) resetAuto();
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
            if (e.key === 'ArrowRight') nextSlide(true);
            if (e.key === 'ArrowLeft') prevSlide(true);
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
                id: 'statPosts',
                target: 1200
            },
            {
                id: 'statReels',
                target: 420
            },
            {
                id: 'statCampaigns',
                target: 88
            },
            {
                id: 'statClients',
                target: 65
            }
        ];
        const ANIM_DURATION = 1400;

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
            thumbs.forEach(t => {
                const v = t.querySelector('video');
                if (v) try {
                    v.pause();
                } catch (e) {}
            });
            slides.forEach(s => {
                const v = s.querySelector('video');
                if (v) try {
                    v.pause();
                } catch (e) {}
            });
            stopAuto();
        }
    });
</script>
@endsection