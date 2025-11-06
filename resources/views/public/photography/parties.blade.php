@extends('layouts.app')

@section('title', 'Parties & Concerts')

@section('content')
<!--
  Parties & Concerts Photography Page
  - Sliding event gallery (autoplay, thumbnails, keyboard support)
  - Service highlights
  - Testimonials
  - Counters
  - Contact CTA
  - Uses Poppins font (official corporate)
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

    * {
        box-sizing: border-box;
    }

    body,
    html {
        font-family: 'Poppins', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
        color: #111;
        margin: 0;
        padding: 0;
    }

    /* ===== Hero ===== */
    .party-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
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
        border: none;
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

    .hero-right img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* ===== Shared ===== */
    .page-container {
        width: 92%;
        max-width: 1300px;
        margin: 2.5rem auto;
    }

    .slider {
        position: relative;
        width: 100%;
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

    .slide img {
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

    .thumb img {
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

    .testimonials {
        margin-top: 2.5rem;
        display: flex;
        gap: 1rem;
    }

    .testimonial {
        background: #fff;
        border-radius: 12px;
        padding: 18px;
        box-shadow: var(--shadow);
        flex: 1;
    }

    .testimonial p {
        font-style: italic;
        color: #333;
    }

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
    }

    .cta .cta-btn {
        background: #fff;
        color: var(--primary);
        padding: 12px 22px;
        border-radius: 28px;
        font-weight: 700;
        text-decoration: none;
    }

    @media (max-width:920px) {
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

<script>
    (function() {
        const slides = document.querySelectorAll('#partySlider .slide');
        const thumbs = document.querySelectorAll('#partySlider .thumb');
        const next = document.getElementById('nextBtn');
        const prev = document.getElementById('prevBtn');
        const indicator = document.getElementById('autoplayIndicator');
        let i = 0,
            auto = true,
            timer;

        function show(n) {
            if (n < 0) n = slides.length - 1;
            if (n >= slides.length) n = 0;
            slides.forEach((s, j) => {
                s.classList.toggle('active', j === n);
            });
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
        };
        prev.onclick = () => {
            prevSlide();
            stop();
        };
        thumbs.forEach((t, idx) => t.onclick = () => {
            show(idx);
            stop();
        });
        start();
        indicator.onclick = () => {
            auto = !auto;
            auto ? start() : stop();
        };
    })();
    (function() {
        const counters = [{
            id: 'statClients',
            target: 600
        }, {
            id: 'statEvents',
            target: 250
        }, {
            id: 'statPhotos',
            target: 5000
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