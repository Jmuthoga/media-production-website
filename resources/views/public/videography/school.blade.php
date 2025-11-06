@extends('layouts.app')

@section('title', 'School & Institutional Videography')

@section('content')
<!--
  School & Institutional Videography Page
  - Sky Blue & Soft Yellow Theme
  - Full structure including hero, video slider, services, testimonials, stats, and CTA
-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

    :root {
        --sky: #3498db;
        --yellow: #f1c40f;
        --muted: #6c757d;
        --bg: #f0f4f8;
        --card: #ffffff;
        --shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        --rounded: 12px;
    }

    body,
    html {
        font-family: 'Poppins', system-ui;
        margin: 0;
        padding: 0;
        color: #333;
        background: var(--bg);
    }

    /* ===== HERO ===== */
    .school-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(120deg, rgba(52, 152, 219, 0.85), rgba(241, 196, 15, 0.2)),
            url('https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=1600&auto=format&fit=crop') center/cover;
        color: #fff;
        padding: 6rem 0;
        overflow: hidden;
    }

    .school-hero .inner {
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
        margin-bottom: 1rem;
        color: var(--sky);
    }

    .hero-left p {
        color: #fff;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .hero-cta {
        display: flex;
        gap: 0.8rem;
        flex-wrap: wrap;
    }

    .btn-primary-hero {
        background: linear-gradient(90deg, var(--sky), var(--yellow));
        color: #000;
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s;
    }

    .btn-primary-hero:hover {
        background: linear-gradient(90deg, var(--yellow), #fff5c2);
    }

    .btn-outline-light {
        border: 1.5px solid rgba(255, 255, 255, 0.5);
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

    .hero-right video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: var(--rounded);
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
        box-shadow: var(--shadow);
        border-radius: var(--rounded);
        overflow: hidden;
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
        background: linear-gradient(180deg, #e0eaf1, #f0f4f8);
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
    }

    .thumb.active {
        border-color: var(--sky);
    }

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
        color: var(--sky);
    }

    .service h4 {
        margin: 10px 0 6px 0;
        color: var(--yellow);
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
        background: var(--card);
        border-radius: var(--rounded);
        padding: 20px;
        box-shadow: var(--shadow);
    }

    .testimonial p {
        font-style: italic;
        margin-bottom: 10px;
        color: #555;
    }

    .testimonial .who {
        font-weight: 700;
        color: var(--sky);
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
        color: var(--sky);
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
        background: linear-gradient(90deg, var(--sky), var(--yellow));
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
    }

    .cta p {
        margin-top: 4px;
    }

    .cta .cta-btn {
        background: #000;
        color: var(--yellow);
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 700;
    }

    @media(max-width:920px) {
        .school-hero .inner {
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
<section class="school-hero">
    <div class="inner">
        <div class="hero-left">
            <h1>School & Institutional Videography</h1>
            <p>Capture every school event, graduation, sports day, and institutional ceremony professionally on video for lasting memories.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Videographer</a>
                <a href="#gallery" class="btn-outline-light">View Videos</a>
            </div>
        </div>
        <div class="hero-right">
            <video src="https://www.w3schools.com/html/mov_bbb.mp4" autoplay muted loop></video>
        </div>
    </div>
</section>

<div class="page-container" id="gallery">
    <!-- ===== VIDEO SLIDER ===== -->
    <section class="slider" id="schoolSlider">
        <div class="slider-main">
            <div class="slide active" data-index="0">
                <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                <div class="caption">
                    <h4>School Assembly</h4>
                    <p>Professional coverage of school gatherings and ceremonies.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <video src="https://www.w3schools.com/html/movie.mp4" controls></video>
                <div class="caption">
                    <h4>Sports Day</h4>
                    <p>Capture every exciting moment of the school's sports events.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <video src="https://www.w3schools.com/html/mov_bbb.mp4" controls></video>
                <div class="caption">
                    <h4>Graduation Ceremony</h4>
                    <p>Memorable graduation videos delivered in high quality.</p>
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
            <div class="thumb" data-index="2"><video src="https://www.w3schools.com/html/mov_bbb.mp4"></video></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-mortarboard-fill"></i>
            <h4>Graduations</h4>
            <p>Professional graduation videography capturing all key moments.</p>
        </div>
        <div class="service"><i class="bi bi-people-fill"></i>
            <h4>School Events</h4>
            <p>Sports, assemblies, and other events filmed with care.</p>
        </div>
        <div class="service"><i class="bi bi-building"></i>
            <h4>Institutional Ceremonies</h4>
            <p>Awards, ceremonies, and institutional events professionally recorded.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"Our school sports day videos were amazing — full of energy and professionalism."</p>
            <div class="who">— School Administrator</div>
        </div>
        <div class="testimonial">
            <p>"Graduation ceremony coverage was flawless and delivered quickly."</p>
            <div class="who">— Parent Committee</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statEvents">0</h3>
            <p>School Events Covered</p>
        </div>
        <div class="stat">
            <h3 id="statVideos">0</h3>
            <p>Videos Delivered</p>
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
            <h3>Book Your School Event Today</h3>
            <p>Ensure every moment at your school or institution is captured beautifully on video.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>
</div>

<script>
    (function() {
        const slides = document.querySelectorAll('#schoolSlider .slide');
        const thumbs = document.querySelectorAll('#schoolSlider .thumb');
        const next = document.getElementById('nextBtn');
        const prev = document.getElementById('prevBtn');
        let index = 0,
            timer;

        function showSlide(i) {
            slides.forEach((s, j) => s.classList.toggle('active', j === i));
            thumbs.forEach((t, j) => t.classList.toggle('active', j === i));
            index = i;
        }

        function nextSlide() {
            showSlide((index + 1) % slides.length);
        }

        function prevSlide() {
            showSlide((index - 1 + slides.length) % slides.length);
        }

        next.onclick = () => {
            nextSlide();
            resetAuto();
        }
        prev.onclick = () => {
            prevSlide();
            resetAuto();
        }
        thumbs.forEach((t, i) => t.onclick = () => {
            showSlide(i);
            resetAuto();
        });

        function startAuto() {
            timer = setInterval(nextSlide, 4000);
        }

        function stopAuto() {
            clearInterval(timer);
        }

        function resetAuto() {
            stopAuto();
            startAuto();
        }
        startAuto();
    })();

    (function() {
        const counters = [{
            id: 'statEvents',
            target: 150
        }, {
            id: 'statVideos',
            target: 500
        }, {
            id: 'statExperience',
            target: 10
        }, {
            id: 'statSatisfaction',
            target: 99
        }];
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