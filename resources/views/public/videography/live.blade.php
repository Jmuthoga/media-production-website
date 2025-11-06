@extends('layouts.app')

@section('title', 'Live Event — On Air')

@section('content')
<!--
  Live Event Blade View (all-in-one)
  - Blue theme, cinematic, responsive
  - Uses Swiper (CDN) for multi-angle carousel and AOS (CDN) for scroll animations
  - Embedded YouTube live link (provided by user)
  - Inline CSS and JS for immediate drop-in use.
-->

<!-- External CDN (Swiper + AOS) -->
<link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

<style>
    /* ============================
   Base — Blue Cinematic Theme
   ============================ */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

    :root {
        --bg-900: #030617;
        --bg-800: #071431;
        --card: #071a3a;
        --muted: #9fb2d4;
        --accent-1: #1e90ff;
        /* primary blue */
        --accent-2: #00c6ff;
        /* aqua */
        --accent-3: #5b7fff;
        /* lighter blue */
        --glass: rgba(255, 255, 255, 0.03);
        --glass-2: rgba(255, 255, 255, 0.02);
        --outline: rgba(255, 255, 255, 0.04);
        --shadow-lg: 0 24px 60px rgba(3, 6, 17, 0.8);
        --rounded-lg: 16px;
        --rounded-md: 10px;
        --text: #eaf3ff;
        --accent-contrast: #021028;
        --success: #28c76f;
        --danger: #ff4d6e;
        --transition: 260ms cubic-bezier(.2, .9, .2, 1);

        --live-red: #ff0033;
        --live-dark: #b30021;
        --white: #ffffff;
    }

    /* Reset + base */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: linear-gradient(180deg, var(--bg-900), var(--bg-800));
        color: var(--text);
        font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    img {
        max-width: 100%;
        display: block;
    }

    /* Container sizes */
    .container {
        width: 94%;
        max-width: 1320px;
        margin: 0 auto;
    }

    /* Utility */
    .row {
        display: flex;
        gap: 20px;
    }

    .col {
        flex: 1;
    }

    .flex {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .center {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hstack {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    /* ============================
   HERO / HEAD
   ============================ */
    .hero {
        padding: 48px 0 22px;
        position: relative;
        overflow: visible;
    }

    .hero-inner {
        display: flex;
        gap: 28px;
        align-items: flex-start;
        justify-content: space-between;
    }

    .hero-left {
        flex: 1 1 720px;
        min-width: 300px;
        z-index: 2;
    }

    .hero-right {
        width: 420px;
        flex-shrink: 0;
        z-index: 2;
    }

    /* Live Badge Style */
    .live-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(90deg, var(--live-red), var(--live-dark));
        padding: 8px 16px;
        border-radius: 999px;
        font-weight: 700;
        color: var(--white);
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-family: 'Poppins', sans-serif;
        box-shadow: 0 0 30px rgba(255, 0, 51, 0.4);
        animation: badge-glow 1.6s ease-in-out infinite alternate;
        cursor: default;
    }

    .live-dot {
        width: 12px;
        height: 12px;
        background: var(--white);
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        animation: pulse 1.4s infinite ease-in-out;
    }

    /* Glow Animation */
    @keyframes badge-glow {
        0% {
            box-shadow: 0 0 12px rgba(255, 0, 51, 0.3);
        }

        50% {
            box-shadow: 0 0 30px rgba(255, 0, 51, 0.6);
        }

        100% {
            box-shadow: 0 0 12px rgba(255, 0, 51, 0.3);
        }
    }

    /* Dot pulse animation */
    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.4);
            opacity: 0.7;
        }
    }

    /* Optional: Position badge at top-left corner of the video */
    .live-badge-container {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 20;
    }

    .title {
        font-size: clamp(1.6rem, 3.4vw, 2.6rem);
        margin: 10px 0 6px 0;
        font-weight: 800;
        line-height: 1.02;
        letter-spacing: -0.02em;
    }

    .subtitle {
        color: var(--muted);
        margin: 6px 0 12px 0;
        font-size: 1rem;
        max-width: 64ch;
    }

    /* metadata chips */
    .chips {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 12px;
    }

    .chip {
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
        border: 1px solid var(--outline);
        padding: 8px 12px;
        border-radius: 12px;
        color: var(--text);
        font-weight: 600;
        font-size: 0.95rem;
    }

    /* animated beams */
    .beam-wrap {
        position: absolute;
        inset: 0;
        pointer-events: none;
        overflow: hidden;
        z-index: 0;
    }

    .beam {
        position: absolute;
        width: 80%;
        height: 160%;
        transform: skewX(-12deg);
        filter: blur(34px);
        opacity: 0.06;
        mix-blend-mode: screen;
        animation: beamMove 12s linear infinite;
    }

    .beam.b1 {
        left: -20%;
        top: -40%;
        background: linear-gradient(90deg, rgba(30, 144, 255, 0.85), rgba(0, 198, 255, 0.45));
        animation-duration: 14s;
    }

    .beam.b2 {
        right: -5%;
        top: -20%;
        background: linear-gradient(90deg, rgba(91, 127, 255, 0.7), rgba(0, 198, 255, 0.25));
        animation-duration: 11s;
    }

    .beam.b3 {
        left: 0%;
        bottom: -40%;
        background: linear-gradient(90deg, rgba(0, 198, 255, 0.55), rgba(30, 144, 255, 0.2));
        animation-duration: 18s;
    }

    @keyframes beamMove {
        0% {
            transform: translateX(-18%) skewX(-12deg) scale(1);
        }

        50% {
            transform: translateX(8%) skewX(-12deg) scale(1.05);
        }

        100% {
            transform: translateX(-18%) skewX(-12deg) scale(1);
        }
    }

    /* ============================
   PLAYER AREA
   ============================ */
    .player-wrap {
        margin-top: 18px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
        border-radius: 16px;
        padding: 14px;
        border: 1px solid rgba(255, 255, 255, 0.03);
        box-shadow: var(--shadow-lg);
    }

    .player-grid {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 14px;
        align-items: start;
    }

    .player-main {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        min-height: 480px;
        background: #000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .player-main .player-iframe,
    .player-main video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border: none;
    }

    /* overlay stats */
    .player-overlay {
        position: absolute;
        left: 18px;
        top: 18px;
        display: flex;
        gap: 10px;
        align-items: center;
        z-index: 4;
    }

    .overlay-stat {
        background: rgba(0, 0, 0, 0.46);
        padding: 10px 12px;
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.03);
        display: flex;
        gap: 10px;
        align-items: center;
        color: white;
        font-weight: 700;
        backdrop-filter: blur(6px);
    }

    .overlay-stat .num {
        font-size: 1.05rem;
        color: var(--text);
    }

    /* bottom-left caption */
    .player-caption {
        position: absolute;
        left: 18px;
        bottom: 18px;
        z-index: 4;
        background: linear-gradient(90deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.22));
        padding: 10px 12px;
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.03);
    }

    /* ============================
   SIDEBAR: CHAT / ACTIONS
   ============================ */
    .side {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .side-card {
        border-radius: 12px;
        padding: 12px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.01), rgba(255, 255, 255, 0.005));
        border: 1px solid rgba(255, 255, 255, 0.03);
    }

    .join-row {
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: space-between;
    }

    .btn-primary {
        background: linear-gradient(90deg, var(--accent-1), var(--accent-3));
        color: white;
        padding: 10px 16px;
        border-radius: 999px;
        font-weight: 800;
        border: none;
        cursor: pointer;
        box-shadow: 0 12px 40px rgba(30, 144, 255, 0.12);
    }

    .btn-outline {
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.04);
        padding: 8px 12px;
        border-radius: 10px;
        color: var(--text);
        cursor: pointer;
    }

    /* reactions */
    .reactions {
        display: flex;
        gap: 8px;
        margin-left: auto;
    }

    .reaction {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
        border: 1px solid rgba(255, 255, 255, 0.03);
        cursor: pointer;
    }

    /* chat preview */
    .chat-preview {
        height: 220px;
        overflow: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding: 6px;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.18), rgba(255, 255, 255, 0.01));
        border-radius: 10px;
    }

    .chat-message {
        display: flex;
        gap: 10px;
        align-items: flex-start;
    }

    .chat-avatar {
        width: 36px;
        height: 36px;
        border-radius: 999px;
        background: linear-gradient(90deg, #ffffff18, #ffffff10);
        border: 1px solid rgba(255, 255, 255, 0.03);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: var(--text);
    }

    .chat-username {
        font-weight: 700;
        color: var(--accent-1);
        font-size: 0.92rem;
    }

    .chat-text {
        color: var(--text);
        font-size: 0.95rem;
    }

    .chat-meta {
        color: var(--muted);
        font-size: 0.82rem;
        margin-top: 4px;
    }

    /* timeline */
    .timeline-item {
        display: flex;
        gap: 10px;
        align-items: flex-start;
        padding: 8px 0;
        border-bottom: 1px dashed rgba(255, 255, 255, 0.02);
    }

    .timeline-time {
        width: 60px;
        color: var(--muted);
        font-weight: 700;
        font-size: 0.92rem;
    }

    .timeline-desc {
        flex: 1;
    }

    /* ============================
   MULTI-ANGLE THUMBS (SWIPER)
   ============================ */
    .angles-wrap {
        margin-top: 12px;
    }

    .swiper {
        width: 100%;
    }

    .angle-thumb {
        border-radius: 10px;
        overflow: hidden;
        height: 88px;
        background: #000;
        position: relative;
        cursor: pointer;
        border: 2px solid transparent;
        transition: transform var(--transition), border-color var(--transition);
    }

    .angle-thumb.active {
        transform: translateY(-6px);
        border-color: var(--accent-3);
        box-shadow: 0 18px 48px rgba(0, 0, 0, 0.6);
    }

    .angle-label {
        position: absolute;
        left: 8px;
        bottom: 8px;
        background: rgba(0, 0, 0, 0.45);
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 0.82rem;
        color: white;
    }

    /* ============================
   SERVICES, PRICING & FAQ
   ============================ */
    .section {
        margin-top: 26px;
    }

    .grid-3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
    }

    .service-card {
        border-radius: 12px;
        padding: 14px;
        border: 1px solid rgba(255, 255, 255, 0.03);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.01), rgba(255, 255, 255, 0.005));
    }

    .service-icon {
        font-size: 1.6rem;
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 8px;
        color: white;
    }

    /* pricing */
    .pricing {
        display: flex;
        gap: 12px;
        margin-top: 12px;
    }

    .price-card {
        flex: 1;
        padding: 14px;
        border-radius: 12px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.01), rgba(255, 255, 255, 0.005));
        border: 1px solid rgba(255, 255, 255, 0.03);
    }

    .price-large {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--accent-1);
        margin-top: 8px;
    }

    /* testimonials & sponsors */
    .testimonials {
        display: flex;
        gap: 12px;
        margin-top: 12px;
        flex-wrap: wrap;
    }

    .testimonial {
        flex: 1;
        padding: 12px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.03);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.01), rgba(255, 255, 255, 0.005));
    }

    /* sponsors */
    .sponsors {
        display: flex;
        gap: 10px;
        padding: 10px 0;
        overflow: auto;
        margin-top: 12px;
    }

    .sponsor {
        width: 160px;
        height: 64px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.03);
        color: var(--muted);
        font-weight: 700;
    }

    /* FAQ */
    .faq-item {
        padding: 12px 0;
        border-bottom: 1px dashed rgba(255, 255, 255, 0.02);
    }

    /* CTA Footer - Responsive */
    .cta-footer {
        margin-top: 26px;
        border-radius: 12px;
        padding: 16px 24px;
        display: flex;
        gap: 16px;
        align-items: center;
        justify-content: space-between;
        background: linear-gradient(90deg, rgba(91, 127, 255, 0.08), rgba(0, 198, 255, 0.04));
        border: 1px solid rgba(255, 255, 255, 0.03);
        flex-wrap: wrap;
    }

    /* Title */
    .cta-footer h3 {
        margin: 0;
        font-size: 1.4rem;
        font-weight: 700;
        color: #fff;
    }

    /* Subtitle text */
    .cta-footer .small {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.95rem;
    }

    /* Buttons area */
    .cta-footer>div:last-child {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .cta-footer {
            flex-direction: column;
            text-align: center;
            align-items: center;
            padding: 24px 18px;
        }

        .cta-footer>div:last-child {
            justify-content: center;
        }

        .cta-footer h3 {
            font-size: 1.3rem;
        }
    }

    @media (max-width: 576px) {
        .cta-footer {
            padding: 20px 16px;
            gap: 12px;
        }

        .cta-footer h3 {
            font-size: 1.2rem;
        }

        .cta-footer .small {
            font-size: 0.9rem;
        }

        .cta-footer>div:last-child a {
            width: 100%;
            text-align: center;
        }
    }


    /* footer small */
    .small {
        font-size: 0.9rem;
        color: var(--muted);
    }

    #unmuteButton:hover {
        background: #d9002c;
        box-shadow: 0 8px 25px rgba(255, 0, 51, 0.55);
        transform: scale(1.05);
    }

    @keyframes glowPulse {

        0%,
        100% {
            box-shadow: 0 0 15px rgba(255, 0, 51, 0.4);
        }

        50% {
            box-shadow: 0 0 30px rgba(255, 0, 51, 0.7);
        }
    }

    #unmuteButton {
        animation: glowPulse 1.6s ease-in-out infinite;
    }


    /* responsive */
    @media (max-width: 1100px) {
        .player-grid {
            grid-template-columns: 1fr;
        }

        .hero-inner {
            flex-direction: column;
            align-items: center;
        }

        .hero-right {
            width: 100%;
        }

        .grid-3 {
            grid-template-columns: 1fr;
        }

        .pricing {
            flex-direction: column;
        }
    }

    @media (max-width: 760px) {
        .angle-thumb {
            height: 72px;
        }

        .player-main {
            min-height: 320px;
        }

        .chat-preview {
            height: 180px;
        }

        .hero {
            padding: 28px 0;
        }

        .title {
            font-size: 1.4rem;
        }
    }

    /* focus outlines */
    .angle-thumb:focus,
    .btn-primary:focus,
    .btn-outline:focus {
        outline: 3px solid rgba(91, 127, 255, 0.12);
        outline-offset: 3px;
    }

    /* reduced motion */
    @media (prefers-reduced-motion: reduce) {
        .beam {
            animation: none;
        }

        .angle-thumb,
        .btn-primary {
            transition: none;
        }
    }
