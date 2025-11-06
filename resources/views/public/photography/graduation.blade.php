@extends('layouts.app')

@section('title', 'Graduation Photography')

@section('content')
<!--
  Graduation Photography Page
  - Deep Blue & Gold Theme
  - Elegant, celebratory aesthetic
  - Same structure & responsiveness as Studio Sessions
-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

    :root {
        --navy: #0d1b2a;
        --purple: #3c096c;
        --gold: #ffd60a;
        --muted: #bfbfbf;
        --bg: #0d1b2a;
        --card: #112240;
        --shadow: 0 10px 30px rgba(0, 0, 0, 0.45);
        --rounded: 12px;
    }

    body,
    html {
        font-family: 'Poppins', system-ui;
        margin: 0;
        padding: 0;
        color: #f1f1f1;
        background: var(--bg);
    }

    /* ===== HERO ===== */
    .grad-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(120deg, rgba(13, 27, 42, 0.9), rgba(60, 9, 108, 0.85)),
            url('https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop') center/cover;
        color: #fff;
        padding: 6rem 0;
        overflow: hidden;
    }

    .grad-hero .inner {
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
        font-size: clamp(1.8rem, 3.5vw, 2.8rem);
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1rem;
        color: var(--gold);
    }

    .hero-left p {
        color: #f4f4f4;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .hero-cta {
        display: flex;
        gap: 0.8rem;
        flex-wrap: wrap;
    }

    .btn-primary-hero {
        background: linear-gradient(90deg, var(--purple), var(--gold));
        color: #fff;
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s;
    }

    .btn-primary-hero:hover {
        background: linear-gradient(90deg, var(--gold), #fff5c2);
        color: #000;
    }

    .btn-outline-light {
        border: 1.5px solid rgba(255, 255, 255, 0.4);
        padding: 12px 22px;
        color: #fff;
        border-radius: 28px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
    }

    .btn-outline-light:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .hero-right {
        width: 420px;
        height: 280px;
        overflow: hidden;
        border-radius: var(--rounded);
        box-shadow: var(--shadow);
    }

    .hero-right img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .page-container {
        width: 92%;
        max-width: 1300px;
        margin: 2.5rem auto;
    }

    /* ===== SLIDER ===== */
    .slider {
        display: grid;
        grid-template-columns: 1fr 260px;
        gap: 1rem;
        background: var(--card);
        box-shadow: var(--shadow);
        border-radius: var(--rounded);
        overflow: hidden;
    }

    .slider-main {
        position: relative;
        min-height: 500px;
        overflow: hidden;
        background: #000;
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

    .slide .caption {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: rgba(0, 0, 0, 0.65);
        padding: 14px 18px;
        border-radius: 10px;
        color: #fff;
        max-width: 65%;
    }

    .slider-thumbs {
        padding: 18px;
        background: linear-gradient(180deg, #1a1a1a, #112240);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .thumb {
        height: 80px;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 0.3s;
    }

    .thumb.active {
        border-color: var(--gold);
    }

    .thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .slider-controls {
        position: absolute;
        top: 18px;
        left: 18px;
        display: flex;
        gap: 8px;
        z-index: 3;
    }

    .slider-controls button {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: #fff;
        padding: 8px 10px;
        border-radius: 8px;
        cursor: pointer;
    }

    /* ===== SERVICES ===== */
    .services-grid {
        margin-top: 3rem;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .service {
        background: var(--card);
        border-radius: var(--rounded);
        padding: 20px;
        box-shadow: var(--shadow);
        text-align: center;
        transition: transform 0.3s;
    }

    .service:hover {
        transform: translateY(-4px);
    }

    .service i {
        font-size: 1.6rem;
        color: var(--gold);
    }

    .service h4 {
        margin: 10px 0 6px 0;
        color: var(--purple);
        font-weight: 700;
    }

    .service p {
        color: var(--muted);
        margin: 0;
    }

    /* ===== TESTIMONIALS ===== */
    .testimonials {
        margin-top: 3rem;
        display: flex;
        flex-wrap: wrap;
        gap: 1.25rem;
    }

    .testimonial {
        flex: 1;
        background: #112240;
        border-radius: var(--rounded);
        padding: 20px;
        box-shadow: var(--shadow);
    }

    .testimonial p {
        font-style: italic;
        margin-bottom: 10px;
        color: #ddd;
    }

    .testimonial .who {
        font-weight: 700;
        color: var(--gold);
    }

    /* ===== STATS & CTA ===== */
    .stats-row {
        margin-top: 3rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .stat {
        flex: 1;
        background: var(--card);
        border-radius: var(--rounded);
        text-align: center;
        padding: 20px;
        box-shadow: var(--shadow);
    }

    .stat h3 {
        color: var(--gold);
        font-weight: 800;
        font-size: 2rem;
        margin: 0;
    }

    .stat p {
        color: var(--muted);
        margin: 6px 0 0;
    }

    .cta {
        margin-top: 3rem;
        background: linear-gradient(90deg, var(--purple), var(--gold));
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
        font-weight: 800;
    }

    .cta p {
        margin-top: 4px;
    }

    .cta .cta-btn {
        background: #fff;
        color: var(--purple);
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 700;
    }

    @media (max-width: 920px) {
        .grad-hero .inner {
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

        .services-grid {
            grid-template-columns: 1fr;
        }

        .cta {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<!-- ===== HERO ===== -->
<section class="grad-hero">
    <div class="inner">
        <div class="hero-left">
            <h1>Graduation Photography</h1>
            <p>Capture the excitement, pride, and memories of your graduation day with professional photography tailored for ceremonies, gowns, and celebrations.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Session</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop" alt="Graduation cap and gown">
        </div>
    </div>
</section>

<!-- ===== CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- ===== SLIDER ===== -->
    <section class="slider" id="gradSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <img src="https://images.unsplash.com/photo-1606312619385-2e2b4ee64e02?q=80&w=1600&auto=format&fit=crop" alt="Graduation ceremony 1">
                <div class="caption">
                    <h4>Cap & Gown Moments</h4>
                    <p>Memorable shots of graduates in ceremonial attire.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <img src="https://images.unsplash.com/photo-1579370318446-2d9b0869e3ab?q=80&w=1600&auto=format&fit=crop" alt="Throwing caps">
                <div class="caption">
                    <h4>Celebratory Throw</h4>
                    <p>Capture the iconic moment of joy and celebration.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <img src="https://images.unsplash.com/photo-1596496050023-5c2e41a4748b?q=80&w=1600&auto=format&fit=crop" alt="Graduation portraits">
                <div class="caption">
                    <h4>Individual Portraits</h4>
                    <p>Professional close-ups to preserve memories for a lifetime.</p>
                </div>
            </div>
            <div class="slide" data-index="3">
                <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop" alt="Group photo">
                <div class="caption">
                    <h4>Group Shots</h4>
                    <p>Friends, classmates, and family together on your big day.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><img src="https://images.unsplash.com/photo-1606312619385-2e2b4ee64e02?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="1"><img src="https://images.unsplash.com/photo-1579370318446-2d9b0869e3ab?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="2"><img src="https://images.unsplash.com/photo-1596496050023-5c2e41a4748b?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="3"><img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=800&auto=format&fit=crop" alt=""></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-mortarboard-fill"></i>
            <h4>Ceremony Coverage</h4>
            <p>From processions to speeches, every moment captured in style.</p>
        </div>
        <div class="service"><i class="bi bi-camera-reels-fill"></i>
            <h4>Portrait Sessions</h4>
            <p>Professional close-ups and posed shots for graduates and family.</p>
        </div>
        <div class="service"><i class="bi bi-people-fill"></i>
            <h4>Group & Family Shots</h4>
            <p>Memorable photos with friends, classmates, and loved ones.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"Our graduation photos were stunning — the colors and emotions were perfectly captured!"</p>
            <div class="who">— University Alumni</div>
        </div>
        <div class="testimonial">
            <p>"Professional, timely, and fun! They made our graduation day unforgettable."</p>
            <div class="who">— Jane, Graduate</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statGraduations">0</h3>
            <p>Graduations Covered</p>
        </div>
        <div class="stat">
            <h3 id="statPhotos">0</h3>
            <p>Memorable Photos</p>
        </div>
        <div class="stat">
            <h3 id="statExperience">0</h3>
            <p>Years of Experience</p>
        </div>
        <div class="stat">
            <h3 id="statSatisfaction">0</h3>
            <p>Client Satisfaction</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Celebrate Your Achievement</h3>
            <p>Book your graduation photography session now and preserve your proudest moments in vibrant, professional images.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>
</div>

<script>
    (function() {
        const slider = document.getElementById('gradSlider');
        const slides = slider.querySelectorAll('.slide');
        const thumbs = slider.querySelectorAll('.thumb');
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        let index = 0;
        let timer;

        function showSlide(i) {
            slides.forEach((s, idx) => {
                s.classList.toggle('active', idx === i);
                thumbs[idx].classList.toggle('active', idx === i);
            });
            index = i;
        }

        function next() {
            index = (index + 1) % slides.length;
            showSlide(index);
        }

        function prev() {
            index = (index - 1 + slides.length) % slides.length;
            showSlide(index);
        }

        nextBtn.onclick = () => {
            next();
            resetAuto();
        };
        prevBtn.onclick = () => {
            prev();
            resetAuto();
        };
        thumbs.forEach((t, i) => t.onclick = () => {
            showSlide(i);
            resetAuto();
        });

        function startAuto() {
            timer = setInterval(next, 4000);
        }

        function stopAuto() {
            clearInterval(timer);
        }

        function resetAuto() {
            stopAuto();
            startAuto();
        }

        slider.onmouseenter = stopAuto;
        slider.onmouseleave = startAuto;
        startAuto();
    })();

    (function() {
        const counters = [{
                id: 'statGraduations',
                target: 300
            },
            {
                id: 'statPhotos',
                target: 5000
            },
            {
                id: 'statExperience',
                target: 10
            },
            {
                id: 'statSatisfaction',
                target: 99
            }
        ];
        const duration = 1700;

        function animateValue(el, start, end, duration) {
            let startTime = null;

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                const value = Math.floor(progress * (end - start) + start);
                el.textContent = value + (end > 1 ? '+' : '');
                if (progress < 1) requestAnimationFrame(step);
                else el.textContent = end + (end > 1 ? '+' : '');
            }
            requestAnimationFrame(step);
        }

        let started = false;

        function checkStart() {
            if (started) return;
            const section = document.querySelector('.stats-row');
            if (!section) return;
            const rect = section.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) {
                counters.forEach(c => {
                    const el = document.getElementById(c.id);
                    if (el) animateValue(el, 0, c.target, duration);
                });
                started = true;
                window.removeEventListener('scroll', checkStart);
            }
        }

        window.addEventListener('scroll', checkStart);
        window.addEventListener('load', checkStart);
        setTimeout(checkStart, 300);
    })();
</script>
@endsection