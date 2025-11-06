@extends('layouts.app')

@section('title', 'Portrait Photography')

@section('content')
<!--
  Professional Portrait Photography Page
  - Sliding portrait gallery (autoplay, thumbnails, keyboard support)
  - Service highlights
  - Testimonials
  - Counters
  - Contact CTA
  - Uses Poppins font (official corporate)
-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

    :root {
        --navy: #0d1b2a;
        --rose: rgba(110, 50, 70, 0.8);
        --deep-rose: rgba(60, 25, 45, 0.9);
        --cream: #fefae0;
        --muted: #c5c6c7;
        --bg: #0b132b;
        --card: #1b1f2f;
        --shadow: 0 10px 30px rgba(0, 0, 0, 0.45);
        --rounded: 12px;
        --accent: #ffd6a5;
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
    .portrait-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(120deg, var(--deep-rose), var(--rose)),
            url('https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1200&auto=format&fit=crop') center/cover;
        color: #fff;
        padding: 6rem 0;
        overflow: hidden;
    }

    .portrait-hero .inner {
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
        background: linear-gradient(90deg, var(--accent), #ffe6cc);
        color: #000;
        padding: 12px 24px;
        border-radius: 28px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s;
    }

    .btn-primary-hero:hover {
        background: linear-gradient(90deg, #ffe6cc, #fff2e0);
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
        background: linear-gradient(180deg, #2a1a1a, #1a0a0a);
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
        background: #1f1a22;
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
        background: linear-gradient(90deg, var(--rose), var(--accent));
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
        .portrait-hero .inner {
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


<!-- ============= HERO ============= -->
<section class="portrait-hero" aria-labelledby="portrait-hero-heading">
    <div class="inner">
        <div class="hero-left" role="region" aria-label="Introduction">
            <h1 id="portrait-hero-heading">Portrait Photography — Capture Personality & Presence</h1>
            <p>Professional portrait sessions for individuals, families, and talent. We craft lighting, pose, and mood so your photographs speak with confidence — editorial, corporate, lifestyle, or creative portraits.</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero" aria-label="Book portrait session">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" style="margin-right:6px">
                        <path d="M22 12L2 3v18L22 12z" fill="white" />
                    </svg>
                    Book a Session
                </a>
                <a href="#portfolio" class="btn-outline-light">View Portfolio</a>
            </div>
        </div>

        <div class="hero-right" aria-hidden="false">
            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1200&auto=format&fit=crop" alt="Portrait hero preview" loading="lazy">
        </div>
    </div>
</section>

<div class="page-container" id="portfolio">

    <!-- ============= SLIDER ============= -->
    <section aria-label="Portrait Gallery" style="margin-top: 5rem">
        <div class="slider" id="portraitSlider" role="region" aria-roledescription="carousel" aria-label="Portrait images carousel">
            <div class="slider-main" id="sliderMain">
                <!-- Slides: replace src urls with your image assets -->
                <div class="slide active" data-index="0" tabindex="0" aria-hidden="false">
                    <img src="https://images.unsplash.com/photo-1524503033411-c9566986fc8f?q=80&w=1600&auto=format&fit=crop" alt="Portrait 1" loading="lazy">
                    <div class="caption">
                        <h4>Studio Portrait</h4>
                        <p>Classic lighting, refined look for headshots and editorial portraits.</p>
                    </div>
                </div>

                <div class="slide" data-index="1" tabindex="-1" aria-hidden="true">
                    <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop" alt="Portrait 2" loading="lazy">
                    <div class="caption">
                        <h4>Outdoor Portrait</h4>
                        <p>Natural light and environmental storytelling.</p>
                    </div>
                </div>

                <div class="slide" data-index="2" tabindex="-1" aria-hidden="true">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1600&auto=format&fit=crop" alt="Portrait 3" loading="lazy">
                    <div class="caption">
                        <h4>Creative Portrait</h4>
                        <p>Stylized and conceptual portraits for artists and creatives.</p>
                    </div>
                </div>

                <div class="slide" data-index="3" tabindex="-1" aria-hidden="true">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1600&auto=format&fit=crop" alt="Portrait 4" loading="lazy">
                    <div class="caption">
                        <h4>Environmental Portrait</h4>
                        <p>Photos that show personality in context — workplace, studio or outdoors.</p>
                    </div>
                </div>

                <!-- slider controls -->
                <div class="slider-controls" aria-hidden="false">
                    <button id="prevBtn" title="Previous (Left arrow)">◀</button>
                    <button id="nextBtn" title="Next (Right arrow)">▶</button>
                </div>

                <div class="autoplay-indicator" id="autoplayIndicator">Auto • On</div>
            </div>

            <!-- Thumbnails column -->
            <aside class="slider-thumbs" aria-label="Gallery thumbnails">
                <div class="thumb active" data-index="0" tabindex="0" aria-pressed="true" role="button" aria-label="Show slide 1">
                    <img src="https://images.unsplash.com/photo-1524503033411-c9566986fc8f?q=80&w=800&auto=format&fit=crop" alt="Thumb 1" loading="lazy">
                </div>
                <div class="thumb" data-index="1" tabindex="0" role="button" aria-label="Show slide 2">
                    <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=800&auto=format&fit=crop" alt="Thumb 2" loading="lazy">
                </div>
                <div class="thumb" data-index="2" tabindex="0" role="button" aria-label="Show slide 3">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=800&auto=format&fit=crop" alt="Thumb 3" loading="lazy">
                </div>
                <div class="thumb" data-index="3" tabindex="0" role="button" aria-label="Show slide 4">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=800&auto=format&fit=crop" alt="Thumb 4" loading="lazy">
                </div>
            </aside>
        </div>
    </section>

    <!-- ============= SERVICES ============= -->
    <section class="services-grid" aria-label="What we offer">
        <div class="service" role="article">
            <i class="bi bi-camera-fill" aria-hidden="true"></i>
            <h4>Professional Studio Setup</h4>
            <p>Full studio environment with multiple lighting setups, premium backdrops, and hair/makeup coordination if required.</p>
        </div>
        <div class="service" role="article">
            <i class="bi bi-people-fill" aria-hidden="true"></i>
            <h4>Personalized Sessions</h4>
            <p>We plan each session with a pre-shoot consultation to tailor lighting, wardrobe guidance, and mood for your goals.</p>
        </div>
        <div class="service" role="article">
            <i class="bi bi-brush-fill" aria-hidden="true"></i>
            <h4>Advanced Retouching</h4>
            <p>Professional skin retouching, color grading, and multiple delivery formats for print and web.</p>
        </div>
    </section>

    <!-- ============= TESTIMONIALS ============= -->
    <section class="testimonials" aria-label="Client testimonials">
        <div class="testimonial" role="article">
            <p>"Working with Unimax changed my portfolio — the level of craft and direction was outstanding."</p>
            <div class="who">— Naomi A., Creative Director</div>
        </div>
        <div class="testimonial" role="article">
            <p>"Excellent studio environment and direction. The images delivered exceeded my expectations."</p>
            <div class="who">— Michael R., Actor</div>
        </div>
    </section>

    <!-- ============= STATS & CTA ============= -->
    <section class="stats-row" aria-label="Statistics and booking">
        <div class="stat" role="region" aria-label="Client reviews">
            <h3 id="statClients">0</h3>
            <p>Client Reviews</p>
        </div>
        <div class="stat" role="region" aria-label="Support team">
            <h3 id="statTeam">0</h3>
            <p>Support Team</p>
        </div>
        <div class="stat" role="region" aria-label="Projects completed">
            <h3 id="statProjects">0</h3>
            <p>Projects Completed</p>
        </div>
        <div class="stat" role="region" aria-label="Years of experience">
            <h3 id="statYears">0</h3>
            <p>Years Experience</p>
        </div>
    </section>

    <section class="cta" role="region" aria-label="Call to action">
        <div class="left">
            <h3>Ready for your portrait session?</h3>
            <p>Book an in-studio or on-location session. We’ll prepare a tailored plan and guide you through wardrobe, pose, and expression to capture your best self.</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn" aria-label="Contact us to book">Contact & Book</a>
        </div>
    </section>

</div> <!-- /.page-container -->

<!-- ======= SCRIPTS ======= -->
<script>
    /* ======= Simple accessible slider implementation =======
   Features:
   - Autoplay with pause on hover
   - Previous/Next buttons
   - Thumbnails to select slide
   - Looping
   - Keyboard navigation (left/right)
   - Plays nicely on mobile
*/
    (function() {
        const slider = document.getElementById('portraitSlider');
        if (!slider) return;

        const slides = Array.from(slider.querySelectorAll('.slide'));
        const thumbs = Array.from(slider.querySelectorAll('.thumb'));
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const autoplayIndicator = document.getElementById('autoplayIndicator');

        let idx = 0;
        let autoplay = true;
        let autoplayInterval = 4500;
        let timer = null;

        function showSlide(newIndex) {
            if (newIndex < 0) newIndex = slides.length - 1;
            if (newIndex >= slides.length) newIndex = 0;
            slides.forEach((s, i) => {
                const isActive = i === newIndex;
                s.classList.toggle('active', isActive);
                s.setAttribute('aria-hidden', !isActive);
                s.tabIndex = isActive ? 0 : -1;
            });
            thumbs.forEach((t, i) => {
                t.classList.toggle('active', i === newIndex);
                t.setAttribute('aria-pressed', i === newIndex ? 'true' : 'false');
            });
            idx = newIndex;
        }

        function next() {
            showSlide(idx + 1);
        }

        function prev() {
            showSlide(idx - 1);
        }

        function startAutoplay() {
            if (timer) clearInterval(timer);
            timer = setInterval(next, autoplayInterval);
            autoplay = true;
            autoplayIndicator.textContent = 'Auto • On';
        }

        function stopAutoplay() {
            if (timer) clearInterval(timer);
            timer = null;
            autoplay = false;
            autoplayIndicator.textContent = 'Auto • Off';
        }

        // init listeners
        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            next();
            stopAutoplay();
        });
        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            prev();
            stopAutoplay();
        });

        thumbs.forEach(t => {
            const i = parseInt(t.dataset.index, 10);
            t.addEventListener('click', () => {
                showSlide(i);
                stopAutoplay();
            });
            t.addEventListener('keydown', (ev) => {
                if (ev.key === 'Enter' || ev.key === ' ') {
                    ev.preventDefault();
                    showSlide(i);
                    stopAutoplay();
                }
            });
        });

        slider.addEventListener('mouseenter', () => {
            stopAutoplay();
        });
        slider.addEventListener('mouseleave', () => {
            startAutoplay();
        });

        document.addEventListener('keydown', (ev) => {
            if (ev.key === 'ArrowRight') {
                next();
                stopAutoplay();
            }
            if (ev.key === 'ArrowLeft') {
                prev();
                stopAutoplay();
            }
        });

        // Responsive: pause autoplay on small devices to save CPU/memory if desired
        function handleVisibility() {
            if (document.hidden) stopAutoplay();
            else startAutoplay();
        }
        document.addEventListener('visibilitychange', handleVisibility);

        // kick off
        showSlide(0);
        startAutoplay();

        // lazy-resize slides on load/resize for canvas-like layout (if you add dynamic sizes)
        window.addEventListener('resize', () => {
            // placeholder for any responsive adjustments
        });

        // make autoplay indicator clickable to toggle
        autoplayIndicator.addEventListener('click', () => {
            if (autoplay) stopAutoplay();
            else startAutoplay();
        });
    })();

    /* ===== Counters that animate when in view ===== */
    (function() {
        const counters = [{
                id: 'statClients',
                target: 500
            },
            {
                id: 'statTeam',
                target: 50
            },
            {
                id: 'statProjects',
                target: 3000
            },
            {
                id: 'statYears',
                target: 15
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
        // also trigger initially in case it's already visible
        setTimeout(checkStart, 300);
    })();
</script>
@endsection