</style>

<!-- ============================
     Markup / HTML
     ============================ -->
<section class="hero" aria-labelledby="heroTitle" role="region">
    <div class="container">
        <div class="hero-inner">
            <div class="hero-left" data-aos="fade-right">
                <div class="hstack">
                    <div class="live-badge" aria-hidden="true">
                        <span class="live-dot" aria-hidden="true"></span>
                        <span>LIVE • ON AIR</span>
                    </div>
                </div>

                <h1 id="heroTitle" class="title">Live Event — Streamed & Multi-Camera Production</h1>
                <p class="subtitle">Blue-cinematic live coverage for concerts, corporate galas, hybrid broadcasts and weddings. Real-time feeds, multi-camera switching, high-quality audio and fast post-event delivery.</p>

                <div class="chips" role="list" aria-label="Event metadata">
                    <div class="chip" role="listitem"><strong id="viewerCount">0</strong> viewers</div>
                    <div class="chip" role="listitem">Live • Oct 29, 2025</div>
                    <div class="chip" role="listitem">Location: KICC, Nairobi</div>
                    <div class="chip" role="listitem">Primary Platform: YouTube Live</div>
                </div>

                <div style="margin-top:14px;">
                    <a href="{{ route('contact') }}" class="btn-primary" style="margin-right:10px;">Book Coverage</a>
                    <a href="#packages" class="btn-outline">See Packages</a>
                </div>

                <!-- beams -->
                <div class="beam-wrap" aria-hidden="true">
                    <div class="beam b1" aria-hidden="true"></div>
                    <div class="beam b2" aria-hidden="true"></div>
                    <div class="beam b3" aria-hidden="true"></div>
                </div>
            </div>

            <div class="hero-right" data-aos="fade-left">
                <div class="side-card">
                    <h4 style="margin:0 0 10px 0;">Event Snapshot</h4>
                    <div style="display:flex; gap:10px; align-items:center; justify-content:space-between;">
                        <div>
                            <div style="font-weight:800; font-size:1.1rem;">Beats & Lights — Oct 29</div>
                            <div class="small">Live concert with special guests and VIP streaming room.</div>
                        </div>
                        <div style="text-align:right;">
                            <div style="font-weight:800; font-size:1.4rem; color:var(--accent-2);" id="miniViewers">0</div>
                            <div class="small" style="color:var(--muted);">Live viewers</div>
                        </div>
                    </div>

                    <div style="margin-top:12px;">
                        <button class="btn-primary" style="width:100%;">Join Stream</button>
                    </div>

                    <div style="margin-top:12px; display:flex; gap:8px;">
                        <div class="chip">VIP Available</div>
                        <div class="chip">Drone Allowed</div>
                    </div>
                </div>
            </div> <!-- end hero-right -->
        </div>
    </div>
