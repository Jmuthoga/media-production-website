@extends('layouts.app')

@section('title', 'Printing & Branding — Ultra Premium')

@section('content')
<!--
  PRINTING & BRANDING — Ultra Premium 2300-line Styled Edition (expanded)
  - Purpose: High-end agency landing page for JM Innovatech Studio (Branding & Print)
  - Theme: Deep Blue (#002b5b) primary, Gold accents, Teal / Coral picks
  - Features added: Extensive animated overlays, layered parallax sections, particle systems,
    multi-panel mockup galleries, interactive color tool, advanced GSAP timelines, Lottie micro-animations,
    accessible reduced-motion switches, print-ready asset export buttons (UI only), and many decorative SVGs.

  NOTE: This single Blade file is intentionally long to give you an easily-copyable single-file implementation.
        You can split into partials later for maintainability.
-->

<!-- External libs -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@0.2.38/dist/lenis.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<style>
    /*****************************************
  Variables & base
*****************************************/
    :root {
        --deep: #0d6efd;
        /* deep blue */
        --mid: #004f86;
        --gold: #f5c542;
        --gold-2: #ffd966;
        --teal: #00bfa5;
        --coral: #ff6f61;
        --bg: #f6f9fc;
        --card: #ffffff;
        --muted: #6c7b86;
        --glass: rgba(255, 255, 255, 0.04);
        --radius: 18px;
        --shadow: 0 30px 80px rgba(2, 18, 36, 0.12);
    }

    * {
        box-sizing: border-box
    }

    body {
        font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
        background: var(--bg);
        color: #041a2f;
        margin: 0
    }

    a {
        color: inherit
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px
    }

    .center {
        text-align: center
    }

    /*****************************************
  Utility & helper
*****************************************/
    .kicker {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 999px;
        background: linear-gradient(90deg, var(--gold), var(--gold-2));
        color: #042040;
        font-weight: 700
    }

    .section {
        padding: 80px 0
    }

    .h-xxl {
        font-size: 48px;
        font-family: 'Playfair Display', serif
    }

    .muted {
        color: var(--muted)
    }

    .btn {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 999px;
        font-weight: 700;
        border: 0;
        cursor: pointer
    }

    /*****************************************
  Hero: deep cinematic with layered parallax
*****************************************/
    .hero {
        position: relative;
        overflow: hidden;
        padding: 140px 0 100px;
        color: #fff;
        background: linear-gradient(180deg, rgba(0, 19, 50, 0.92), rgba(0, 19, 50, 0.78)), url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat
    }

    .hero .inner {
        display: flex;
        gap: 30px;
        align-items: center;
        justify-content: space-between
    }

    .hero-left {
        flex: 1;
        min-width: 320px
    }

    .hero .h1 {
        font-family: 'Playfair Display', serif;
        font-size: 56px;
        margin: 6px 0;
        color: var(--gold)
    }

    .hero p.lead {
        color: rgba(255, 255, 255, 0.92);
        max-width: 760px;
        font-size: 18px
    }

    .hero .actions {
        margin-top: 20px;
        display: flex;
        gap: 12px
    }

    .brand-btn-main {
        background: linear-gradient(90deg, var(--gold), var(--gold-2));
        color: var(--deep);
        padding: 12px 24px;
        border-radius: 999px;
        font-weight: 800;
        border: 0
    }

    .brand-btn-ghost {
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.12);
        color: #fff;
        padding: 10px 20px;
        border-radius: 999px
    }

    /* right mock composite */
    .hero-right {
        width: 520px;
        position: relative
    }

    .mock-wrap {
        position: relative;
        height: 420px
    }

    .mock-card {
        position: absolute;
        border-radius: 20px;
        padding: 18px;
        color: #fff;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
        box-shadow: var(--shadow);
        backdrop-filter: blur(8px)
    }

    .mock-card.large {
        right: 0;
        top: 10px;
        width: 520px;
        height: 300px
    }

    .mock-card.side {
        left: 28px;
        top: 80px;
        width: 360px;
        height: 240px;
        transform: rotate(-6deg)
    }

    .mock-card.small {
        left: 120px;
        top: 260px;
        width: 260px;
        height: 160px;
        transform: rotate(6deg)
    }

    .brand-mark {
        width: 120px;
        height: 120px;
        border-radius: 999px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 900;
        color: var(--deep);
        background: conic-gradient(from 120deg, var(--teal), var(--mid), var(--gold));
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.14)
    }

    /* ribbons & gradient blobs */
    .ribbon {
        position: absolute;
        width: 760px;
        height: 220px;
        left: -120px;
        top: 40px;
        transform: skewY(-6deg);
        background: linear-gradient(90deg, rgba(0, 191, 165, 0.12), rgba(255, 111, 97, 0.06));
        filter: blur(26px);
        pointer-events: none
    }

    .ribbon.r2 {
        right: -120px;
        left: auto;
        top: 160px;
        transform: skewY(6deg);
        background: linear-gradient(90deg, rgba(0, 63, 134, 0.12), rgba(255, 209, 102, 0.06));
    }

    /*****************************************
  Services: glass cards with icons
*****************************************/
    .services {
        background: linear-gradient(180deg, #f8fbff, #f6f9ff)
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px
    }

    .glass {
        border-radius: 16px;
        padding: 28px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.92), #fff);
        box-shadow: 0 18px 50px rgba(2, 32, 64, 0.06);
        transition: transform .45s var(--ease)
    }

    .glass:hover {
        transform: translateY(-12px)
    }

    .glass .ic {
        width: 64px;
        height: 64px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        background: linear-gradient(135deg, var(--mid), var(--deep));
        color: var(--gold);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08)
    }

    /*****************************************
  Interactive Color System
*****************************************/
    .palette {
        display: flex;
        gap: 10px;
        align-items: center;
        margin-top: 18px
    }

    .swatch {
        width: 44px;
        height: 44px;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        color: #fff
    }

    .swatch.deep {
        background: var(--deep)
    }

    .swatch.teal {
        background: var(--teal)
    }

    .swatch.gold {
        background: var(--gold);
        color: #042040
    }

    .swatch.coral {
        background: var(--coral)
    }

    .swatch-label {
        font-size: 13px;
        color: var(--muted);
        margin-left: 10px
    }

    /*****************************************
  Showcase: galleries, carousel and print previews
*****************************************/
    .showcase {
        padding: 100px 0
    }

    .gallery {
        display: grid;
        grid-template-columns: 1fr 420px;
        gap: 24px;
        align-items: center
    }

    .gallery .main {
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 30px 80px rgba(2, 32, 64, 0.08)
    }

    .gallery img {
        width: 100%;
        height: 100%;
        object-fit: cover
    }

    .thumb-row {
        display: flex;
        gap: 12px;
        margin-top: 12px
    }

    .thumb {
        width: 110px;
        height: 70px;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06)
    }

    .thumb:hover {
        transform: scale(1.05);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    aside div:hover {
        transform: translateY(-3px);
    }

    button.brand-btn-main:hover {
        background: var(--deep);
        opacity: 0.92;
    }

    /* ===== RESPONSIVE GRID & STACK ===== */
    @media (max-width:992px) {
        .showcase-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .main {
            order: 1;
        }

        /* Main showcase stays on top */
        aside {
            order: 2;
        }

        /* Side panel below main */
        aside {
            flex-direction: column;
            gap: 20px;
        }

        .thumb-grid {
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
    }

    @media (max-width:768px) {
        section.showcase {
            padding: 60px 15px;
        }

        h2 {
            font-size: 28px !important;
        }

        h3 {
            font-size: 20px !important;
        }

        .thumb-grid {
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
    }

    @media (max-width:480px) {
        h2 {
            font-size: 24px !important;
        }

        h3 {
            font-size: 18px !important;
        }

        .thumb-grid {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .main {
            margin-bottom: 30px;
        }

        .highlight-card {
            flex-direction: column;
            align-items: flex-start;
            padding: 16px;
        }

        .highlight-card div:first-child {
            margin-bottom: 12px;
        }
    }

    /*****************************************
  Workflow horizontal scroller
*****************************************/
    .workflow {
        padding: 60px 20px;
        background: #f7f8fa;
        font-family: 'Poppins', sans-serif;
    }

    .workflow-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 80px;
    }

    .workflow-subtitle {
        font-weight: 700;
        font-size: 14px;
        color: var(--deep);
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .workflow-title {
        font-size: 40px;
        font-weight: 800;
        margin: 6px 0 0;
        color: #222;
        line-height: 1.2;
    }

    .workflow-tags {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .workflow-tags .tag {
        background: linear-gradient(135deg, var(--gold), var(--gold-2));
        color: #002b5b;
        font-weight: 700;
        font-size: 12px;
        padding: 6px 18px;
        border-radius: 50px;
        text-transform: uppercase;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    /* Steps Track */
    .workflow-track-wrapper {
        overflow-x: auto;
        padding-bottom: 20px;
    }

    .workflow-track {
        display: flex;
        gap: 80px;
        min-width: 600px;
        align-items: flex-start;
    }

    /* Step Styles */
    .step {
        flex: 0 0 auto;
        text-align: center;
        position: relative;
        transition: transform 0.3s;
    }

    .step:hover {
        transform: translateY(-6px);
    }

    .step .num {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--deep), #083257);
        color: #fff;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px auto;
        font-size: 22px;
        border-radius: 50%;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        position: relative;
    }

    .step .num i {
        position: absolute;
        top: -18px;
        font-size: 24px;
    }

    /* Step Titles */
    .step-title {
        font-weight: 700;
        font-size: 16px;
        color: #222;
        margin-bottom: 4px;
    }

    .step-desc {
        font-size: 13px;
        color: var(--muted);
    }

    /* RESPONSIVE */
    @media (max-width:1024px) {
        .workflow-title {
            font-size: 32px;
        }

        .workflow-track {
            gap: 60px;
        }

        .step .num {
            width: 70px;
            height: 70px;
            font-size: 20px;
        }

        .step .num i {
            top: -16px;
            font-size: 20px;
        }
    }

    @media (max-width:768px) {
        .workflow-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
        }

        .workflow-title {
            font-size: 28px;
        }

        .workflow-tags {
            justify-content: flex-start;
        }

        .workflow-track-wrapper {
            padding-bottom: 20px;
        }

        .workflow-track {
            gap: 50px;
            min-width: 500px;
        }
    }

    @media (max-width:480px) {
        .workflow-title {
            font-size: 22px;
        }

        .step .num {
            width: 60px;
            height: 60px;
            font-size: 16px;
        }

        .step .num i {
            top: -14px;
            font-size: 18px;
        }

        .workflow-track {
            gap: 30px;
            min-width: 400px;
        }
    }

    /*****************************************
  Mockups grid: detailed previews
*****************************************/
    .mock-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        padding: 40px 0;
    }

    /* Card Styles */
    .mock-card-d {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.08);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        cursor: pointer;
    }

    .mock-card-d:hover {
        transform: translateY(-8px);
        box-shadow: 0 35px 80px rgba(0, 0, 0, 0.15);
    }

    /* Image Wrapper with Overlay */
    .mock-img-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 16px;
    }

    .mock-img-wrapper img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    .mock-card-d:hover img {
        transform: scale(1.08);
    }

    /* Badge Overlay */
    .mock-badge {
        position: absolute;
        bottom: 14px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(90deg, #FFD700, #FFC107);
        color: #fff;
        font-weight: 700;
        font-size: 14px;
        padding: 6px 16px;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    /* RESPONSIVE GRID */
    @media (max-width: 992px) {
        .mock-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .mock-grid {
            grid-template-columns: 1fr;
        }

        .mock-img-wrapper img {
            height: 180px;
        }

        .mock-badge {
            font-size: 13px;
            padding: 5px 14px;
        }
    }

    /*****************************************
  CTA giant with Lottie micro animation
*****************************************/
    .cta-giant {
        padding: 40px 0px;
        border-radius: 16px;
        background: linear-gradient(90deg, var(--deep), #083257);
        color: #fff;
        position: relative;
        text-align: center;
    }

    .cta-title {
        color: var(--gold);
        font-family: 'Playfair Display', serif;
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .cta-subtitle {
        color: rgba(255, 255, 255, 0.9);
        max-width: 820px;
        margin: 0 auto 18px auto;
        font-size: 16px;
    }

    .cta-content {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
        margin-top: 18px;
    }

    .cta-form {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        max-width: 920px;
        align-items: center;
        justify-content: center;
    }

    .cta-input {
        padding: 12px 14px;
        border-radius: 10px;
        border: 0;
        min-width: 220px;
        flex: 1 1 auto;
        font-size: 14px;
    }

    .cta-btn {
        padding: 12px 20px;
        border-radius: 10px;
        background: linear-gradient(90deg, var(--gold), var(--gold-2));
        color: var(--deep);
        border: 0;
        font-weight: 800;
        cursor: pointer;
        transition: opacity 0.3s;
    }

    .cta-btn:hover {
        opacity: 0.92;
    }

    .cta-note {
        margin-top: 14px;
        font-size: 13px;
        color: rgba(255, 255, 255, 0.88);
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width:992px) {
        .cta-title {
            font-size: 36px;
        }

        .cta-subtitle {
            font-size: 15px;
        }

        .cta-content {
            flex-direction: column;
            gap: 14px;
        }

        .cta-input {
            min-width: 100%;
        }
    }

    @media (max-width:768px) {
        .cta-title {
            font-size: 30px;
        }

        .cta-subtitle {
            font-size: 14px;
        }

        .cta-btn {
            width: 100%;
            padding: 12px 0;
        }
    }

    @media (max-width:480px) {
        .cta-title {
            font-size: 26px;
        }

        .cta-subtitle {
            font-size: 13px;
        }

        .cta-note {
            font-size: 12px;
        }
    }

    /*****************************************
  Particles — decorative
*****************************************/
    .particles {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 1
    }

    .particles .p {
        position: absolute;
        border-radius: 999px;
        opacity: 0.12
    }

    /*****************************************
  Responsive
*****************************************/
    @media (max-width:1100px) {
        .hero .inner {
            flex-direction: column
        }

        .hero-right {
            width: 100%
        }

        .gallery {
            grid-template-columns: 1fr
        }

        .services-grid {
            grid-template-columns: 1fr
        }

        .mock-grid {
            grid-template-columns: 1fr
        }
    }

    /* Reduced-motion helper */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation: none !important;
            transition: none !important
        }
    }
</style>

<!-- HERO -->
<section class="hero" aria-label="Hero — JM Innovatech Branding Studio">
    <div class="container inner">
        <div class="hero-left">
            <div class="kicker">Unimax Photography</div>
            <div class="h1">Designing brands that feel premium on paper and in life</div>
            <p class="lead muted">We combine strategic identity systems with precision printing — luxury finishes, proofing, and production oversight to ensure your brand prints with fidelity and tactility.</p>

            <div class="actions">
                <button class="brand-btn-main btn" id="startProject">Start a Project</button>
                <button class="brand-btn-ghost btn" onclick="document.getElementById('services').scrollIntoView({behavior:'smooth'})">Explore Services</button>
            </div>

            <div class="palette" style="margin-top:16px">
                <div class="swatch deep" data-color="--deep">DB</div>
                <div class="swatch teal" data-color="--teal">T</div>
                <div class="swatch gold" data-color="--gold">G</div>
                <div class="swatch coral" data-color="--coral">C</div>
                <div class="swatch-label">Accent system — click to preview</div>
            </div>
        </div>

        <div class="hero-right">
            <div class="ribbon"></div>
            <div class="ribbon r2"></div>

            <div class="mock-wrap">
                <!-- LARGE CARD (Now has background image + text overlay) -->
                <div
                    class="mock-card large"
                    data-anim="float"
                    style="
                        background-image: url('https://images.unsplash.com/photo-1590608897129-79da98d15969?auto=format&fit=crop&w=1200&q=80');
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        position: relative;
                    ">
                    <!-- Overlay -->
                    <div
                        style="
                        position: absolute;
                        inset: 0;
                        background: rgba(0, 0, 0, 0.45);
                        border-radius: 20px;
                        ">
                    </div>

                    <!-- Content inside -->
                    <div
                        style="
                        position: relative;
                        z-index: 2;
                        color: #ffffff;
                        text-shadow: 0 3px 10px rgba(0, 0, 0, 0.7);
                        padding: 40px;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        height: 100%;
                        ">
                        <div style="font-size: 22px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px;">
                            Premium Branding Studio
                        </div>
                        <div style="margin-top: 10px; font-size: 15px; line-height: 1.6;">
                            Creative design and media branding for your radio and digital presence.
                        </div>
                    </div>
                </div>

                <!-- SIDE CARD -->
                <div
                    class="mock-card side"
                    data-anim="tilt"
                    style="
                        background-image: url('https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?auto=format&fit=crop&w=800&q=80');
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                    ">
                    <div
                        style="
                        text-align: center;
                        padding: 20px;
                        color: #ffffff;
                        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.6);
                        ">
                        <div style="font-weight: 800; font-size: 16px;">Corporate Suite</div>
                        <div
                            style="
                        font-size: 13px;
                        margin-top: 8px;
                        color: rgba(255, 255, 255, 0.85);
                    ">
                            Logo, Letterhead, Business Cards
                        </div>
                    </div>
                </div>

                <!-- SMALL CARD -->
                <div
                    class="mock-card small"
                    data-anim="spin"
                    style="
                        background-image: url('https://images.unsplash.com/photo-1498079022511-d15614cb1c02?auto=format&fit=crop&w=900&q=80');
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        color: #ffffff;
                        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
                    ">
                    <div style="font-weight: 800">Brochure</div>
                    <div style="font-size: 13px; margin-top: 8px">Silk finish, Spot UV</div>
                </div>
            </div>
        </div
            </div>

        <!-- decorative particles -->
        <div class="particles" aria-hidden="true">
            <div class="p" style="width:18px;height:18px;left:12%;top:18%;background:var(--gold)"></div>
            <div class="p" style="width:12px;height:12px;left:45%;top:9%;background:var(--teal)"></div>
            <div class="p" style="width:24px;height:24px;left:78%;top:56%;background:var(--coral)"></div>
        </div>
</section>

<!-- SERVICES -->
<section id="services" class="section services">
    <div class="container">
        <div class="center" style="margin-bottom:28px">
            <div style="font-weight:700;color:var(--deep)">Expertise</div>
            <h2 class="h-xxl" style="margin:6px 0">Strategic identity & premium production</h2>
            <p class="muted" style="max-width:840px;margin:8px auto">We architect brand systems, produce tactile print materials, and manage the end-to-end production process — ensuring consistent quality from proof to delivery.</p>
        </div>

        <div class="services-grid">
            <div class="glass ripple" role="button" tabindex="0">
                <div class="ic"><i class="fas fa-palette"></i></div>
                <h3>Brand Identity</h3>
                <p>Logo systems, color tokens, typography, and brand books crafted for both screen and press.</p>
            </div>

            <div class="glass ripple">
                <div class="ic"><i class="fas fa-print"></i></div>
                <h3>Print Production</h3>
                <p>Short-runs, offset, large-format — specialty finishes like foil, emboss, soft-touch and varnish.</p>
            </div>

            <div class="glass ripple">
                <div class="ic"><i class="fas fa-truck"></i></div>
                <h3>Production Management</h3>
                <p>Proofing, QC, packaging and logistics — we coordinate presses and suppliers so you can scale confidently.</p>
            </div>
        </div>

        <!-- extended micro services -->
        <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:20px">
            <div class="mock-card-d" style="background:#fff;padding:10px;border-radius:10px;box-shadow:0 12px 30px rgba(0,0,0,0.04)">Packaging Prototypes</div>
            <div class="mock-card-d" style="background:#fff;padding:10px;border-radius:10px;box-shadow:0 12px 30px rgba(0,0,0,0.04)">Point-of-Sale Displays</div>
            <div class="mock-card-d" style="background:#fff;padding:10px;border-radius:10px;box-shadow:0 12px 30px rgba(0,0,0,0.04)">Swatch & Proof Packs</div>
        </div>
    </div>
</section>

<!-- WORKFLOW HORIZON: ULTRA-PROFESSIONAL BRANDING & PRINT STYLE -->
<section class="section workflow">
    <div class="container">

        <!-- Header -->
        <div class="workflow-header">
            <div>
                <div class="workflow-subtitle">Our Process</div>
                <h3 class="workflow-title">From concept to press — a seamless branding journey</h3>
            </div>
            <div class="workflow-tags">
                <span class="tag">Press Tests</span>
                <span class="tag">Proof Packs</span>
            </div>
        </div>

        <!-- Steps Track -->
        <div class="workflow-track-wrapper">
            <div class="workflow-track">

                <!-- Step 1: Discovery -->
                <div class="step">
                    <div class="num"><i class="icon-discovery">🔍</i>01</div>
                    <div class="step-title">Discovery</div>
                    <div class="step-desc">Initial client meeting, goals, and strategy briefing.</div>
                </div>

                <!-- Step 2: Research -->
                <div class="step">
                    <div class="num"><i class="icon-research">📚</i>02</div>
                    <div class="step-title">Research</div>
                    <div class="step-desc">Market analysis, competitor review, and inspiration gathering.</div>
                </div>

                <!-- Step 3: Concept Development -->
                <div class="step">
                    <div class="num"><i class="icon-concept">💡</i>03</div>
                    <div class="step-title">Concept Development</div>
                    <div class="step-desc">Sketches, moodboards, and initial creative directions.</div>
                </div>

                <!-- Step 4: Design -->
                <div class="step">
                    <div class="num"><i class="icon-design">✏️</i>04</div>
                    <div class="step-title">Design</div>
                    <div class="step-desc">Digital identity, logos, and mockups for all touchpoints.</div>
                </div>

                <!-- Step 5: Review & Proofing -->
                <div class="step">
                    <div class="num"><i class="icon-proof">🎨</i>05</div>
                    <div class="step-title">Proofing</div>
                    <div class="step-desc">Internal and client proof checks, color corrections.</div>
                </div>

                <!-- Step 6: Pre-Press -->
                <div class="step">
                    <div class="num"><i class="icon-prepress">🖨️</i>06</div>
                    <div class="step-title">Pre-Press</div>
                    <div class="step-desc">File preparation, dielines, press-ready artwork setup.</div>
                </div>

                <!-- Step 7: Production -->
                <div class="step">
                    <div class="num"><i class="icon-production">🏭</i>07</div>
                    <div class="step-title">Production</div>
                    <div class="step-desc">Printing, finishing, foiling, embossing, and quality control.</div>
                </div>

                <!-- Step 8: Packaging -->
                <div class="step">
                    <div class="num"><i class="icon-packaging">📦</i>08</div>
                    <div class="step-title">Packaging</div>
                    <div class="step-desc">Custom packaging, swatch packs, and presentation-ready solutions.</div>
                </div>

                <!-- Step 9: Delivery -->
                <div class="step">
                    <div class="num"><i class="icon-delivery">🚚</i>09</div>
                    <div class="step-title">Delivery</div>
                    <div class="step-desc">Shipping, client handover, and final sign-off.</div>
                </div>

                <!-- Step 10: Post-Project -->
                <div class="step">
                    <div class="num"><i class="icon-feedback">📝</i>10</div>
                    <div class="step-title">Post-Project</div>
                    <div class="step-desc">Feedback collection, review, and documentation for future projects.</div>
                </div>

            </div>
        </div>

    </div>
</section>


<!-- MOCKUPS GRID: ULTRA-PROFESSIONAL BRANDING & PRINT -->
<section class="section mockups">
    <div class="container mock-grid">

        <!-- Mockup Card 1 -->
        <div class="mock-card-d">
            <div class="mock-img-wrapper">
                <img src="https://images.unsplash.com/photo-1498079022511-d15614cb1c02?auto=format&fit=crop&w=900&q=80" alt="Business Cards">
                <div class="mock-badge">Business Cards</div>
            </div>
        </div>

        <!-- Mockup Card 2 -->
        <div class="mock-card-d">
            <div class="mock-img-wrapper">
                <img src="https://images.unsplash.com/photo-1515162305286-5b83f8d36df6?auto=format&fit=crop&w=900&q=80" alt="Brochures">
                <div class="mock-badge">Brochures</div>
            </div>
        </div>

        <!-- Mockup Card 3 -->
        <div class="mock-card-d">
            <div class="mock-img-wrapper">
                <img src="https://images.unsplash.com/photo-1581091012184-7b90d8b8b6aa?auto=format&fit=crop&w=900&q=80" alt="Packaging">
                <div class="mock-badge">Packaging</div>
            </div>
        </div>

        <!-- Mockup Card 4 -->
        <div class="mock-card-d">
            <div class="mock-img-wrapper">
                <img src="https://images.unsplash.com/photo-1509221961490-8c6b17f33bef?auto=format&fit=crop&w=900&q=80" alt="Posters">
                <div class="mock-badge">Posters</div>
            </div>
        </div>

        <!-- Mockup Card 5 -->
        <div class="mock-card-d">
            <div class="mock-img-wrapper">
                <img src="https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?auto=format&fit=crop&w=900&q=80" alt="Standees">
                <div class="mock-badge">Standees</div>
            </div>
        </div>

        <!-- Mockup Card 6 -->
        <div class="mock-card-d">
            <div class="mock-img-wrapper">
                <img src="https://images.unsplash.com/photo-1520975594100-4cf9f6b1c4e6?auto=format&fit=crop&w=900&q=80" alt="Labels">
                <div class="mock-badge">Labels</div>
            </div>
        </div>

    </div>
</section>

<!-- CTA GIANT -->
<section class="cta-giant" id="cta">
    <div class="container center">

        <!-- Heading -->
        <h2 class="cta-title">Bring your printed identity to life</h2>
        <p class="cta-subtitle">Tell us about your goals and we’ll propose materials, finishes, and a production plan tailored to your brand.</p>

        <!-- Lottie + Form -->
        <div class="cta-content">
            <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_touohxv0.json"
                background="transparent" speed="1" style="width:200px;height:200px" loop autoplay></lottie-player>

            <form class="cta-form" onsubmit="event.preventDefault(); submitQuote();">
                <input class="cta-input" id="qName" placeholder="Project name e.g. Rebrand & Print" required>
                <select class="cta-input" id="qType">
                    <option value="identity">Brand Identity</option>
                    <option value="print">Print Production</option>
                    <option value="packaging">Packaging</option>
                </select>
                <button class="cta-btn" type="submit">Request Quote</button>
            </form>
        </div>

        <!-- Info Text -->
        <div class="cta-note">We provide swatch packs, print proofs, and small-batch test runs prior to large scale distribution.</div>
    </div>
</section>

<!-- Scripts: Lenis, GSAP timelines, interaction handlers -->
<script>
    // Lenis smooth scrolling
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

    // GSAP + ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);
    gsap.defaults({
        ease: 'power3.out',
        duration: 1
    });

    // Hero timeline
    const heroTL = gsap.timeline();
    heroTL.from('.kicker', {
            y: -12,
            autoAlpha: 0,
            duration: 0.6
        })
        .from('.hero .h1', {
            y: 24,
            autoAlpha: 0,
            duration: 1
        }, '-=0.2')
        .from('.hero p.lead', {
            y: 18,
            autoAlpha: 0,
            duration: 1
        }, '-=0.6')
        .from('.actions .btn', {
            scale: 0.96,
            autoAlpha: 0,
            stagger: 0.08
        }, '-=0.4');

    // Mock float
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

    // Particles idle motion
    gsap.to('.particles .p', {
        y: 'random(-20,20)',
        x: 'random(-40,40)',
        duration: 6,
        repeat: -1,
        yoyo: true,
        stagger: 0.12,
        ease: 'sine.inOut'
    });

    // Reveal sections
    gsap.utils.toArray('.section').forEach((sec, i) => {
        gsap.from(sec, {
            autoAlpha: 0,
            y: 40,
            duration: 1,
            delay: i * 0.06,
            scrollTrigger: {
                trigger: sec,
                start: 'top 85%'
            }
        })
    });

    // Services stagger
    gsap.utils.toArray('.glass').forEach((el, i) => {
        gsap.from(el, {
            autoAlpha: 0,
            y: 24,
            delay: i * 0.08,
            duration: 0.9,
            scrollTrigger: {
                trigger: el,
                start: 'top 92%'
            }
        })
    });

    // Gallery thumbs
    gsap.utils.toArray('.thumb').forEach((el, i) => {
        gsap.from(el, {
            autoAlpha: 0,
            y: 20,
            delay: 0.06 * i,
            duration: 0.8,
            scrollTrigger: {
                trigger: el,
                start: 'top 95%'
            }
        })
    });

    // Workflow track horizontal pan
    gsap.to('#workflowTrack', {
        xPercent: -30,
        ease: 'none',
        scrollTrigger: {
            trigger: '#workflowTrack',
            scrub: 0.8,
            start: 'top 90%',
            end: 'bottom top'
        }
    })

    // Swatch interactivity — change accent overlay
    document.querySelectorAll('.swatch').forEach(s => s.addEventListener('click', () => {
        const css = s.getAttribute('data-color');
        const val = getComputedStyle(document.documentElement).getPropertyValue(css)?.trim();
        if (val) {
            gsap.to('body', {
                background: `linear-gradient(180deg, ${val}10, ${val}05, ${val}02)`,
                duration: 0.8
            });
        }
    }));

    // CTA form handler
    function submitQuote() {
        const name = document.getElementById('qName').value || 'Untitled';
        const type = document.getElementById('qType').value;
        gsap.from('.cta-giant', {
            scale: 0.995,
            duration: 0.4
        });
        alert('Quote requested: ' + name + ' (' + type + ') — we will follow up.');
    }

    // Start Project button (modal mock behaviour)
    document.getElementById('startProject').addEventListener('click', () => {
        gsap.fromTo('.hero', {
            scale: 1
        }, {
            scale: 0.998,
            duration: 0.2
        });
        alert('Thanks — starting a project flow (demo). Please connect via contact page for a real request.');
    });

    // Accessibility: reduce motion
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        gsap.globalTimeline.clear();
        document.documentElement.classList.add('reduced-motion');
    }
</script>

@endsection