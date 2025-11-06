@extends('layouts.app')

@section('title', 'Outdoor & Nature Shoots')

@section('content')
<!--
  Outdoor & Nature Shoots Page
  - Full structure: Hero, Slider, Services, Testimonials, Stats, CTA
  - Nature theme: greens, earth tones, soft background
-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

    :root {
        --forest: #2e7d32;
        /* Deep green */
        --leaf: #81c784;
        /* Lighter green */
        --earth: #a1887f;
        /* Earth tone */
        --sun: #fbc02d;
        /* Warm yellow accent */
        --muted: #6c757d;
        --bg: #edf7ef;
        /* Soft background */
        --card: #ffffff;
        /* Card background */
        --shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        --rounded: 12px;
        --text: #2e2e2e;
    }

    body,
    html {
        font-family: 'Poppins', system-ui;
        margin: 0;
        padding: 0;
        color: var(--text);
        background: var(--bg);
    }

    /* ===== HERO ===== */
    .outdoor-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(120deg, rgba(46, 125, 50, 0.85), rgba(241, 196, 15, 0.2)),
            url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop') center/cover;
        color: #fff;
        padding: 6rem 0;
        overflow: hidden;
    }

    .outdoor-hero .inner {
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
        color: var(--forest);
    }

    .hero-left p {
        color: var(--text);
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .hero-cta {
        display: flex;
        gap: 0.8rem;
        flex-wrap: wrap;
    }

    .btn-primary-hero {
        background: linear-gradient(90deg, var(--forest), var(--leaf));
        color: #fff;
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s;
    }

    .btn-primary-hero:hover {
        background: linear-gradient(90deg, var(--leaf), var(--sun));
    }

    .btn-outline-light {
        border: 1.5px solid rgba(46, 125, 50, 0.5);
        padding: 12px 22px;
        color: var(--forest);
        border-radius: 28px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
    }

    .btn-outline-light:hover {
        background: rgba(46, 125, 50, 0.1);
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
        background: rgba(46, 125, 50, 0.65);
        padding: 14px 18px;
        border-radius: 10px;
        color: #fff;
        max-width: 65%;
    }

    .slider-thumbs {
        padding: 18px;
        background: linear-gradient(180deg, #d9f0e0, #edf7ef);
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
        border-color: var(--forest);
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
        background: rgba(46, 125, 50, 0.2);
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
        color: var(--forest);
    }

    .service h4 {
        margin: 10px 0 6px 0;
        color: var(--sun);
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
        color: var(--text);
    }

    .testimonial .who {
        font-weight: 700;
        color: var(--forest);
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
        color: var(--forest);
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
        font-weight: 800;
    }

    .cta p {
        margin-top: 4px;
        color: #fff;
    }

    .cta .cta-btn {
        background: var(--earth);
        color: #fff;
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 700;
    }

    @media (max-width: 920px) {
        .outdoor-hero .inner {
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
<section class="outdoor-hero">
    <div class="inner">
        <div class="hero-left">
            <h1>Outdoor & Nature Shoots</h1>
            <p>Capturing landscapes, wildlife, and outdoor sessions — emphasizing natural light, scenic beauty, and artistic framing.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Shoot</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop" alt="Outdoor photography">
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- ===== SLIDER ===== -->
    <section class="slider" id="outdoorSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop" alt="Forest landscape">
                <div class="caption">
                    <h4>Forest Landscapes</h4>
                    <p>Vibrant, serene forests captured with natural lighting.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1600&auto=format&fit=crop" alt="Wildlife photography">
                <div class="caption">
                    <h4>Wildlife Photography</h4>
                    <p>Dynamic shots of wildlife in their natural habitat.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1600&auto=format&fit=crop" alt="Mountain scenery">
                <div class="caption">
                    <h4>Mountain Views</h4>
                    <p>Epic vistas and panoramic outdoor captures.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="1"><img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="2"><img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop" alt=""></div>
        </aside>
    </section>

    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-tree-fill"></i>
            <h4>Landscape Shoots</h4>
            <p>Capturing scenic beauty from forests, mountains, and rivers.</p>
        </div>
        <div class="service"><i class="bi bi-binoculars-fill"></i>
            <h4>Wildlife Sessions</h4>
            <p>Professional wildlife photography in natural habitats.</p>
        </div>
        <div class="service"><i class="bi bi-sun-fill"></i>
            <h4>Golden Hour Shots</h4>
            <p>Artistic sunrise and sunset captures for stunning visuals.</p>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"Absolutely breathtaking outdoor shots! Every frame tells a story."</p>
            <div class="who">— Nature Photography Enthusiast</div>
        </div>
        <div class="testimonial">
            <p>"The team captured our adventure trip perfectly with natural light and colors."</p>
            <div class="who">— Adventure Travel Company</div>
        </div>
    </section>

    <!-- ===== STATS ===== -->
    <section class="stats-row">
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
    <section class="cta">
        <div class="left">
            <h3>Ready to Explore?</h3>
            <p>Book your outdoor or nature photography session and bring the beauty of the wild to life in every shot.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>

</div>

<!-- ===== SLIDER SCRIPT ===== -->
<script>
    (function() {
        const slider = document.getElementById('outdoorSlider');
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