</section>

<!-- ============================
     Player / Multi-Angle Section
     ============================ -->
<section class="player-wrap" aria-label="Live player" id="playerSection">
    <div class="container">
        <div class="player-grid">
            <!-- Main Player -->
            <main class="player-main" id="mainPlayer" role="region" aria-label="Main live player"
                style="position:relative; width:100%; height:100vh; overflow:hidden; background:#000;">

                <!-- Live YouTube Stream -->
                <div class="player-iframe" aria-hidden="false"
                    style="position:absolute; inset:0; width:100%; height:100%;">

                    <iframe id="youtubeLive"
                        src=""
                        frameborder="0"
                        allow="autoplay; encrypted-media; picture-in-picture"
                        allowfullscreen
                        style="position:absolute; top:0; left:0; width:100%; height:100%; border:none; object-fit:cover;">
                    </iframe>

                    <!-- Unmute Button -->
                    <button id="unmuteButton"
                        style="position:absolute; bottom:25px; right:25px; z-index:5;
            background:#ff0033; color:#fff; font-weight:600;
            padding:10px 22px; border:none; border-radius:6px;
            box-shadow:0 6px 20px rgba(255, 0, 51, 0.45);
            cursor:pointer; font-family:'Poppins', sans-serif;
            transition:all 0.3s ease;">
                        🔊 Tap to Unmute
                    </button>

                    <script>
                        // --- Function to detect and convert any YouTube link ---
                        function getYouTubeEmbedUrl(link) {
                            let videoId = '';

                            // Support for different formats
                            const normal = link.match(/v=([^&]+)/);
                            const short = link.match(/youtu\.be\/([^?]+)/);
                            const live = link.match(/youtube\.com\/live\/([^?]+)/);

                            if (normal) videoId = normal[1];
                            else if (short) videoId = short[1];
                            else if (live) videoId = live[1];

                            if (videoId) {
                                return `https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1&rel=0&modestbranding=1`;
                            } else {
                                console.error("Invalid YouTube link:", link);
                                return "";
                            }
                        }

                        // --- Set your video link here (works for both live and normal YouTube URLs) ---
                        const youtubeLink = "https://youtu.be/0VPxiroK7kM?si=YDU8YL8dquXm6ByZ";
                        const embedUrl = getYouTubeEmbedUrl(youtubeLink);
                        document.getElementById("youtubeLive").src = embedUrl;

                        // --- Unmute functionality ---
                        const unmuteButton = document.getElementById("unmuteButton");
                        unmuteButton.addEventListener("click", () => {
                            const iframe = document.getElementById("youtubeLive");
                            iframe.src = iframe.src.replace("mute=1", "mute=0");
                            unmuteButton.style.display = "none";
                        });
                    </script>
                </div>


                <!-- Overlay Stats -->
                <div class="player-overlay"
                    style="position:absolute; top:20px; left:20px; z-index:4; display:flex; gap:20px;">

                    <div class="overlay-stat"
                        style="display:flex; align-items:center; background:rgba(0,0,0,0.6); 
                    padding:8px 14px; border-radius:6px; backdrop-filter:blur(6px); color:#fff;">
                        <span style="font-size:1rem; margin-right:8px;">👁️</span>
                        <div style="display:flex; flex-direction:column;">
                            <span id="ovViewCount" style="font-weight:700;">2.1K</span>
                            <small style="color:#9baec8;">Live viewers</small>
                        </div>
                    </div>

                    <div class="overlay-stat"
                        style="display:flex; align-items:center; background:rgba(0,0,0,0.6); 
                    padding:8px 14px; border-radius:6px; backdrop-filter:blur(6px); color:#fff;">
                        <span style="font-size:1rem; margin-right:8px;">❤️</span>
                        <div style="display:flex; flex-direction:column;">
                            <span id="ovLikeCount" style="font-weight:700;">845</span>
                            <small style="color:#9baec8;">Likes</small>
                        </div>
                    </div>
                </div>

                <!-- Caption (Bottom Left) -->
                <div class="player-caption"
                    style="position:absolute; bottom:20px; left:20px; z-index:4; color:#fff;">
                    <div style="font-weight:800;">Live: Stage Cam A</div>
                    <div style="color:#9baec8; font-size:0.9rem; margin-top:4px;">
                        1080p • Live Mix • ISO Record
                    </div>
                </div>
            </main>


            <!-- Side panel -->
            <aside class="side">
                <div class="side-card" data-aos="fade-left">
                    <div class="join-row">
                        <div>
                            <div class="small">Watch Live</div>
                            <div style="font-weight:800; font-size:1.05rem;">Free Access</div>
                        </div>
                        <div style="display:flex; gap:8px; align-items:center;">
                            <button class="btn-primary" id="btnJoinStream" aria-pressed="false">Join</button>
                        </div>
                    </div>

                    <div style="margin-top:12px; display:flex; align-items:center; gap:8px;">
                        <div style="font-weight:700;">Actions</div>
                        <div class="reactions" aria-hidden="false">
                            <div class="reaction" data-emoji="👏" title="Clap">👏</div>
                            <div class="reaction" data-emoji="🔥" title="Fire">🔥</div>
                            <div class="reaction" data-emoji="💖" title="Love">💖</div>
                        </div>
                    </div>

                    <div style="margin-top:12px;">
                        <div style="font-weight:700;">Stream Quality</div>
                        <div style="display:flex; gap:8px; margin-top:8px;">
                            <div class="chip" id="qualityBadge">Auto</div>
                            <div class="chip" id="latencyBadge">Low Latency</div>
                        </div>
                    </div>

                    <div style="margin-top:12px;">
                        <div style="font-weight:700;">Event Schedule</div>
                        <div style="margin-top:10px;">
                            <div class="timeline-item">
                                <div class="timeline-time">19:00</div>
                                <div class="timeline-desc"><strong>Opening Set</strong>
                                    <div class="chat-meta">DJ Tone</div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-time">20:00</div>
                                <div class="timeline-desc"><strong>Keynote</strong>
                                    <div class="chat-meta">Corporate Gala Opening</div>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-time">21:00</div>
                                <div class="timeline-desc"><strong>Headliner</strong>
                                    <div class="chat-meta">Beats & Lights</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="side-card" data-aos="fade-left">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <div style="font-weight:700;">Live Chat</div>
                        <div class="small" id="chatCount">0 messages</div>
                    </div>

                    <div class="chat-preview" id="chatPreview" tabindex="0" aria-live="polite" aria-atomic="false" style="margin-top:8px;">
                        <!-- chat messages appended here -->
                    </div>

                    <div style="display:flex; gap:8px; margin-top:10px;">
                        <input id="chatInput" placeholder="Say something..." aria-label="Type a chat message" style="flex:1; padding:10px; border-radius:10px; background:transparent; border:1px solid rgba(255,255,255,0.04); color:var(--text);" />
                        <button class="btn-outline" id="btnSendChat">Send</button>
                    </div>
                </div>

                <div class="side-card" data-aos="fade-left">
                    <h4 style="margin:0 0 8px 0;">Metrics (Realtime)</h4>
                    <div style="display:flex; gap:12px; align-items:center; justify-content:space-between; margin-top:8px;">
                        <div style="text-align:center;">
                            <div style="font-weight:800; font-size:1.3rem;" id="metricViews">0</div>
                            <div class="small">Views</div>
                        </div>
                        <div style="text-align:center;">
                            <div style="font-weight:800; font-size:1.3rem;" id="metricLikes">0</div>
                            <div class="small">Likes</div>
                        </div>
                        <div style="text-align:center;">
                            <div style="font-weight:800; font-size:1.3rem;" id="metricChats">0</div>
                            <div class="small">Msgs</div>
                        </div>
                    </div>

                    <div style="margin-top:12px;">
                        <div style="font-weight:700;">Streaming Status</div>
                        <div class="small" id="streamStatus">Live • Stable</div>
                    </div>
                </div>
            </aside>
        </div>

    </div>
