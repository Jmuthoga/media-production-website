@extends('layouts.app')

@section('title', 'Family Videography')

@section('content')
<!--
  Family Videography Page
  - Full modern design (same structure as Portrait & Family Photography)
  - Family-oriented hero section
  - Sliding family video gallery
  - Service highlights
  - Testimonials
  - Counters
  - Contact CTA
-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

    :root {
        --navy: #0d1b2a;
        --blue: #1b263b;
        --sky: #415a77;
        --cream: #fefae0;
        --muted: #c5c6c7;
        --bg: #0b132b;
        --card: #1b1f2f;
        --shadow: 0 10px 30px rgba(0, 0, 0, 0.45);
        --rounded: 12px;
        --accent: #ffd166;
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
    .videography-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(120deg, rgba(27, 38, 59, 0.9), rgba(65, 90, 119, 0.8)),
            url('https://images.unsplash.com/photo-1605902711622-cfb43c443c3f?q=80&w=1600&auto=format&fit=crop') center/cover;
        color: #fff;
        padding: 6rem 0;
        overflow: hidden;
    }

    .videography-hero .inner {
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
        color: var(--accent);
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
        background: linear-gradient(90deg, var(--accent), #fff0b3);
        color: #000;
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s;
    }

    .btn-primary-hero:hover {
        background: linear-gradient(90deg, #fff0b3, #fff8d9);
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

    .hero-right img,
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

    .slide video {
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
        background: linear-gradient(180deg, #2a2a3a, #1a1a2a);
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
        border-color: var(--accent);
    }

    .thumb img,
    .thumb video {
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
        color: var(--accent);
    }

    .service h4 {
        margin: 10px 0 6px 0;
        color: var(--cream);
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
        background: #1f2333;
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
        color: var(--accent);
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
        color: var(--accent);
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
        background: linear-gradient(90deg, var(--sky), var(--accent));
        color: #000;
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
        color: #000;
    }

    .cta p {
        margin-top: 4px;
        color: #111;
    }

    .cta .cta-btn {
        background: #000;
        color: var(--accent);
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 700;
    }

    @media (max-width: 920px) {
        .videography-hero .inner {
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
<section class="videography-hero">
    <div class="inner">
        <div class="hero-left">
            <h1>Family Videography — Capture Motion & Emotion</h1>
            <p>From newborn giggles to grandparent stories, we craft cinematic family videos that celebrate connection, joy, and life’s unforgettable moments — beautifully preserved forever.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Session</a>
                <a href="#portfolio" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" autoplay muted loop playsinline></video>
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="portfolio">

    <!-- ===== SLIDER ===== -->
    <section class="slider" id="videoSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                <div class="caption">
                    <h4>Outdoor Family Videos</h4>
                    <p>Natural moments captured in motion.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <video src="https://www.w3schools.com/html/movie.mp4" controls></video>
                <div class="caption">
                    <h4>Indoor Comfort Stories</h4>
                    <p>Cozy, candid family moments on film.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
            <div class="thumb" data-index="1"><video src="https://www.w3schools.com/html/movie.mp4"></video></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-camera-video-fill"></i>
            <h4>Family Video Sessions</h4>
            <p>Cinematic storytelling of your family's laughter, love, and life moments.</p>
        </div>
        <div class="service"><i class="bi bi-film"></i>
            <h4>Indoor & Outdoor Shoots</h4>
            <p>Capture family memories anywhere — at home or amidst nature.</p>
        </div>
        <div class="service"><i class="bi bi-play-btn-fill"></i>
            <h4>High-Quality Videos</h4>
            <p>Professional videos ready for sharing, keepsakes, or social media.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"The videography team captured our family moments beautifully — the videos made us relive our favorite memories!"</p>
            <div class="who">— The Njoroge Family</div>
        </div>
        <div class="testimonial">
            <p>"Our story in motion! The kids were thrilled and the results were stunning."</p>
            <div class="who">— Sarah & Paul</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statClients">0</h3>
            <p>Happy Families</p>
        </div>
        <div class="stat">
            <h3 id="statLocations">0</h3>
            <p>Video Locations</p>
        </div>
        <div class="stat">
            <h3 id="statMemories">0</h3>
            <p>Videos Captured</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years Experience</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Preserve Your Family’s Story in Motion</h3>
            <p>Let’s create cinematic videos that remind you of life’s most precious moments — love, joy, and togetherness.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Your Session</a>
        </div>
    </section>
</div>

<script>
    (function() {
        const slider = document.getElementById('videoSlider');
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
                id: 'statClients',
                target: 350
            },
            {
                id: 'statLocations',
                target: 25
            },
            {
                id: 'statMemories',
                target: 500
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
                else el.textContent = end + '+';
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