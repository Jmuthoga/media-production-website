@extends('layouts.app')

@section('title', 'Weddings & Engagements Videography')

@section('content')
<!--
  Weddings & Engagements Videography Page (Romantic Edition)
  - Color Theme: Rose, Blush, Cream, Gold
  - Features:
      * Hero Section
      * Video Slider with Thumbnails
      * Services
      * Testimonials
      * Stats Counters
      * Call-to-Action
  - Fully Responsive & Animated
-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

    :root {
        --rose: #e5989b;
        --blush: #ffcdb2;
        --cream: #fff0f3;
        --deep-rose: #b5838d;
        --gold: #f7b267;
        --muted: #6c757d;
        --bg: #fff9fa;
        --card: #ffffff;
        --shadow: 0 10px 30px rgba(183, 131, 141, 0.15);
        --rounded: 12px;
    }

    body,
    html {
        font-family: 'Poppins', system-ui;
        color: #2b2b2b;
        background: var(--bg);
        margin: 0;
        padding: 0;
    }

    /* ===== HERO ===== */
    .video-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        padding: 6rem 0;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        background: linear-gradient(120deg, rgba(229, 152, 155, 0.75), rgba(181, 131, 141, 0.75)),
            url('https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .video-hero .inner {
        width: 92%;
        max-width: 1200px;
        display: flex;
        gap: 2rem;
        align-items: center;
        flex-wrap: wrap;
        text-align: center;
    }

    .hero-left {
        flex: 1;
        max-width: 640px;
    }

    .hero-left h1 {
        font-size: clamp(2rem, 3.5vw, 2.8rem);
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1rem;
    }

    .hero-left p {
        color: rgba(255, 255, 255, 0.95);
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .hero-cta {
        display: flex;
        gap: 0.8rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .btn-primary-hero {
        background: linear-gradient(90deg, var(--rose), var(--deep-rose));
        color: #fff;
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-outline-light {
        border: 1.5px solid rgba(255, 255, 255, 0.5);
        padding: 12px 22px;
        color: #fff;
        border-radius: 28px;
        font-weight: 600;
        text-decoration: none;
    }

    .hero-right {
        width: 420px;
        height: 280px;
        overflow: hidden;
        border-radius: var(--rounded);
        box-shadow: var(--shadow);
        flex-shrink: 0;
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

    /* ===== VIDEO SLIDER ===== */
    .video-slider {
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

    .slide .caption {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: rgba(229, 152, 155, 0.8);
        padding: 14px 18px;
        border-radius: 10px;
        color: #fff;
        max-width: 65%;
    }

    .slider-thumbs {
        padding: 18px;
        background: linear-gradient(180deg, var(--cream), #fff);
        display: flex;
        flex-direction: column;
        gap: 10px;
        overflow-y: auto;
        max-height: 500px;
    }

    .thumb {
        height: 80px;
        border-radius: var(--rounded);
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
    }

    .thumb.active {
        border-color: var(--rose);
    }

    .thumb video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .slider-controls button {
        background: rgba(255, 255, 255, 0.25);
        border: none;
        color: #fff;
        padding: 8px 10px;
        border-radius: 8px;
        cursor: pointer;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.2rem;
        z-index: 5;
    }

    #prevBtn {
        left: 10px;
    }

    #nextBtn {
        right: 10px;
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
        transition: transform .2s ease;
    }

    .service:hover {
        transform: translateY(-4px);
    }

    .service i {
        font-size: 1.6rem;
        color: var(--rose);
    }

    .service h4 {
        margin: 10px 0 6px 0;
        color: var(--deep-rose);
        font-weight: 700;
    }

    .service p {
        color: var(--muted);
    }

    /* ===== TESTIMONIALS ===== */
    .testimonials {
        margin-top: 3rem;
        display: flex;
        gap: 1.25rem;
        flex-wrap: wrap;
    }

    .testimonial {
        flex: 1;
        background: var(--card);
        border-radius: var(--rounded);
        padding: 20px;
        box-shadow: var(--shadow);
    }

    .testimonial p {
        font-style: italic;
        margin-bottom: 10px;
        color: #333;
    }

    .testimonial .who {
        font-weight: 700;
        color: var(--deep-rose);
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
        color: var(--rose);
        font-weight: 800;
        font-size: 2rem;
        margin: 0;
    }

    .stat p {
        color: var(--muted);
    }

    .cta {
        margin-top: 3rem;
        background: linear-gradient(90deg, var(--rose), var(--deep-rose));
        color: #fff;
        border-radius: var(--rounded);
        padding: 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .cta h3 {
        margin: 0;
        font-weight: 800;
    }

    .cta p {
        margin: 0;
    }

    .cta .cta-btn {
        background: #fff;
        color: var(--deep-rose);
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 700;
    }

    @media (max-width: 920px) {
        .video-hero .inner {
            flex-direction: column;
            text-align: center;
        }

        .hero-right {
            width: 90%;
            height: 220px;
        }

        .video-slider {
            grid-template-columns: 1fr;
        }

        .services-grid {
            grid-template-columns: 1fr;
        }

        .cta {
            flex-direction: column;
            text-align: center;
        }

        .slider-thumbs {
            flex-direction: row;
            max-height: unset;
            overflow-x: auto;
        }

        .thumb {
            flex: 0 0 120px;
            height: 80px;
        }
    }
</style>

<!-- ===== HERO ===== -->
<section class="video-hero">
    <div class="inner">
        <div class="hero-left">
            <h1>Weddings & Engagements Videography</h1>
            <p>Relive every smile, tear, and dance with cinematic videography. Capture your love story with romantic elegance.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book Your Videographer</a>
                <a href="#gallery" class="btn-outline-light">View Sample Videos</a>
            </div>
        </div>
        <div class="hero-right">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" autoplay muted loop></video>
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- VIDEO SLIDER -->
    <section class="video-slider" id="videoSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                <div class="caption">
                    <h4>Elegant Wedding Highlights</h4>
                    <p>Experience your wedding in cinematic storytelling.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <video src="https://www.w3schools.com/html/movie.mp4" controls></video>
                <div class="caption">
                    <h4>Romantic Engagements</h4>
                    <p>Capture your love story before the big day.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                <div class="caption">
                    <h4>Grand Wedding Celebrations</h4>
                    <p>Relive the joy, laughter, and dancing from your wedding day.</p>
                </div>
            </div>

            <button id="prevBtn">◀</button>
            <button id="nextBtn">▶</button>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
            <div class="thumb" data-index="1"><video src="https://www.w3schools.com/html/movie.mp4"></video></div>
            <div class="thumb" data-index="2"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
        </aside>
    </section>

    <!-- SERVICES -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-camera-video-fill"></i>
            <h4>Cinematic Wedding Films</h4>
            <p>High-quality cinematic storytelling capturing your special day.</p>
        </div>
        <div class="service"><i class="bi bi-heart-fill"></i>
            <h4>Engagement Videos</h4>
            <p>Romantic, intimate moments captured before the big day.</p>
        </div>
        <div class="service"><i class="bi bi-gift-fill"></i>
            <h4>Highlight Reels & Albums</h4>
            <p>Professional highlight reels and digital keepsakes to cherish forever.</p>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"Our wedding video was magical — we relived every moment as if it was happening again!"</p>
            <div class="who">— Mr. & Mrs. Njoroge</div>
        </div>
        <div class="testimonial">
            <p>"The engagement video perfectly captured our love and excitement before the wedding!"</p>
            <div class="who">— Angela & Peter</div>
        </div>
    </section>

    <!-- STATS -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statWeddings">0</h3>
            <p>Weddings Filmed</p>
        </div>
        <div class="stat">
            <h3 id="statEngagements">0</h3>
            <p>Engagement Videos</p>
        </div>
        <div class="stat">
            <h3 id="statVideographers">0</h3>
            <p>Professional Videographers</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years of Experience</p>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <div class="left">
            <h3>Let’s Bring Your Love Story to Life</h3>
            <p>We ensure your wedding and engagement moments are captured with cinematic storytelling and timeless artistry.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Your Videographer</a>
        </div>
    </section>
</div>

<!-- ===== JS ===== -->
<script>
    (function() {
        const slider = document.getElementById('videoSlider');
        const slides = slider.querySelectorAll('.slide');
        const thumbs = slider.querySelectorAll('.thumb');
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        let index = 0,
            timer;

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
                id: 'statWeddings',
                target: 180
            },
            {
                id: 'statEngagements',
                target: 120
            },
            {
                id: 'statVideographers',
                target: 15
            },
            {
                id: 'statYears',
                target: 10
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