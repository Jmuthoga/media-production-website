@extends('layouts.app')

@section('title', 'Weddings & Engagements')

@section('content')
<!--
  Weddings & Engagements Page (Romantic Edition)
  - Uses blush pinks, rose gold, and soft ivory tones
  - Same layout, modern & responsive
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

    /* ===== Hero ===== */
    .wedding-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        padding: 6rem 0;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);

        /* --- Background Image with Overlay --- */
        background:
            linear-gradient(120deg, rgba(229, 152, 155, 0.75), rgba(181, 131, 141, 0.75)),
            url('https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=1600&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }


    .wedding-hero .inner {
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
        border-radius: 12px;
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

    /* ===== Slider ===== */
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
    }

    .thumb {
        height: 80px;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
    }

    .thumb.active {
        border-color: var(--rose);
    }

    .thumb img {
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
    }

    /* ===== Services ===== */
    .services-grid {
        margin-top: 3rem;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .service {
        background: var(--card);
        border-radius: 12px;
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

    /* ===== Testimonials ===== */
    .testimonials {
        margin-top: 3rem;
        display: flex;
        gap: 1.25rem;
        flex-wrap: wrap;
    }

    .testimonial {
        flex: 1;
        background: #fff;
        border-radius: 12px;
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

    /* ===== Stats & CTA ===== */
    .stats-row {
        margin-top: 3rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .stat {
        flex: 1;
        background: var(--card);
        border-radius: 12px;
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
        border-radius: 12px;
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

    .cta .cta-btn {
        background: #fff;
        color: var(--deep-rose);
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 700;
    }

    @media (max-width: 920px) {
        .wedding-hero .inner {
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
<section class="wedding-hero">
    <div class="inner">
        <div class="hero-left">
            <h1>Weddings & Engagements — Your Forever Begins Here</h1>
            <p>We capture every emotion, every detail, and every spark — from intimate engagements to grand wedding celebrations. Let your story shine through timeless photography.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book Your Date</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right">
            <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=1200&auto=format&fit=crop" alt="Wedding couple portrait">
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- SLIDER -->
    <section class="slider" id="weddingSlider">
        <div class="slider-main" id="sliderMain">
            <div class="slide active" data-index="0">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1600&auto=format&fit=crop" alt="">
                <div class="caption">
                    <h4>Elegant Wedding Moments</h4>
                    <p>Capturing your most magical day beautifully and authentically.</p>
                </div>
            </div>
            <div class="slide" data-index="1">
                <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=1600&auto=format&fit=crop" alt="">
                <div class="caption">
                    <h4>Romantic Engagements</h4>
                    <p>Celebrate your love story with intimate engagement sessions.</p>
                </div>
            </div>
            <div class="slide" data-index="2">
                <img src="https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?q=80&w=1600&auto=format&fit=crop" alt="">
                <div class="caption">
                    <h4>Bridal Details</h4>
                    <p>Every lace, ring, and petal captured in artistic perfection.</p>
                </div>
            </div>
            <div class="slide" data-index="3">
                <img src="https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?q=80&w=1600&auto=format&fit=crop" alt="">
                <div class="caption">
                    <h4>Grand Celebrations</h4>
                    <p>Unforgettable moments filled with joy and love.</p>
                </div>
            </div>

            <div class="slider-controls">
                <button id="prevBtn">◀</button>
                <button id="nextBtn">▶</button>
            </div>
        </div>

        <aside class="slider-thumbs">
            <div class="thumb active" data-index="0"><img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="1"><img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="2"><img src="https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?q=80&w=800&auto=format&fit=crop" alt=""></div>
            <div class="thumb" data-index="3"><img src="https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?q=80&w=800&auto=format&fit=crop" alt=""></div>
        </aside>
    </section>

    <!-- SERVICES -->
    <section class="services-grid">
        <div class="service"><i class="bi bi-heart-fill"></i>
            <h4>Engagement Shoots</h4>
            <p>Capture your love story before the big day in elegant, intimate frames.</p>
        </div>
        <div class="service"><i class="bi bi-camera-fill"></i>
            <h4>Wedding Day Coverage</h4>
            <p>Every moment, every emotion — documented in timeless detail.</p>
        </div>
        <div class="service"><i class="bi bi-gift-fill"></i>
            <h4>Albums & Prints</h4>
            <p>Premium prints and handcrafted albums that last a lifetime.</p>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="testimonials">
        <div class="testimonial">
            <p>"They made our wedding memories unforgettable — stunning photos that tell our story perfectly!"</p>
            <div class="who">— Mr. & Mrs. Njoroge</div>
        </div>
        <div class="testimonial">
            <p>"Our engagement shoot was magical — we felt natural and completely at ease!"</p>
            <div class="who">— Angela & Peter</div>
        </div>
    </section>

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        <div class="stat">
            <h3 id="statWeddings">0</h3>
            <p>Weddings Captured</p>
        </div>
        <div class="stat">
            <h3 id="statEngagements">0</h3>
            <p>Engagement Sessions</p>
        </div>
        <div class="stat">
            <h3 id="statPhotographers">0</h3>
            <p>Professional Photographers</p>
        </div>
        <div class="stat">
            <h3 id="statYears">0</h3>
            <p>Years of Experience</p>
        </div>
    </section>

    <section class="cta">
        <div class="left">
            <h3>Let’s Tell Your Love Story</h3>
            <p>We’re here to make your wedding day memories eternal — elegant, emotional, and extraordinary.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Your Wedding</a>
        </div>
    </section>
</div>

<script>
    (function() {
        const slider = document.getElementById('weddingSlider');
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
                target: 200
            },
            {
                id: 'statEngagements',
                target: 120
            },
            {
                id: 'statPhotographers',
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