</section>

<!-- ============================
     Services / Packages / FAQ
     ============================ -->
<section class="section container" id="packages" aria-labelledby="packagesTitle">
    <h2 id="packagesTitle" style="margin:0 0 12px 0;" data-aos="fade-up">Services & Packages</h2>

    <div class="grid-3" data-aos="fade-up" data-aos-delay="80">
        <div class="service-card">
            <div class="service-icon" style="background:linear-gradient(90deg,var(--accent-1),var(--accent-3));">🎥</div>
            <h4 style="margin:6px 0;">Multi-Camera Production</h4>
            <p class="small" style="margin-top:6px;">4–8 camera setup including stage, side, audience and drone feeds. Onsite director and switcher.</p>
            <ul class="small" style="margin-top:10px; color:var(--muted);">
                <li>Live switching & lower-thirds</li>
                <li>ISO recordings for editing</li>
                <li>Instant replay & graphics</li>
            </ul>
        </div>

        <div class="service-card">
            <div class="service-icon" style="background:linear-gradient(90deg,var(--accent-2),var(--accent-3));">🔊</div>
            <h4 style="margin:6px 0;">Audio & Mixing</h4>
            <p class="small" style="margin-top:6px;">Multi-track audio capture, FOH integration and broadcast-ready mixes.</p>
            <ul class="small" style="margin-top:10px; color:var(--muted);">
                <li>Soundcheck & line monitoring</li>
                <li>Backup capture</li>
                <li>Post-event master</li>
            </ul>
        </div>

        <div class="service-card">
            <div class="service-icon" style="background:linear-gradient(90deg,var(--accent-3),var(--accent-1));">⚡</div>
            <h4 style="margin:6px 0;">Streaming & Delivery</h4>
            <p class="small" style="margin-top:6px;">RTMP/HLS to major platforms; private rooms; CDN delivery for recorded assets.</p>
            <ul class="small" style="margin-top:10px; color:var(--muted);">
                <li>Platform optimization</li>
                <li>Low-latency workflows</li>
                <li>Automatic VOD upload</li>
            </ul>
        </div>
    </div>

    <div class="pricing" data-aos="fade-up" data-aos-delay="120">
        <div class="price-card">
            <div style="font-weight:700;">Basic Live</div>
            <div class="price-large">Ksh 45,000</div>
            <div class="small" style="margin-top:8px; color:var(--muted);">Single camera, simple streaming to one platform. 2-hour coverage.</div>
        </div>
        <div class="price-card">
            <div style="font-weight:700;">Pro Live</div>
            <div class="price-large">Ksh 120,000</div>
            <div class="small" style="margin-top:8px; color:var(--muted);">3-camera multicam, switcher, on-site audio, 4-hour coverage.</div>
        </div>
        <div class="price-card">
            <div style="font-weight:700;">Premium</div>
            <div class="price-large">Ksh 260,000+</div>
            <div class="small" style="margin-top:8px; color:var(--muted);">6+ cameras, drone, graphics, VIP room, post production & social cuts.</div>
        </div>
    </div>

    <div class="section" data-aos="fade-up" data-aos-delay="160">
        <h3 style="margin:10px 0 8px 0;">Testimonials</h3>
        <div class="testimonials">
            <div class="testimonial">
                <strong>“Flawless stream and great multi-camera coverage. We couldn't be happier.”</strong>
                <div class="small" style="margin-top:8px; color:var(--muted);">— Festival Producer</div>
            </div>
            <div class="testimonial">
                <strong>“Professional, timely, and the recorded assets were delivered quickly.”</strong>
                <div class="small" style="margin-top:8px; color:var(--muted);">— Corporate Client</div>
            </div>
            <div class="testimonial">
                <strong>“The wedding stream was perfect; family overseas felt like they were there.”</strong>
                <div class="small" style="margin-top:8px; color:var(--muted);">— Bride</div>
            </div>
        </div>

        <div class="sponsors" aria-hidden="false">
            <div class="sponsor">SPONSOR A</div>
            <div class="sponsor">SPONSOR B</div>
            <div class="sponsor">MEDIA</div>
            <div class="sponsor">TECH</div>
        </div>
    </div>

    <div class="section" data-aos="fade-up" data-aos-delay="200">
        <h3 style="margin:10px 0;">Frequently Asked Questions</h3>

        <div class="faq-item">
            <div style="font-weight:700;">Can you stream to multiple platforms simultaneously?</div>
            <div class="small" style="color:var(--muted); margin-top:6px;">Yes — we use multi-destination encoding to push to YouTube, Facebook and private RTMP rooms in parallel.</div>
        </div>

        <div class="faq-item">
            <div style="font-weight:700;">What is the turnaround for edited footage?</div>
            <div class="small" style="color:var(--muted); margin-top:6px;">Basic VOD within 48–72 hours. Full edits and social cuts: 3–10 business days depending on package.</div>
        </div>

        <div class="faq-item">
            <div style="font-weight:700;">Do you provide on-site internet?</div>
            <div class="small" style="color:var(--muted); margin-top:6px;">Yes — bonded cellular backup and venue uplink coordination for broadcast events.</div>
        </div>
    </div>

    <div class="cta-footer" data-aos="fade-up" data-aos-delay="240">
        <div>
            <h3 style="margin:0;">Ready to Stream Your Event?</h3>
            <div class="small" style="margin-top:6px;">Contact us for packages, availability and custom workflows.</div>
        </div>

        <div style="display:flex; gap:8px; align-items:center;">
            <a href="{{ route('contact') }}" class="btn-primary">Contact Sales</a>
            <a href="{{ route('contact') }}" class="btn-outline">Request Quote</a>
        </div>
    </div>
