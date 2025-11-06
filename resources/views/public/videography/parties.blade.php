@extends('layouts.app')

@section('title', 'Parties & Concerts Videography')

@section('content')
<!--
  Parties & Concerts Videography Page
  - Video slider with autoplay & thumbnails
  - Services
  - Testimonials
  - Stats
  - CTA
  - Matches the existing party/concert photography theme
-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

    :root {
        --navy: #001f5b;
        --primary: #28a745;
        --muted: #6c757d;
        --bg: #e6f4ea;
        --card: #ffffff;
        --shadow: 0 10px 30px rgba(16, 24, 40, 0.08);
        --rounded: 12px;
        --rose-overlay: rgba(110, 50, 70, 0.8);
    }

    body,
    html {
        font-family: 'Poppins', system-ui;
        color: #111;
        margin: 0;
        padding: 0;
        background: var(--bg);
    }

    /* ===== Hero ===== */
    .party-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background: linear-gradient(120deg, var(--rose-overlay), var(--rose-overlay)),
            url('https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?q=80&w=1200&auto=format&fit=crop') center/cover;
        color: #fff;
        padding: 6rem 0;
    }

    .party-hero .inner {
        width: 92%;
        max-width: 1200px;
        display: flex;
        gap: 2rem;
        align-items: center;
    }

    .hero-left {
        flex: 1;
        max-width: 640px;
    }

    .hero-left h1 {
        font-size: clamp(1.6rem, 3.4vw, 2.6rem);
        line-height: 1.05;
        margin: 0 0 1rem;
        font-weight: 800;
    }

    .hero-left p {
        color: rgba(255, 255, 255, 0.92);
        margin: 0 0 1.25rem;
    }

    .hero-cta {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .btn-primary-hero {
        background: linear-gradient(90deg, var(--primary), #00d676);
        color: #fff;
        padding: 12px 22px;
        border-radius: 28px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-outline-light {
        background: transparent;
        color: #fff;
        border: 1.6px solid rgba(255, 255, 255, 0.18);
        padding: 12px 20px;
        border-radius: 28px;
        font-weight: 600;
        text-decoration: none;
    }

    .hero-right {
        width: 420px;
        height: 280px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: var(--shadow);
        flex-shrink: 0;
    }

    .hero-right video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .page-container {
        width: 92%;
        max-width: 1300px;
        margin: 2.5rem auto;
    }

    /* ===== VIDEO SLIDER ===== */
    .slider {
        display: grid;
        grid-template-columns: 1fr 260px;
        gap: 1rem;
        background: var(--card);
        border-radius: var(--rounded);
        box-shadow: var(--shadow);
    }

    .slider-main {
        position: relative;
        min-height: 500px;
        background: #000;
        overflow: hidden;
        border-radius: var(--rounded);
    }

    .slide {
        position: absolute;
        inset: 0;
        opacity: 0;
        transform: scale(1.02);
        transition: opacity 700ms ease, transform 800ms ease;
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
    }

    .caption {
        position: absolute;
        left: 28px;
        bottom: 28px;
        background: rgba(0, 0, 0, 0.45);
        padding: 16px 20px;
        border-radius: 10px;
        color: #fff;
        max-width: 60%;
    }

    .caption h4 {
        margin: 0 0 6px;
    }

    .slider-thumbs {
        padding: 18px;
        background: linear-gradient(180deg, #fafbfd, #fff);
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
    }

    .thumb {
        width: 100%;
        height: 80px;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
    }

    .thumb.active {
        border-color: var(--primary);
        transform: translateY(-4px);
    }

    .thumb video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .slider-controls {
        position: absolute;
        left: 18px;
        top: 18px;
        display: flex;
        gap: 8px;
        z-index: 5;
    }

    .slider-controls button {
        background: rgba(255, 255, 255, 0.08);
        border: none;
        color: #fff;
        padding: 8px 10px;
        border-radius: 8px;
        cursor: pointer;
    }

    .autoplay-indicator {
        position: absolute;
        right: 18px;
        top: 18px;
        color: #fff;
        background: rgba(0, 0, 0, 0.35);
        padding: 8px 12px;
        border-radius: 10px;
        font-weight: 600;
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
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 8px 26px rgba(16, 24, 40, 0.06);
    }

    .service i {
        font-size: 1.6rem;
        color: var(--primary);
    }

    .service h4 {
        margin: 0;
        color: var(--navy);
        font-weight: 700;
    }

    .service p {
        color: var(--muted);
    }

    /* ===== TESTIMONIALS ===== */
    .testimonials {
        margin-top: 2.5rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .testimonial {
        background: var(--card);
        border-radius: 12px;
        padding: 18px;
        box-shadow: var(--shadow);
        flex: 1;
    }

    .testimonial p {
        font-style: italic;
        color: #333;
    }

    .testimonial .who {
        font-weight: 700;
        color: var(--primary);
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
        border-radius: 12px;
        padding: 18px;
        text-align: center;
        box-shadow: var(--shadow);
    }

    .stat h3 {
        color: var(--primary);
        font-size: 2.1rem;
        font-weight: 800;
    }

    .cta {
        margin-top: 2.25rem;
        background: linear-gradient(90deg, var(--rose-overlay), #00d676);
        color: #fff;
        border-radius: 12px;
        padding: 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .cta .cta-btn {
        background: #fff;
        color: var(--primary);
        padding: 12px 22px;
        border-radius: 28px;
        font-weight: 700;
        text-decoration: none;
    }

    @media(max-width:920px) {
        .party-hero .inner {
            flex-direction: column;
            text-align: center;
        }

        .hero-right {
            width: 90%;
            height: 220px;
        }

        .slider {
            grid-template-columns: 1fr;
        }

        .slider-thumbs {
            flex-direction: row;
            overflow-x: auto;
        }

        .services-grid {
            grid-template-columns: 1fr;
        }

        .testimonials {
            flex-direction: column;
        }

        .stats-row {
            flex-direction: column;
        }

        .cta {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<!-- ===== HERO ===== -->
<section class="party-hero">
    <div class="inner">
        <div class="hero-left">
            <h1>Parties & Concerts Videography</h1>
            <p>Bring your events to life with vibrant video coverage. From DJ nights to festivals, capture every beat and every smile.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Videographer</a>
                <a href="#portfolio" class="btn-outline-light">View Sample Videos</a>
            </div>
        </div>
        <div class="hero-right">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" autoplay muted loop></video>
        </div>
    </div>
</section>

<div class="page-container" id="portfolio">
    <!-- ===== VIDEO SLIDER ===== -->
    <section style="margin-top:5rem">
        <div class="slider" id="videoSlider">
            <div class="slider-main">
                <div class="slide active">
                    <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                    <div class="caption">
                        <h4>DJ Night Highlights</h4>
                        <p>Energetic crowd, lights, and music captured seamlessly.</p>
                    </div>
                </div>
                <div class="slide">
                    <video src="https://www.w3schools.com/html/movie.mp4" controls></video>
                    <div class="caption">
                        <h4>Concert Vibes</h4>
                        <p>Performers and audience moments filmed professionally.</p>
                    </div>
                </div>
                <div class="slide">
                    <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                    <div class="caption">
                        <h4>Festival Aftermovie</h4>
                        <p>Outdoor events captured in cinematic style.</p>
                    </div>
                </div>

                <div class="slider-controls">
                    <button id="prevBtn">◀</button><button id="nextBtn">▶</button>
                </div>
                <div class="autoplay-indicator" id="autoplayIndicator">Auto • On</div>
            </div>

            <aside class="slider-thumbs">
                <div class="thumb active"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
                <div class="thumb"><video src="https://www.w3schools.com/html/movie.mp4"></video></div>
                <div class="thumb"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
            </aside>
        </div>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-camera-video-fill"></i>
            <h4>Dynamic Event Coverage</h4>
            <p>Capture every high-energy moment from start to finish.</p>
        </div>
        <div class="service"><i class="bi bi-lightning-fill"></i>
            <h4>Concert Videography</h4>
            <p>Professional coverage for performers and audience interactions.</p>
        </div>
        <div class="service"><i class="bi bi-music-note-beamed"></i>
            <h4>Aftermovie Production</h4>
            <p>Highlight reels and cinematic event videos for marketing or memories.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"The videography team captured the party energy perfectly — it felt like we were back at the event!"</p>
            <div class="who">— DJ Matrix</div>
        </div>
        <div class="testimonial">
            <p>"Our concert coverage videos were amazing — professional and lively!"</p>
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
            <h3 id="statVideos">0</h3>
            <p>Videos Delivered</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years of Experience</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Relive Your Event Through Videography</h3>
            <p>Book our team for your next party, concert, or festival and capture every unforgettable moment on video.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>
</div>

<script>
    (function() {
        const slides = document.querySelectorAll('#videoSlider .slide');
        const thumbs = document.querySelectorAll('#videoSlider .thumb');
        const next = document.getElementById('nextBtn');
        const prev = document.getElementById('prevBtn');
        const indicator = document.getElementById('autoplayIndicator');
        let i = 0,
            auto = true,
            timer;

        function show(n) {
            if (n < 0) n = slides.length - 1;
            if (n >= slides.length) n = 0;
            slides.forEach((s, j) => s.classList.toggle('active', j === n));
            thumbs.forEach((t, j) => t.classList.toggle('active', j === n));
            i = n;
        }

        function nextSlide() {
            show(i + 1);
        }

        function prevSlide() {
            show(i - 1);
        }

        function start() {
            timer = setInterval(nextSlide, 4000);
            indicator.textContent = 'Auto • On';
        }

        function stop() {
            clearInterval(timer);
            indicator.textContent = 'Auto • Off';
        }

        next.onclick = () => {
            nextSlide();
            stop();
        }
        prev.onclick = () => {
            prevSlide();
            stop();
        }
        thumbs.forEach((t, idx) => t.onclick = () => {
            show(idx);
            stop();
        });
        start();
        indicator.onclick = () => {
            auto = !auto;
            auto ? start() : stop();
        }
    })();

    (function() {
        const counters = [{
            id: 'statClients',
            target: 600
        }, {
            id: 'statEvents',
            target: 250
        }, {
            id: 'statVideos',
            target: 500
        }, {
            id: 'statYears',
            target: 10
        }];

        function animate(el, end) {
            let s = 0,
                d = 1500,
                st = null;

            function step(t) {
                if (!st) st = t;
                let p = Math.min((t - st) / d, 1);
                el.textContent = Math.floor(p * end) + '+';
                if (p < 1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
        }
        window.addEventListener('scroll', () => {
            counters.forEach(c => {
                const e = document.getElementById(c.id);
                if (e && e.getBoundingClientRect().top < window.innerHeight - 80 && !e.dataset.done) {
                    e.dataset.done = true;
                    animate(e, c.target);
                }
            });
        });
    })();
</script>
@endsection