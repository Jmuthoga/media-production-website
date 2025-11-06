@extends('layouts.app')

@section('title', 'Radio Hosts & Advertising')

@section('content')
<!-- RADIO HOSTS & ADVERTISING — Ultra Premium, new classes version -->

<!-- External Libraries -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@0.2.38/dist/lenis.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<style>
    :root {
        --primary-blue: #0d6efd;
        --secondary-blue: #004f86;
        --gold1: #f5c542;
        --gold2: #ffd966;
        --bg-light: #f6f9fc;
        --shadow-main: 0 30px 80px rgba(2, 18, 36, 0.12);
        --text-muted: #6c7b86;
    }

    /* Body */
    body {
        font-family: Inter, sans-serif;
        background: var(--bg-light);
        margin: 0;
        color: #041a2f;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    .container-max {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .text-center {
        text-align: center;
    }

    /* ===== HERO SECTION ===== */
    .hero-section {
        position: relative;
        overflow: hidden;
        padding: 120px 0 100px;
        color: #fff;
        background: linear-gradient(180deg, rgba(0, 19, 50, 0.92), rgba(0, 19, 50, 0.78)),
            url('https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
    }

    .container-max {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .hero-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
        flex-wrap: wrap;
    }

    .hero-left-block {
        flex: 1;
        min-width: 320px;
    }

    .kicker-text {
        font-size: 14px;
        letter-spacing: 1px;
        color: #ffd700;
        text-transform: uppercase;
        font-weight: 700;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 52px;
        color: var(--gold1);
        margin: 10px 0;
        line-height: 1.2;
    }

    .hero-text {
        color: rgba(255, 255, 255, 0.92);
        max-width: 760px;
        font-size: 18px;
        line-height: 1.6;
    }

    .hero-actions {
        margin-top: 24px;
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    .btn-gold {
        background: linear-gradient(90deg, var(--gold1), var(--gold2));
        color: var(--primary-blue);
        padding: 12px 28px;
        border-radius: 999px;
        font-weight: 800;
        border: none;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-gold:hover {
        opacity: 0.9;
    }

    .btn-outline {
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.22);
        color: #fff;
        padding: 10px 26px;
        border-radius: 999px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-outline:hover {
        border-color: #ffd700;
        color: #ffd700;
    }

    /* ===== HERO RIGHT BLOCK ===== */
    .hero-right-block {
        width: 520px;
        position: relative;
    }

    .mock-container {
        position: relative;
        height: 440px;
    }

    .mock-card-main {
        position: absolute;
        border-radius: 20px;
        padding: 18px;
        box-shadow: var(--shadow-main);
        color: #fff;
        overflow: hidden;
    }

    .mock-card-big {
        right: 0;
        top: 10px;
        width: 520px;
        height: 300px;
    }

    .mock-card-mid {
        left: 28px;
        top: 80px;
        width: 360px;
        height: 240px;
        transform: rotate(-6deg);
    }

    .mock-card-small {
        left: 120px;
        top: 260px;
        width: 260px;
        height: 160px;
        transform: rotate(6deg);
    }

    /* ===== RIBBONS ===== */
    .ribbon-main,
    .ribbon-alt {
        position: absolute;
        width: 760px;
        height: 220px;
        filter: blur(26px);
        pointer-events: none;
    }

    .ribbon-main {
        left: -120px;
        top: 40px;
        transform: skewY(-6deg);
        background: linear-gradient(90deg, rgba(0, 191, 165, 0.12), rgba(255, 111, 97, 0.06));
    }

    .ribbon-alt {
        right: -120px;
        top: 160px;
        transform: skewY(6deg);
        background: linear-gradient(90deg, rgba(0, 63, 134, 0.12), rgba(255, 209, 102, 0.06));
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 992px) {
        .hero-inner {
            flex-direction: column;
            text-align: center;
        }

        .hero-right-block {
            width: 100%;
            margin-top: 40px;
        }

        .mock-container {
            height: 400px;
        }

        .mock-card-big {
            width: 100%;
            left: 0;
            transform: none;
            height: 240px;
        }

        .mock-card-mid,
        .mock-card-small {
            display: none;
        }

        .hero-title {
            font-size: 40px;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            padding: 100px 20px;
        }

        .hero-title {
            font-size: 34px;
        }

        .hero-text {
            font-size: 16px;
        }

        .btn-gold,
        .btn-outline {
            width: 100%;
            text-align: center;
        }
    }

    /* Services Section */
    .services-section {
        background: linear-gradient(180deg, #f8fbff 0%, #f2f6ff 100%);
        padding: 90px 20px;
    }

    .services-grid-new {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        max-width: 1150px;
        margin: 0 auto;
    }

    .service-card {
        border-radius: 18px;
        padding: 32px 26px;
        background: #fff;
        box-shadow: 0 16px 48px rgba(0, 40, 90, 0.07);
        text-align: center;
        transition: all 0.4s ease;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 24px 60px rgba(0, 40, 90, 0.12);
    }

    .service-icon {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
        border-radius: 14px;
        background: linear-gradient(135deg, #003a6e, #00509e);
        color: #ffd76b;
        font-size: 28px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .service-card h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #002b5b;
        margin-bottom: 10px;
    }

    .service-card p {
        font-size: 1rem;
        color: #5a6c85;
        line-height: 1.6;
    }

    /* Responsive Layouts */
    @media (max-width: 992px) {
        .services-grid-new {
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }
    }

    @media (max-width: 700px) {
        .services-grid-new {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .service-card {
            padding: 28px 22px;
        }

        .service-card h3 {
            font-size: 1.2rem;
        }
    }

    /* Radio Host CTA Section */
    .cta-section {
        background: linear-gradient(180deg, #001a33 0%, #01254a 100%);
        padding: 90px 20px;
        color: #fff;
        position: relative;
    }

    .cta-title-new {
        font-size: 2.2rem;
        font-weight: 700;
        color: #ffd76b;
        margin-bottom: 15px;
    }

    .cta-subtitle-new {
        font-size: 1.1rem;
        color: #d6e2f5;
        max-width: 700px;
        margin: 0 auto 35px;
    }

    .cta-animation {
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
    }

    /* mic animation */
    .mic-wrapper {
        display: inline-block;
    }

    .mic-svg {
        display: block;
        filter: drop-shadow(0 6px 18px rgba(1, 37, 74, 0.45));
    }

    @keyframes wavePulseA {
        0% {
            transform: translateX(0);
            stroke-opacity: 0.08;
        }

        50% {
            transform: translateX(-6px);
            stroke-opacity: 0.28;
        }

        100% {
            transform: translateX(0);
            stroke-opacity: 0.08;
        }
    }

    @keyframes wavePulseB {
        0% {
            transform: translateX(0);
            stroke-opacity: 0.06;
        }

        50% {
            transform: translateX(6px);
            stroke-opacity: 0.22;
        }

        100% {
            transform: translateX(0);
            stroke-opacity: 0.06;
        }
    }

    @keyframes wavePulseC {
        0% {
            transform: translateX(0);
            stroke-opacity: 0.04;
        }

        50% {
            transform: translateX(-10px);
            stroke-opacity: 0.18;
        }

        100% {
            transform: translateX(0);
            stroke-opacity: 0.04;
        }
    }

    .mic-svg .wave1 {
        animation: wavePulseA 1.9s ease-in-out infinite;
        transform-origin: center;
    }

    .mic-svg .wave2 {
        animation: wavePulseB 2.4s ease-in-out infinite;
        transform-origin: center;
    }

    .mic-svg .wave3 {
        animation: wavePulseC 2.9s ease-in-out infinite;
        transform-origin: center;
    }

    @keyframes micBob {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-3px);
        }

        100% {
            transform: translateY(0);
        }
    }

    .mic-svg g:first-of-type {
        animation: micBob 3.6s ease-in-out infinite;
        transform-origin: center;
    }

    /* form */
    .cta-form {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 12px;
    }

    .cta-input {
        padding: 12px 16px;
        border: 1px solid #224e78;
        border-radius: 6px;
        background: #0b2d4e;
        color: #fff;
        font-size: 1rem;
        min-width: 240px;
        outline: none;
    }

    .cta-input::placeholder {
        color: #9fbad3;
    }

    .cta-btn-new {
        padding: 12px 24px;
        background: #ffd76b;
        color: #01254a;
        font-weight: 700;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .cta-btn-new:hover {
        background: #ffca42;
        transform: translateY(-2px);
    }

    /* responsiveness */
    @media (max-width: 600px) {
        .cta-title-new {
            font-size: 1.7rem;
        }

        .cta-subtitle-new {
            font-size: 1rem;
            padding: 0 10px;
        }

        .cta-input {
            min-width: 100%;
        }
    }
</style>

<!-- HERO -->
<section class="hero-section">
    <div class="container-max hero-inner">
        <div class="hero-left-block">
            <div class="kicker-text">Unimax Radio</div>
            <div class="hero-title">Professional Radio Hosting & Advertisement Campaigns</div>
            <p class="hero-text">
                We craft memorable on-air presence and advertising content to engage audiences, boost listener loyalty, and elevate your brand.
            </p>
            <div class="hero-actions">
                <button class="btn-gold" id="startProject">Book a Host</button>
                <button class="btn-outline" onclick="document.getElementById('services').scrollIntoView({behavior:'smooth'})">
                    Explore Services
                </button>
            </div>
        </div>

        <div class="hero-right-block">
            <div class="ribbon-main"></div>
            <div class="ribbon-alt"></div>
            <div class="mock-container">
                <!-- Big Card (Background Image Added) -->
                <div
                    class="mock-card-main mock-card-big"
                    style="background-image:url('https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?auto=format&fit=crop&w=800&q=80'); background-size:cover; background-position:center;"
                    data-anim="float">
                    <div
                        style="position:absolute; inset:0; background:rgba(0,0,0,0.45); border-radius:20px;"></div>
                    <div
                        style="position:relative; padding:40px; color:#fff; text-shadow:0 3px 10px rgba(0,0,0,0.6); display:flex; flex-direction:column; justify-content:center; height:100%;">
                        <div style="font-size:24px; font-weight:800; text-transform:uppercase; letter-spacing:1px;">
                            Premium Broadcast Studio
                        </div>
                        <div style="margin-top:10px; font-size:15px; line-height:1.6;">
                            State-of-the-art sound, live mixing, and global radio streaming for premium clients.
                        </div>
                    </div>
                </div>

                <!-- Medium Card -->
                <div
                    class="mock-card-main mock-card-mid"
                    style="background-image:url('https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?auto=format&fit=crop&w=800&q=80'); background-size:cover; background-position:center;"
                    data-anim="tilt">
                    <div
                        style="padding:20px; text-align:center; color:#fff; text-shadow:0 2px 6px rgba(0,0,0,0.6)">
                        <div style="font-weight:800;font-size:16px;">Live Hosting</div>
                        <div style="font-size:13px;margin-top:8px;color:rgba(255,255,255,0.85)">
                            Interactive shows, interviews, and streaming sessions
                        </div>
                    </div>
                </div>

                <!-- Small Card -->
                <div
                    class="mock-card-main mock-card-small"
                    style="background-image:url('https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?auto=format&fit=crop&w=800&q=80'); background-size:cover; background-position:center;"
                    data-anim="spin">
                    <div
                        style="display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; color:#fff; text-shadow:0 2px 6px rgba(0,0,0,0.6); height:100%;">
                        <div style="font-weight:800">Ad Campaigns</div>
                        <div style="font-size:13px;margin-top:8px">Scriptwriting, recording, broadcasting</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES — Voice Over, Radio & Advertising -->
<section id="services" class="services-section">
    <div class="container-max text-center" style="margin-bottom:28px">
        <div style="font-weight:700;color:#002b5b;letter-spacing:0.5px;">Our Services</div>
        <h2 style="margin:6px 0;font-size:2.2rem;font-weight:700;color:#001a33;">Radio Hosting, Voice Overs & Advertising</h2>
        <p style="max-width:840px;margin:8px auto; color:#5b708a; font-size:1rem;">
            We bring sound to life — from live radio shows and ad campaigns to professional voice overs and branded audio storytelling.
        </p>
    </div>

    <div class="container-max services-grid-new">
        <!-- Service 1 -->
        <div class="service-card">
            <div class="service-icon"><i class="fas fa-microphone"></i></div>
            <h3>Live Radio Hosting</h3>
            <p>Engaging personalities, smooth on-air transitions, and creative programming for FM, AM, and digital radio shows.</p>
        </div>

        <!-- Service 2 -->
        <div class="service-card">
            <div class="service-icon"><i class="fas fa-bullhorn"></i></div>
            <h3>Advertising Campaigns</h3>
            <p>We craft, record, and air captivating ad campaigns that connect brands to listeners through creative storytelling.</p>
        </div>

        <!-- Service 3 -->
        <div class="service-card">
            <div class="service-icon"><i class="fas fa-headphones"></i></div>
            <h3>Voice Over Production</h3>
            <p>Professional voice talent for commercials, documentaries, jingles, podcasts, and corporate narrations — with studio-quality sound.</p>
        </div>
    </div>
</section>

<!-- CTA SECTION — Radio Host On-Air Edition -->
<section class="cta-section">
    <div class="container-max text-center">
        <h2 class="cta-title-new">
            🎙️ Hire a Radio Host or Launch Your Ad Campaign
        </h2>
        <p class="cta-subtitle-new">
            Bring your voice to life — hire charismatic radio hosts or amplify your brand
            through unforgettable on-air advertising campaigns.
        </p>

        <!-- SVG Microphone + Animated Soundwaves -->
        <div class="cta-animation">
            <div class="mic-wrapper" aria-hidden="true">
                <svg class="mic-svg" viewBox="0 0 200 200" width="240" height="240" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <radialGradient id="g" cx="50%" cy="35%">
                            <stop offset="0%" stop-color="#ffd76b" stop-opacity="0.18" />
                            <stop offset="60%" stop-color="#ffd76b" stop-opacity="0.06" />
                            <stop offset="100%" stop-color="#ffd76b" stop-opacity="0" />
                        </radialGradient>
                    </defs>

                    <circle cx="100" cy="80" r="75" fill="url(#g)" />

                    <!-- mic body -->
                    <g transform="translate(60,40)">
                        <rect x="28" y="8" rx="14" ry="14" width="44" height="64" fill="#fff" fill-opacity="0.92" />
                        <rect x="30" y="10" rx="12" ry="12" width="40" height="60" fill="#01254a" />
                        <rect x="34" y="14" rx="10" ry="10" width="32" height="52" fill="#083257" />
                        <!-- grille lines -->
                        <g stroke="#ffdf9a" stroke-opacity="0.14" stroke-width="1.4">
                            <line x1="50" y1="20" x2="50" y2="60" />
                            <line x1="42" y1="22" x2="58" y2="22" />
                            <line x1="42" y1="26" x2="58" y2="26" />
                            <line x1="42" y1="30" x2="58" y2="30" />
                            <line x1="42" y1="34" x2="58" y2="34" />
                            <line x1="42" y1="38" x2="58" y2="38" />
                            <line x1="42" y1="42" x2="58" y2="42" />
                        </g>
                        <!-- mic stand -->
                        <rect x="44" y="74" width="12" height="36" rx="6" fill="#ffdf9a" fill-opacity="0.12" />
                        <rect x="32" y="104" width="40" height="8" rx="4" fill="#ffdf9a" fill-opacity="0.12" />
                    </g>

                    <!-- animated soundwaves -->
                    <g class="waves" transform="translate(0,0)" fill="none" stroke="#ffd76b" stroke-width="2" stroke-linecap="round">
                        <path class="wave1" d="M20 120 C50 100, 150 100, 180 120" stroke-opacity="0.08" />
                        <path class="wave2" d="M30 128 C60 108, 140 108, 170 128" stroke-opacity="0.06" />
                        <path class="wave3" d="M40 136 C70 116, 130 116, 160 136" stroke-opacity="0.04" />
                    </g>
                </svg>
            </div>
        </div>

        <!-- CTA Form -->
        <form class="cta-form" onsubmit="event.preventDefault(); alert('Request Submitted!');">
            <input
                class="cta-input"
                placeholder="Your Brand, Show, or Station Name"
                required>
            <select class="cta-input" required>
                <option value="host">Book a Radio Host</option>
                <option value="ad">Request Ad Campaign</option>
            </select>
            <button class="cta-btn-new" type="submit">
                Go On-Air Now
            </button>
        </form>
    </div>
</section>
<script>
    const lenis = new Lenis({
        duration: 1.1,
        easing: t => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    gsap.registerPlugin(ScrollTrigger);
    gsap.utils.toArray('.services-section, .hero-section, .cta-section').forEach((sec, i) => {
        gsap.from(sec, {
            autoAlpha: 0,
            y: 40,
            duration: 1,
            delay: i * 0.06,
            scrollTrigger: {
                trigger: sec,
                start: 'top 85%'
            }
        });
    });
    gsap.to('[data-anim="float"]', {
        y: 12,
        yoyo: true,
        repeat: -1,
        duration: 4,
        ease: 'sine.inOut'
    });
    gsap.to('[data-anim="tilt"]', {
        rotation: 3,
        yoyo: true,
        repeat: -1,
        duration: 6,
        ease: 'sine.inOut'
    });
    gsap.to('[data-anim="spin"]', {
        rotation: 6,
        yoyo: true,
        repeat: -1,
        duration: 5,
        ease: 'sine.inOut'
    });
</script>
@endsection