</section>

<!-- ============================
     Inline Scripts (AOS + Swiper + Custom)
     ============================ -->
<script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    /* Immediately Init AOS */
    AOS.init({
        duration: 700,
        easing: 'ease-out-cubic',
        once: false,
        mirror: false
    });

    /* ---------------------------
       Swiper (angles) init
       --------------------------- */
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 3,
        spaceBetween: 12,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            320: {
                slidesPerView: 1.2
            },
            560: {
                slidesPerView: 2.2
            },
            900: {
                slidesPerView: 3.2
            }
        }
    });

    /* ---------------------------
       Live UI Simulation + Interactivity
       --------------------------- */
    (function() {
        'use strict';

        // helpers
        const $ = (s, r = document) => r.querySelector(s);
        const $$ = (s, r = document) => Array.from((r || document).querySelectorAll(s));
        const fmt = n => (typeof n === 'number') ? n.toLocaleString() : n;

        // state
        const state = {
            viewers: 1200 + Math.floor(Math.random() * 8600),
            likes: 200 + Math.floor(Math.random() * 1200),
            chats: 30 + Math.floor(Math.random() * 220),
            auto: true
        };

        // elements
        const ovViewCount = $('#ovViewCount');
        const ovLikeCount = $('#ovLikeCount');
        const viewerCount = $('#viewerCount');
        const miniView = $('#miniViewers');
        const metricViews = $('#metricViews');
        const metricLikes = $('#metricLikes');
        const metricChats = $('#metricChats');
        const chatPreview = $('#chatPreview');
        const chatCount = $('#chatCount');
        const btnSendChat = $('#btnSendChat');
        const chatInput = $('#chatInput');
        const likeBtns = $$('.reaction');
        const joinBtn = $('#btnJoinStream');
        const btnJoinStream = $('#btnJoinStream');
        const qualityBadge = $('#qualityBadge');
        const latencyBadge = $('#latencyBadge');
        const streamStatus = $('#streamStatus');
        const youtubeFrame = $('#youtubeLive');

        // fake chat pool
        const chatPool = [
            "🔥 That's a banger!", "Where's the VIP link?", "Sound is amazing", "Shoutout from Nakuru!", "Who is that guitarist?", "Love the lighting", "Best production I've seen", "Please show the drummer", "Wedding vibes", "This transition was awesome"
        ];
        const names = ["@FaithM", "@Kev254", "@Linda", "@DJTone", "@Milly", "@SamK", "@Njeri", "@Amina", "@Tony", "@Zoe", "@Peter", "@Lina"];

        // number anim
        function animateNumber(el, to, dur = 600) {
            const from = Number(el.textContent.replace(/,/g, '')) || 0;
            const start = performance.now();

            function step(now) {
                const t = Math.min(1, (now - start) / dur);
                const v = Math.floor(from + (to - from) * t);
                el.textContent = fmt(v);
                if (t < 1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
        }

        function refreshUI() {
            animateNumber(ovViewCount, state.viewers, 900);
            animateNumber(ovLikeCount, state.likes, 700);
            animateNumber(viewerCount, state.viewers, 900);
            animateNumber(miniView, state.viewers, 900);
            animateNumber(metricViews, state.viewers, 900);
            animateNumber(metricLikes, state.likes, 700);
            animateNumber(metricChats, state.chats, 700);
            chatCount.textContent = `${state.chats} messages`;
        }

        // seed
        ovViewCount.textContent = fmt(state.viewers);
        ovLikeCount.textContent = fmt(state.likes);
        viewerCount.textContent = fmt(state.viewers);
        miniView.textContent = fmt(state.viewers);
        metricViews.textContent = fmt(state.viewers);
        metricLikes.textContent = fmt(state.likes);
        metricChats.textContent = fmt(state.chats);
        chatCount.textContent = `${state.chats} messages`;

        // add chat message
        function addChat(user, text) {
            const node = document.createElement('div');
            node.className = 'chat-message';
            node.innerHTML = `<div class="chat-avatar" aria-hidden="true">${user.replace('@','').slice(0,2).toUpperCase()}</div><div><div class="chat-username">${user}</div><div class="chat-text">${escapeHtml(text)}</div><div class="chat-meta">${new Date().toLocaleTimeString()}</div></div>`;
            chatPreview.appendChild(node);
            // limit
            while (chatPreview.childElementCount > 120) chatPreview.removeChild(chatPreview.firstChild);
            chatPreview.scrollTop = chatPreview.scrollHeight;
        }

        function escapeHtml(s) {
            return String(s).replace(/[&<>"']/g, function(m) {
                return {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#39;'
                } [m];
            });
        }

        // seed few messages
        for (let i = 0; i < 6; i++) {
            const name = names[Math.floor(Math.random() * names.length)];
            const txt = chatPool[Math.floor(Math.random() * chatPool.length)];
            addChat(name, txt);
        }

        // simulate live changes
        setInterval(() => {
            if (!state.auto) return;
            const vdelta = Math.floor((Math.random() - 0.2) * 160);
            state.viewers = Math.max(0, state.viewers + vdelta);
            if (Math.random() < 0.6) state.likes += Math.floor(Math.random() * 6);
            if (Math.random() < 0.4) {
                const name = names[Math.floor(Math.random() * names.length)];
                const txt = chatPool[Math.floor(Math.random() * chatPool.length)];
                addChat(name, txt);
                state.chats++;
            }
            // occasional status jitter
            if (Math.random() < 0.06) {
                streamStatus.textContent = "Intermittent • Stabilizing";
                setTimeout(() => streamStatus.textContent = "Live • Stable", 2500);
            }
            refreshUI();
        }, 2200);

        // send chat
        btnSendChat.addEventListener('click', () => {
            const txt = chatInput.value.trim();
            if (!txt) return;
            addChat('@You', txt);
            chatInput.value = '';
            state.chats++;
            refreshUI();
        });
        chatInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                btnSendChat.click();
            }
        });

        // reaction clicks
        likeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const emoji = btn.dataset.emoji || '✨';
                // flying emoji
                const el = document.createElement('div');
                el.textContent = emoji;
                el.style.position = 'fixed';
                const r = btn.getBoundingClientRect();
                el.style.left = (r.left + r.width / 2) + 'px';
                el.style.top = (r.top + r.height / 2) + 'px';
                el.style.fontSize = '18px';
                el.style.zIndex = 9999;
                el.style.transition = 'transform 900ms cubic-bezier(.2,.9,.2,1), opacity 900ms ease';
                document.body.appendChild(el);
                requestAnimationFrame(() => {
                    el.style.transform = 'translateY(-180px) scale(1.6)';
                    el.style.opacity = '0';
                });
                setTimeout(() => document.body.removeChild(el), 1000);
                // bump stats
                state.likes += Math.floor(1 + Math.random() * 3);
                state.viewers += Math.floor(Math.random() * 3);
                refreshUI();
            });
        });

        // join stream toggle
        btnJoinStream.addEventListener('click', () => {
            const pressed = btnJoinStream.getAttribute('aria-pressed') === 'true';
            btnJoinStream.setAttribute('aria-pressed', (!pressed).toString());
            if (!pressed) {
                btnJoinStream.textContent = 'Joined';
                state.viewers++;
                addChat('@System', 'You joined the stream — welcome!');
            } else {
                btnJoinStream.textContent = 'Join';
                state.viewers = Math.max(0, state.viewers - 1);
            }
            refreshUI();
        });

        // angle thumbnail switching (replace main iframe with direct video only for demo)
        const angleThumbs = $$('.angle-thumb');

        function setActiveAngle(idx) {
            angleThumbs.forEach((t, i) => {
                t.classList.toggle('active', i === idx);
                t.setAttribute('aria-pressed', i === idx ? 'true' : 'false');
            });
            const target = angleThumbs[idx];
            if (!target) return;
            const src = target.dataset.src;
            // If using iframe (YouTube Live), better to offer a picture-in-picture or overlay — here we will show a brief overlay and then do nothing disruptive
            // For demo: show a small overlay "Switched to Stage A" — not swapping YouTube live.
            const note = document.createElement('div');
            note.textContent = `Switched to ${target.dataset.label}`;
            note.style.position = 'absolute';
            note.style.bottom = '18px';
            note.style.right = '18px';
            note.style.padding = '8px 12px';
            note.style.borderRadius = '10px';
            note.style.background = 'rgba(0,0,0,0.6)';
            note.style.zIndex = 9999;
            note.style.border = '1px solid rgba(255,255,255,0.03)';
            document.getElementById('mainPlayer').appendChild(note);
            setTimeout(() => {
                note.style.opacity = '0';
                setTimeout(() => {
                    if (note && note.parentNode) note.parentNode.removeChild(note);
                }, 420);
            }, 900);
        }
        angleThumbs.forEach((t, i) => {
            t.addEventListener('click', () => setActiveAngle(i));
            t.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    setActiveAngle(i);
                }
            });
        });

        // Swiper interaction: ensure clicking slide sets active style
        document.querySelectorAll('.swiper-slide').forEach((slide, idx) => {
            slide.addEventListener('click', () => {
                setActiveAngle(idx);
            });
        });

        // small periodic quality toggle
        setInterval(() => {
            const q = (Math.random() > 0.7) ? '720p' : ((Math.random() > 0.5) ? '1080p' : 'Auto');
            qualityBadge.textContent = q;
            latencyBadge.textContent = (Math.random() > 0.8) ? 'Low Latency' : 'Stable';
        }, 4200);

        // reduced motion handling
        if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            state.auto = false;
        }

        // expose state for debugging
        window._liveState = state;

        // initial refresh
        refreshUI();

    })(); // end IIFE
</script>

<!-- End of blade content -->
@endsection