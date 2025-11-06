@extends('layouts.app')

@section('title', 'Photography Training')

@section('content')
<!--
  Photography Training — Full Feature Blade View
  - Theme: Tech Blue Gradient (matches "Our Story & Mission")
  - Rich UI: hero canvas, video, gallery, lightbox, courses, instructors, testimonials, counters, FAQ, CTA
  - Responsive and accessible
  - Images from Unsplash (hotlinks) for demo purposes
-->

<style>
    /* ========= Base & Font ========= */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

    :root {
        --blue-900: #002bff;
        --blue-800: #0055ff;
        --blue-700: #0099ff;
        --accent: #00bfff;
        --muted: #6c7a93;
        --card: #0f1724;
        --glass: rgba(255, 255, 255, 0.03);
        --bg-light: #f8f9fc;
        --radius-lg: 14px;
        --radius-md: 10px;
        --shadow-lg: 0 18px 54px rgba(2, 6, 23, 0.55);
        --text: #eaf3ff;
        --text-dark: #071232;
    }

    html,
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, Arial;
        color: var(--text-dark);
        background: #ffffff;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Utility container */
    .container {
        width: 94%;
        max-width: 1320px;
        margin: 0 auto;
    }

    /* Generic headings */
    .h1,
    h1 {
        font-weight: 800;
        color: var(--text);
    }

    .h2,
    h2 {
        font-weight: 700;
        color: var(--text-dark);
    }

    /* ========= Hero (tech-blue gradient + canvas) ========= */
    .training-hero {
        position: relative;
        width: 100%;
        min-height: 56vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        color: #fff;
        background:
            linear-gradient(135deg, rgba(0, 31, 91, 0.85), rgba(0, 118, 255, 0.75), rgba(0, 198, 199, 0.65)),
            url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1600&q=80');
        background-size: cover, 400% 400%;
        background-position: center;
        background-repeat: no-repeat;
        animation: gradientShift 9s ease infinite;
    }

    /* Optional darker overlay for readability */
    .training-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 20, 40, 0.3);
        z-index: 1;
    }

    /* Ensure hero text stays above the overlay */
    .training-hero>* {
        position: relative;
        z-index: 2;
    }

    /* Smooth gradient animation */
    @keyframes gradientShift {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .training-hero .hero-inner {
        position: relative;
        z-index: 6;
        width: 92%;
        max-width: 1200px;
        display: grid;
        grid-template-columns: 1fr 480px;
        gap: 28px;
        align-items: center;
    }

    @media (max-width:992px) {
        .training-hero .hero-inner {
            grid-template-columns: 1fr;
            text-align: center;
        }
    }

    /* hero text */
    .hero-title {
        font-size: clamp(1.9rem, 3.8vw, 3.1rem);
        margin: 0 0 12px 0;
        line-height: 1.02;
        color: #fff;
        text-shadow: 0 10px 30px rgba(0, 0, 0, 0.28);
    }

    .hero-sub {
        color: rgba(255, 255, 255, 0.92);
        margin: 0 0 18px 0;
        line-height: 1.6;
        max-width: 48ch;
    }

    /* hero actions */
    .hero-actions {
        text-decoration: none !important;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    @media (max-width:992px) {
        .hero-actions {
            justify-content: center;
        }
    }

    .btn-primary-hero {
        background: linear-gradient(90deg, #00bfff, #0055ff);
        text-decoration: none !important;
        color: #fff;
        padding: 12px 22px;
        border-radius: 999px;
        border: none;
        font-weight: 700;
        box-shadow: 0 10px 30px rgba(0, 91, 255, 0.18);
        cursor: pointer;
    }

    .btn-outline-hero {
        background: transparent;
        text-decoration: none !important;
        color: #fff;
        padding: 10px 18px;
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        cursor: pointer;
    }

    /* hero right: video preview card */
    .hero-video-card {
        width: 100%;
        height: 320px;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255, 255, 255, 0.06);
        position: relative;
        background: #000;
    }

    .hero-video-card video,
    .hero-video-card iframe {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* subtle overlay elements */
    .hero-floating {
        position: absolute;
        inset: 0;
        z-index: 4;
        pointer-events: none;
    }

    .hero-live-badge {
        position: absolute;
        left: 28px;
        top: 28px;
        z-index: 7;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(90deg, #ff0033, #b30021);
        color: #fff;
        padding: 8px 14px;
        border-radius: 999px;
        font-weight: 700;
        box-shadow: 0 12px 40px rgba(255, 0, 51, 0.18);
        animation: badge-glow 1.6s ease-in-out infinite alternate;
    }

    @keyframes badge-glow {
        0% {
            box-shadow: 0 8px 24px rgba(255, 0, 51, 0.26);
        }

        100% {
            box-shadow: 0 18px 60px rgba(255, 0, 51, 0.46);
        }
    }

    /* tech-lines canvas sits below hero-inner */
    #training-tech-canvas {
        position: absolute;
        inset: 0;
        z-index: 3;
        opacity: 0.14;
    }

    /* ========= Page sections ========= */
    .section {
        padding: 54px 0;
    }

    .section.bg-light {
        background: var(--bg-light);
    }

    /* ========= Courses grid ========= */
    .courses-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    @media(max-width:1100px) {
        .courses-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width:700px) {
        .courses-grid {
            grid-template-columns: 1fr;
        }
    }

    .course-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 34px rgba(2, 6, 23, 0.06);
        transition: transform 260ms ease, box-shadow 260ms ease;
    }

    .course-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 22px 60px rgba(2, 6, 23, 0.12);
    }

    .course-thumb {
        width: 100%;
        height: 220px;
        object-fit: cover;
        display: block;
    }

    .course-body {
        padding: 18px;
    }

    .course-title {
        color: var(--blue-800);
        font-weight: 700;
        margin: 0 0 8px 0;
    }

    .course-desc {
        color: var(--muted);
        margin: 0 0 12px 0;
    }

    .course-price {
        font-weight: 600;
        font-size: 1.05rem;
        color: #007bff;
        background: linear-gradient(90deg, rgba(0, 123, 255, 0.1), rgba(0, 188, 212, 0.15));
        border-left: 4px solid #00bcd4;
        border-radius: 6px;
        padding: 6px 10px;
        margin: 10px 0 12px;
        display: inline-block;
        transition: background 0.3s ease;
    }

    .course-card:hover .course-price {
        background: linear-gradient(90deg, rgba(0, 188, 212, 0.2), rgba(0, 123, 255, 0.25));
    }

    /* badges for continuity */
    .badge-blue {
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        padding: 4px 10px;
        font-size: 0.8rem;
    }

    .badge-yellow {
        background-color: #ffc107;
        color: #212529;
        border-radius: 4px;
        padding: 4px 10px;
        font-size: 0.8rem;
    }

    /* badges */
    .badge {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 0.85rem;
        color: #fff;
    }

    .badge-yellow {
        background: linear-gradient(90deg, #ffc107, #ff9800);
    }

    .badge-blue {
        background: linear-gradient(90deg, #0055ff, #00bfff);
    }

    /* ========= Instructor ========= */
    .instructor {
        display: flex;
        gap: 20px;
        align-items: center;
        background: linear-gradient(90deg, rgba(0, 91, 255, 0.03), rgba(0, 191, 255, 0.02));
        padding: 22px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(2, 6, 23, 0.04);
    }

    .instructor-img {
        width: 160px;
        height: 160px;
        border-radius: 12px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .instructor-body h3 {
        margin: 0;
        color: var(--blue-900);
        font-weight: 800;
    }

    .instructor-body p {
        margin: 6px 0 0 0;
        color: var(--muted);
    }

    /* ========= Testimonials carousel ========= */
    .testimonials-wrap {
        position: relative;
    }

    .testimonials-track {
        display: flex;
        gap: 18px;
        overflow: hidden;
        padding: 10px;
    }

    .testimonial-card {
        min-width: 300px;
        max-width: 520px;
        background: #fff;
        border-radius: 12px;
        padding: 18px;
        box-shadow: 0 10px 30px rgba(2, 6, 23, 0.06);
    }

    .testimonial-quote {
        color: #213244;
        font-style: italic;
    }

    .carousel-controls {
        display: flex;
        gap: 8px;
        align-items: center;
        margin-top: 12px;
    }

    .btn-ghost {
        background: transparent;
        border: 1px solid rgba(2, 6, 23, 0.06);
        padding: 8px 10px;
        border-radius: 8px;
        cursor: pointer;
    }

    /* ========= Gallery & Lightbox ========= */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
    }

    @media(max-width:1100px) {
        .gallery-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media(max-width:720px) {
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
    }

    .gallery-item img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        display: block;
        transition: transform 320ms ease;
    }

    .gallery-item:hover img {
        transform: scale(1.06);
    }

    /* lightbox */
    .lightbox {
        position: fixed;
        inset: 0;
        display: none;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.85);
        z-index: 9999;
    }

    .lightbox.open {
        display: flex;
    }

    .lightbox-content {
        max-width: 1200px;
        width: 96%;
        max-height: 90%;
        position: relative;
    }

    .lightbox-content img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 8px;
    }

    .lightbox-close {
        position: absolute;
        right: 8px;
        top: 8px;
        background: rgba(255, 255, 255, 0.06);
        color: #fff;
        border: none;
        padding: 8px 10px;
        border-radius: 8px;
        cursor: pointer;
    }

    /* ========= Counters ========= */
    .counters {
        display: flex;
        gap: 20px;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .counter {
        background: #fff;
        padding: 18px;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(2, 6, 23, 0.04);
        flex: 1;
        text-align: center;
    }

    .counter .num {
        font-size: 2.2rem;
        color: var(--blue-800);
        font-weight: 800;
    }

    .counter .label {
        color: var(--muted);
        margin-top: 6px;
    }

    /* ========= FAQ ========= */
    .faq {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .accordion-item {
        background: #fff;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0 8px 22px rgba(2, 6, 23, 0.04);
    }

    .accordion-button {
        background: transparent;
        border: none;
        width: 100%;
        text-align: left;
        padding: 12px;
        font-weight: 700;
        color: var(--blue-900);
        cursor: pointer;
    }

    /* ========= Pricing ========= */
    :root {
        --blue: #0078ff;
        --teal: #00c6c7;
        --dark: #001f5b;
        --muted: #6c757d;
        --light-bg: #f8fafc;
        --white: #fff;
    }

    .pricing-title {
        text-align: center;
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 2.5rem;
    }

    .pricing-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
        gap: 1.8rem;
    }

    .price-card {
        position: relative;
        background: var(--white);
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        padding: 2rem;
        transition: all 0.3s ease;
        border-top: 5px solid transparent;
    }

    .price-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
    }

    .price-card h4 {
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 0.2rem;
    }

    .price-h {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--blue);
    }

    .price-features {
        list-style: none;
        padding: 0;
        margin: 1rem 0 1.5rem 0;
        color: var(--muted);
    }

    .price-features li {
        margin-bottom: 0.6rem;
        position: relative;
        padding-left: 1.2rem;
    }

    .price-features li::before {
        content: "✓";
        color: var(--teal);
        position: absolute;
        left: 0;
    }

    .price-card.popular {
        border-top-color: var(--teal);
        background: linear-gradient(135deg, #f0f9ff 0%, #e6fcff 100%);
    }

    .popular-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: linear-gradient(90deg, var(--blue), var(--teal));
        color: var(--white);
        font-weight: 600;
        padding: 6px 12px;
        font-size: 0.8rem;
        border-radius: 50px;
        z-index: 10;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-primary-hero,
    .btn-outline-hero {
        display: inline-block;
        text-align: center;
        font-weight: 600;
        border-radius: 50px;
        padding: 10px 22px;
        font-size: 0.95rem;
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-primary-hero {
        background: linear-gradient(90deg, var(--blue), var(--teal));
        color: var(--white);
    }

    .btn-primary-hero:hover {
        opacity: 0.9;
    }

    .btn-outline-hero {
        border: 2px solid var(--blue);
        color: var(--blue);
    }

    .btn-outline-hero:hover {
        background: var(--blue);
        color: var(--white);
    }

    @media (max-width: 768px) {
        .popular-badge {
            top: 10px;
            right: 10px;
            font-size: 0.7rem;
            padding: 4px 10px;
        }
    }

    .faq-section h2 {
        color: #001f5b;
        font-weight: 700;
    }

    .faq-grid {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 24px;
        align-items: start;
    }

    .faq-list .accordion-item {
        border: 1px solid rgba(0, 31, 91, 0.08);
        border-radius: 10px;
        margin-bottom: 12px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 31, 91, 0.04);
    }

    .accordion-button {
        width: 100%;
        background: linear-gradient(90deg, rgba(0, 123, 255, 0.08), rgba(0, 201, 183, 0.08));
        color: #001f5b;
        font-weight: 600;
        padding: 14px 16px;
        border: none;
        text-align: left;
        transition: all 0.3s ease;
    }

    .accordion-button:hover {
        background: linear-gradient(90deg, rgba(0, 201, 183, 0.15), rgba(0, 123, 255, 0.1));
    }

    .accordion-body {
        padding: 12px 18px;
        color: #555;
        background: #fff;
    }

    /* Sidebar */
    .faq-sidebar {
        background: #fff;
        padding: 22px 20px;
        border-radius: 12px;
        box-shadow: 0 8px 28px rgba(0, 31, 91, 0.05);
        position: sticky;
        top: 80px;
    }

    .faq-sidebar h3 {
        margin-top: 0;
        color: #001f5b;
        font-weight: 700;
    }

    .faq-sidebar p {
        color: #6c757d;
        font-size: 0.95rem;
    }

    .form-stack {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
    }

    .form-stack input,
    .form-stack select {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid rgba(2, 6, 23, 0.08);
        width: 100%;
    }

    .btn-primary {
        background: linear-gradient(90deg, #007bff, #00c9b7);
        color: #fff;
        border: none;
        padding: 10px 16px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #00c9b7, #007bff);
        transform: translateY(-2px);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .faq-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .faq-sidebar {
            position: relative;
            top: auto;
        }
    }

    @media (max-width: 576px) {
        .accordion-button {
            font-size: 0.95rem;
            padding: 12px 14px;
        }

        .faq-sidebar {
            padding: 18px;
        }

        .form-stack input,
        .form-stack select {
            font-size: 0.9rem;
        }
    }

    /* === Section Base === */
    #video {
        background: linear-gradient(180deg, #f8fbff 0%, #e6f5ff 100%);
    }

    /* === Video Wrapper === */
    .video-wrapper {
        position: relative;
    }

    .video-box {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 15px 45px rgba(0, 90, 150, 0.15);
        background: linear-gradient(135deg, #007bff, #00bcd4);
        transition: all 0.4s ease;
    }

    .video-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 22px 55px rgba(0, 120, 200, 0.25);
    }

    /* Iframe */
    .video-box iframe {
        width: 100%;
        height: 400px;
        display: block;
        border: none;
        border-radius: 16px;
    }

    /* Unmute Button */
    .video-unmute-btn {
        position: absolute;
        bottom: 16px;
        right: 16px;
        background: linear-gradient(90deg, #007bff, #00bcd4);
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 8px;
        padding: 10px 16px;
        cursor: pointer;
        box-shadow: 0 6px 20px rgba(0, 123, 255, 0.3);
        transition: all 0.3s ease;
        z-index: 10;
    }

    .video-unmute-btn:hover {
        background: linear-gradient(90deg, #0069d9, #0097a7);
        transform: translateY(-2px);
    }

    /* === Video Actions === */
    .video-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .video-actions a {
        text-decoration: none;
    }

    /* === Counters Panel === */
    .stats-panel {
        background: #fff;
        border-radius: 16px;
        padding: 24px 28px;
        box-shadow: 0 12px 35px rgba(0, 60, 100, 0.05);
        transition: all 0.3s ease;
    }

    .stats-panel:hover {
        box-shadow: 0 18px 45px rgba(0, 90, 150, 0.1);
    }

    .counters {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 20px;
    }

    .counter-item {
        text-align: center;
    }

    .counter-num {
        font-size: 2.5rem;
        font-weight: 800;
        color: #007bff;
        margin-bottom: 6px;
        transition: all 0.4s ease;
    }

    .counter-label {
        color: #555;
        font-weight: 600;
        letter-spacing: 0.4px;
    }

    /* === Responsive === */
    @media (max-width: 992px) {
        .video-box iframe {
            height: 340px;
        }

        .stats-panel {
            margin-top: 28px;
        }
    }

    @media (max-width: 768px) {
        .video-box iframe {
            height: 300px;
        }

        .video-unmute-btn {
            bottom: 12px;
            right: 12px;
            font-size: 14px;
            padding: 8px 12px;
        }

        .counter-num {
            font-size: 2rem;
        }
    }

    @media (max-width: 576px) {
        .video-box iframe {
            height: 240px;
        }

        .stats-panel {
            padding: 18px;
        }

        .counters {
            grid-template-columns: 1fr;
        }

        .video-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .video-actions a {
            text-align: center;
            width: 100%;
        }
    }


    /* ========= CTA Footer ========= */
    .cta-footer {
        margin-top: 40px;
        border-radius: 12px;
        padding: 20px;
        display: flex;
        gap: 12px;
        align-items: center;
        justify-content: space-between;
        background: linear-gradient(90deg, rgba(0, 85, 255, 0.08), rgba(0, 191, 255, 0.03));
        border: 1px solid rgba(0, 91, 255, 0.12);
        flex-wrap: wrap;
    }

    .cta-footer h3 {
        margin: 0;
        color: var(--blue-900);
    }

    .cta-footer p {
        margin: 4px 0 0 0;
        color: var(--muted);
    }

    .cta-footer .cta-actions {
        display: flex;
        gap: 10px;
    }

    /* ========= Footer small fixes ========= */
    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    /* focus styles */
    :focus {
        outline: 3px solid rgba(0, 91, 255, 0.12);
        outline-offset: 3px;
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation: none !important;
            transition: none !important;
        }
    }
</style>

<!-- ================= HERO ================= -->
<section class="training-hero" aria-label="Training hero">
    <canvas id="training-tech-canvas" aria-hidden="true"></canvas>

    <div class="hero-floating" aria-hidden="true">
        <!-- decorative animated shapes can be added here -->
    </div>

    <div class="hero-inner container">
        <!-- left: text -->
        <div class="hero-left">
            <div style="max-width:620px;">
                <h1 class="hero-title">Photography Training — Unimax Academy</h1>
                <p class="hero-sub">Hands-on, industry-led training for photographers at every level. Practical assignments, mentorship, and a portfolio that gets results.</p>

                <div class="hero-actions">
                    <a href="#courses" class="btn-primary-hero">View Courses</a>
                    <a href="#video" class="btn-outline-hero">Watch Preview</a>
                    <a href="#contact" class="btn-outline-hero" style="border-color: rgba(255,255,255,0.22);">Contact Us</a>
                </div>

                <div style="margin-top:16px;">
                    <span class="badge badge-blue">Certification</span>
                    <span class="badge badge-yellow" style="margin-left:8px;">Limited Seats</span>
                </div>
            </div>
        </div>

        <!-- right: image preview -->
        <div class="hero-right">
            <div class="hero-image-card" role="region" aria-label="Training preview image">
                <!-- Responsive preview image -->
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop" alt="Photography Training Preview" class="hero-preview-img">
            </div>
        </div>

    </div>
</section>

<!-- ================= COURSES ================= -->
<section id="courses" class="section bg-light" aria-labelledby="coursesTitle">
    <div class="container">
        <div class="text-center mb-4">
            <h2 id="coursesTitle" class="h2" style="color:#001f5b;">Our Course Catalog</h2>
            <p class="text-muted" style="max-width:780px; margin:8px auto 0;">From camera fundamentals to advanced studio lighting, each course is structured to deliver measurable skill gains and portfolio pieces.</p>
        </div>

        <div class="courses-grid" style="margin-top:22px;">
            <!-- Course 1 -->
            <article class="course-card" role="article" aria-labelledby="course1Title">
                <img class="course-thumb" src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200&auto=format&fit=crop" alt="Beginner course">
                <div class="course-body">
                    <h3 id="course1Title" class="course-title">Beginner Photography</h3>
                    <p class="course-desc">Hands-on fundamentals covering camera handling, exposure triangle, composition, and basic retouching.</p>

                    <div class="course-price">KES 8,500</div>

                    <div style="display:flex; gap:8px; align-items:center;">
                        <span class="badge badge-blue">6 weeks</span>
                        <span class="badge badge-yellow">Intro</span>
                    </div>
                </div>
            </article>

            <!-- Course 2 -->
            <article class="course-card" role="article" aria-labelledby="course2Title">
                <img class="course-thumb" src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=1200&auto=format&fit=crop" alt="Portrait course">
                <div class="course-body">
                    <h3 id="course2Title" class="course-title">Portrait & Lighting</h3>
                    <p class="course-desc">Studio setups, modifiers, posing and working with models to craft editorial-quality portraits.</p>

                    <div class="course-price">KES 12,000</div>

                    <div style="display:flex; gap:8px; align-items:center;">
                        <span class="badge badge-blue">8 weeks</span>
                        <span class="badge badge-yellow">Hands-on</span>
                    </div>
                </div>
            </article>

            <!-- Course 3 -->
            <article class="course-card" role="article" aria-labelledby="course3Title">
                <img class="course-thumb" src="https://images.unsplash.com/photo-1495567720989-cebdbdd97913?q=80&w=1200&auto=format&fit=crop" alt="Editing course">
                <div class="course-body">
                    <h3 id="course3Title" class="course-title">Editing & Retouch</h3>
                    <p class="course-desc">Advanced post-production techniques in Lightroom and Photoshop for professional color and retouching.</p>

                    <div class="course-price">KES 9,000</div>

                    <div style="display:flex; gap:8px; align-items:center;">
                        <span class="badge badge-blue">4 weeks</span>
                        <span class="badge badge-yellow">Advanced</span>
                    </div>
                </div>
            </article>

            <!-- Course 4 -->
            <article class="course-card" role="article" aria-labelledby="course4Title">
                <img class="course-thumb" src="https://images.unsplash.com/photo-1484324328920-33b82f3b8d3b?q=80&w=1200&auto=format&fit=crop" alt="Outdoor course">
                <div class="course-body">
                    <h3 id="course4Title" class="course-title">Outdoor & Event Shoots</h3>
                    <p class="course-desc">Capture dynamic moments: events, weddings and outdoor portraits — speed, adaptation and consistency.</p>

                    <div class="course-price">KES 10,500</div>

                    <div style="display:flex; gap:8px; align-items:center;">
                        <span class="badge badge-blue">5 weeks</span>
                        <span class="badge badge-yellow">Practical</span>
                    </div>
                </div>
            </article>

            <!-- Course 5 -->
            <article class="course-card" role="article" aria-labelledby="course5Title">
                <img class="course-thumb" src="https://images.unsplash.com/photo-1504198453319-5ce911bafcde?q=80&w=1200&auto=format&fit=crop" alt="Commercial course">
                <div class="course-body">
                    <h3 id="course5Title" class="course-title">Commercial & Brand Shoots</h3>
                    <p class="course-desc">Learn client workflows, briefs, lighting recipes for products, and client-delivery pipelines.</p>

                    <div class="course-price">KES 14,000</div>

                    <div style="display:flex; gap:8px; align-items:center;">
                        <span class="badge badge-blue">6 weeks</span>
                        <span class="badge badge-yellow">Portfolio</span>
                    </div>
                </div>
            </article>

            <!-- Course 6 -->
            <article class="course-card" role="article" aria-labelledby="course6Title">
                <img class="course-thumb" src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=1200&auto=format&fit=crop" alt="Drone course">
                <div class="course-body">
                    <h3 id="course6Title" class="course-title">Aerial & Drone Imagery</h3>
                    <p class="course-desc">Legal, safety and cinematic aerial movement techniques for dynamic storytelling from above.</p>

                    <div class="course-price">KES 11,000</div>

                    <div style="display:flex; gap:8px; align-items:center;">
                        <span class="badge badge-blue">3 weeks</span>
                        <span class="badge badge-yellow">Specialist</span>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>


<!-- ================= INSTRUCTOR ================= -->
<section class="section bg-light">
    <div class="container">
        <div class="instructor" role="region" aria-labelledby="instructorTitle"
            style="display:flex; align-items:center; flex-wrap:wrap; gap:40px; padding:40px 20px; border-radius:16px; background:#ffffff; box-shadow:0 8px 28px rgba(0,0,0,0.08); transition: all 0.4s ease;">

            <!-- Instructor Image -->
            <div style="flex:1 1 380px; text-align:center;">
                <img class="instructor-img"
                    src="https://images.unsplash.com/photo-1531123414780-f20b5b1a0b97?q=80&w=800&auto=format&fit=crop"
                    alt="Lead Instructor"
                    style="width:100%; max-width:360px; border-radius:16px; box-shadow:0 6px 20px rgba(0,0,0,0.15); transition:transform 0.4s ease;">
            </div>

            <!-- Instructor Details -->
            <div class="instructor-body" style="flex:1 1 460px;">
                <h3 id="instructorTitle" style="font-size:1.8rem; font-weight:700; margin-bottom:14px; color:#222;">John Muthoga — Lead Instructor</h3>
                <p style="font-size:1.05rem; line-height:1.7; color:#555;">John is a multi-award-winning photographer with over a decade of commercial and editorial experience. He leads hands-on workshops, creative direction, and portfolio reviews to prepare you for paid assignments and creative excellence.</p>

                <div style="margin-top:18px; display:flex; gap:14px; flex-wrap:wrap;">
                    <a href="#contact" class="btn-primary-hero" style="padding:10px 20px; font-size:1rem; text-decoration:none;">Book Mentorship</a>
                    <a href="#courses" class="btn-outline-hero" style="padding:10px 18px; font-size:1rem; text-decoration:none;">See Courses</a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ================= VIDEO + COUNTERS ================= -->
<section id="video" class="section bg-light">
    <div class="container py-5">
        <div class="row align-items-center g-4">
            <!-- Video Column -->
            <div class="col-lg-7 col-md-12">
                <div class="video-wrapper" data-aos="fade-right">
                    <div class="video-box">
                        <iframe
                            id="trainingVideo"
                            src="https://www.youtube.com/embed/PGIalZd9WPs?autoplay=1&mute=1&rel=0&modestbranding=1&playsinline=1"
                            title="Training Intro"
                            frameborder="0"
                            allow="autoplay; encrypted-media; picture-in-picture"
                            allowfullscreen>
                        </iframe>

                        <!-- Unmute Button -->
                        <button id="unmuteVideo" class="video-unmute-btn" aria-pressed="false" aria-label="Unmute training video">
                            🔊 Tap to Unmute
                        </button>
                    </div>

                    <div class="video-actions mt-3">
                        <a href="#contact" class="btn-primary-hero">Enroll Now</a>
                        <a href="#courses" class="btn-outline-hero">View Courses</a>
                    </div>
                </div>
            </div>

            <!-- Counters Column -->
            <div class="col-lg-5 col-md-12">
                <div class="stats-panel" data-aos="fade-left">
                    <h3 class="text-primary fw-bold mb-4">Our Impact in Numbers</h3>
                    <div class="counters">
                        <div class="counter-item">
                            <div class="counter-num" data-target="500">0</div>
                            <div class="counter-label">Students Trained</div>
                        </div>
                        <div class="counter-item">
                            <div class="counter-num" data-target="120">0</div>
                            <div class="counter-label">Workshops Completed</div>
                        </div>
                        <div class="counter-item">
                            <div class="counter-num" data-target="45">0</div>
                            <div class="counter-label">Certified Instructors</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ================= GALLERY ================= -->
<section class="section bg-light" aria-labelledby="galleryTitle">
    <div class="container">
        <div class="text-center mb-4">
            <h2 id="galleryTitle" style="color:#001f5b;">Student Work — Gallery</h2>
            <p class="text-muted" style="max-width:760px; margin:8px auto 0;">Examples of student assignments and instructor edits. Click to enlarge.</p>
        </div>

        <div class="gallery-grid" style="margin-top:20px;">
            <div class="gallery-item" tabindex="0" data-full="https://images.unsplash.com/photo-1504198453319-5ce911bafcde?q=80&w=1600&auto=format&fit=crop">
                <img src="https://images.unsplash.com/photo-1504198453319-5ce911bafcde?q=80&w=800&auto=format&fit=crop" alt="Gallery 1">
            </div>
            <div class="gallery-item" tabindex="0" data-full="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?q=80&w=1600&auto=format&fit=crop">
                <img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?q=80&w=800&auto=format&fit=crop" alt="Gallery 2">
            </div>
            <div class="gallery-item" tabindex="0" data-full="https://images.unsplash.com/photo-1534126511673-b6899657816a?q=80&w=1600&auto=format&fit=crop">
                <img src="https://images.unsplash.com/photo-1534126511673-b6899657816a?q=80&w=800&auto=format&fit=crop" alt="Gallery 3">
            </div>
            <div class="gallery-item" tabindex="0" data-full="https://images.unsplash.com/photo-1554048612-b6a482bc67b2?q=80&w=1600&auto=format&fit=crop">
                <img src="https://images.unsplash.com/photo-1554048612-b6a482bc67b2?q=80&w=800&auto=format&fit=crop" alt="Gallery 4">
            </div>
            <div class="gallery-item" tabindex="0" data-full="https://images.unsplash.com/photo-1495567720989-cebdbdd97913?q=80&w=1600&auto=format&fit=crop">
                <img src="https://images.unsplash.com/photo-1495567720989-cebdbdd97913?q=80&w=800&auto=format&fit=crop" alt="Gallery 5">
            </div>
            <div class="gallery-item" tabindex="0" data-full="https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=1600&auto=format&fit=crop">
                <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=800&auto=format&fit=crop" alt="Gallery 6">
            </div>
            <div class="gallery-item" tabindex="0" data-full="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1600&auto=format&fit=crop">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop" alt="Gallery 7">
            </div>
            <div class="gallery-item" tabindex="0" data-full="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=1600&auto=format&fit=crop">
                <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=800&auto=format&fit=crop" alt="Gallery 8">
            </div>
        </div>

        <!-- Lightbox -->
        <div id="lightbox" class="lightbox" role="dialog" aria-modal="true" aria-hidden="true">
            <div class="lightbox-content" role="document">
                <button id="lightboxClose" class="lightbox-close" aria-label="Close image">✕</button>
                <img id="lightboxImage" src="" alt="Expanded image">
            </div>
        </div>
    </div>
</section>

<!-- ================= FAQ & Side ================= -->
<section class="section">
    <div class="container faq-section">
        <div class="faq-grid">
            <!-- FAQ Column -->
            <div class="faq-left">
                <h2>Frequently Asked Questions</h2>

                <div class="faq-list mt-3">
                    <div class="accordion-item">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                            What equipment do I need to start?
                        </button>
                        <div id="faq1" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                A basic DSLR or mirrorless camera, one lens (50mm or 24–70), and a willingness to learn are enough to begin.
                                We provide gear for practical lessons when necessary.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Do you offer certification?
                        </button>
                        <div id="faq2" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Yes — successful completion of core modules leads to an Unimax Academy certificate and portfolio review.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Can I pay in instalments?
                        </button>
                        <div id="faq3" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                We offer flexible payment plans for many courses — contact our support team for options and eligibility.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="faq-sidebar">
                <h3>Need help selecting a course?</h3>
                <p>Tell us your skill level and goals, and we'll recommend the best pathway.</p>

                <form id="interestForm" action="{{ route('contact') }}" method="POST" aria-label="Interest form">
                    @csrf
                    <div class="form-stack">
                        <input type="text" name="name" placeholder="Your name" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <select name="level">
                            <option value="">Skill level</option>
                            <option>Beginner</option>
                            <option>Intermediate</option>
                            <option>Advanced</option>
                        </select>
                        <button type="submit" class="btn-primary w-100">Request Advice</button>
                    </div>
                </form>
            </aside>
        </div>
    </div>
</section>

<!-- ================= PRICING ================= -->
<section class="section bg-light" style="padding:80px 0;">
    <div class="container">
        <h2 class="pricing-title">Pricing & Packages</h2>
        <div class="pricing-grid">

            <!-- Starter -->
            <div class="price-card" data-aos="fade-up">
                <div class="price-header">
                    <div>
                        <h4>Starter</h4>
                        <p class="text-muted">Perfect for beginners</p>
                    </div>
                    <div class="price-h">Ksh 25,000</div>
                </div>
                <ul class="price-features">
                    <li>6-week core course</li>
                    <li>2 practical shoots</li>
                    <li>Certificate</li>
                </ul>
                <a href="#enroll" class="btn-outline-hero">Get Started</a>
            </div>

            <!-- Pro (Most Popular) -->
            <div class="price-card popular" data-aos="fade-up" data-aos-delay="100">
                <div class="popular-badge">Most Popular</div>
                <div class="price-header">
                    <div>
                        <h4>Pro</h4>
                        <p class="text-muted">For aspiring professionals</p>
                    </div>
                    <div class="price-h">Ksh 85,000</div>
                </div>
                <ul class="price-features">
                    <li>8-week intensive</li>
                    <li>Studio & location shoots</li>
                    <li>Portfolio review</li>
                </ul>
                <a href="#enroll" class="btn-primary-hero">Enroll Now</a>
            </div>

            <!-- Premium -->
            <div class="price-card" data-aos="fade-up" data-aos-delay="200">
                <div class="price-header">
                    <div>
                        <h4>Premium</h4>
                        <p class="text-muted">Enterprise & brand team training</p>
                    </div>
                    <div class="price-h">Ksh 260,000+</div>
                </div>
                <ul class="price-features">
                    <li>Custom syllabus</li>
                    <li>Onsite training & consulting</li>
                    <li>Social media cuts</li>
                </ul>
                <a href="#contact" class="btn-outline-hero">Contact Us</a>
            </div>

        </div>
    </div>
</section>



<!-- ================= CTA FOOTER ================= -->
<section id="contact" class="section">
    <div class="container">
        <div class="cta-footer" role="region" aria-labelledby="ctaTitle" data-aos="fade-up">
            <div>
                <h3 id="ctaTitle">Ready to Train with Unimax?</h3>
                <p>Reserve your seat, talk to an advisor, or request a custom training plan for your team.</p>
            </div>

            <div class="cta-actions">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Contact Sales</a>
                <a href="{{ route('contact') }}" class="btn-outline-hero">Request Quote</a>
            </div>
        </div>
    </div>
</section>

<!-- ================= LIGHTBOX + SCRIPTS ================= -->
<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- AOS CDN -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    /* ---------- Canvas Tech Lines (hero) ---------- */
    (function() {
        const canvas = document.getElementById('training-tech-canvas');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        let W = canvas.width = window.innerWidth;
        let H = canvas.height = document.querySelector('.training-hero').offsetHeight;
        const POINTS = 48;
        let points = [];

        function initPoints() {
            points = Array.from({
                length: POINTS
            }, () => ({
                x: Math.random() * W,
                y: Math.random() * H,
                vx: (Math.random() - 0.5) * 0.6,
                vy: (Math.random() - 0.5) * 0.6
            }));
        }

        function resize() {
            W = canvas.width = window.innerWidth;
            H = canvas.height = document.querySelector('.training-hero').offsetHeight;
            initPoints();
        }

        function draw() {
            ctx.clearRect(0, 0, W, H);
            ctx.fillStyle = 'rgba(255,255,255,0.9)';
            points.forEach(p => {
                p.x += p.vx;
                p.y += p.vy;
                if (p.x < 0 || p.x > W) p.vx *= -1;
                if (p.y < 0 || p.y > H) p.vy *= -1;
                ctx.beginPath();
                ctx.arc(p.x, p.y, 1.5, 0, Math.PI * 2);
                ctx.fill();
            });
            ctx.strokeStyle = 'rgba(255,255,255,0.12)';
            ctx.lineWidth = 1;
            for (let i = 0; i < POINTS; i++) {
                for (let j = i + 1; j < POINTS; j++) {
                    const dx = points[i].x - points[j].x;
                    const dy = points[i].y - points[j].y;
                    const d = Math.sqrt(dx * dx + dy * dy);
                    if (d < 110) {
                        ctx.globalAlpha = 1 - (d / 110);
                        ctx.beginPath();
                        ctx.moveTo(points[i].x, points[i].y);
                        ctx.lineTo(points[j].x, points[j].y);
                        ctx.stroke();
                    }
                }
            }
            ctx.globalAlpha = 1;
            requestAnimationFrame(draw);
        }
        window.addEventListener('resize', resize);
        resize();
        draw();
    })();

    /* ---------- Counters (on scroll) ---------- */
    (function() {
        const nums = document.querySelectorAll('.num');
        let started = false;

        function animate() {
            nums.forEach(el => {
                const target = +el.getAttribute('data-target') || 0;
                const start = +el.textContent || 0;
                const dur = 1200;
                const t0 = performance.now();

                function step(ts) {
                    const p = Math.min(1, (ts - t0) / dur);
                    el.textContent = Math.floor(start + (target - start) * p).toLocaleString();
                    if (p < 1) requestAnimationFrame(step);
                    else el.textContent = target.toLocaleString();
                }
                requestAnimationFrame(step);
            });
        }

        function onScroll() {
            if (started) return;
            const el = document.querySelector('.counters');
            if (!el) return;
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) {
                started = true;
                animate();
                window.removeEventListener('scroll', onScroll);
            }
        }
        window.addEventListener('scroll', onScroll);
        setTimeout(onScroll, 300);
    })();


    /* ---------- Gallery lightbox ---------- */
    (function() {
        const items = Array.from(document.querySelectorAll('.gallery-item'));
        const lightbox = document.getElementById('lightbox');
        const lbImg = document.getElementById('lightboxImage');
        const lbClose = document.getElementById('lightboxClose');

        function open(src, alt) {
            lbImg.src = src;
            lbImg.alt = alt || 'Image';
            lightbox.classList.add('open');
            lightbox.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
            lbClose.focus();
        }

        function close() {
            lightbox.classList.remove('open');
            lightbox.setAttribute('aria-hidden', 'true');
            lbImg.src = '';
            document.body.style.overflow = '';
        }

        items.forEach(it => {
            it.addEventListener('click', () => open(it.dataset.full, it.querySelector('img').alt));
            it.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    open(it.dataset.full);
                }
            });
        });
        lbClose.addEventListener('click', close);
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) close();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') close();
        });
    })();

    /* ---------- Accordion toggle for FAQ ---------- */
    (function() {
        const toggles = Array.from(document.querySelectorAll('[data-toggle="collapse"]'));
        toggles.forEach(btn => {
            const target = document.querySelector(btn.dataset.target);
            btn.addEventListener('click', (e) => {
                const expanded = btn.getAttribute('aria-expanded') === 'true';
                btn.setAttribute('aria-expanded', String(!expanded));
                if (target) {
                    if (expanded) target.style.display = 'none';
                    else target.style.display = 'block';
                }
            });
            // initialize collapsed
            const targetInit = document.querySelector(btn.dataset.target);
            if (targetInit && btn.classList.contains('collapsed')) targetInit.style.display = 'none';
        });
    })();

    /* ---------- Unmute video logic (autoplay policy compliant) ---------- */
    (function() {
        const unmuteBtn = document.getElementById('unmuteVideo');
        if (!unmuteBtn) return;
        unmuteBtn.addEventListener('click', () => {
            const iframe = document.getElementById('trainingVideo');
            if (!iframe) return;
            // swap mute=1 to mute=0 to unmute (reload permitted due to user gesture)
            iframe.src = iframe.src.replace('mute=1', 'mute=0');
            unmuteBtn.style.display = 'none';
        });
        // hero video unmute
        const unmuteHero = document.getElementById('unmuteHeroBtn');
        if (unmuteHero) {
            unmuteHero.addEventListener('click', () => {
                const iframe = document.getElementById('heroVideo');
                if (!iframe) return;
                iframe.src = iframe.src.replace('mute=1', 'mute=0');
                unmuteHero.style.display = 'none';
            });
        }
    })();

    /* ---------- Small enhancements: form submission (no AJAX) ---------- */
    (function() {
        const form = document.getElementById('interestForm');
        if (!form) return;
        form.addEventListener('submit', (e) => {
            // allow default submission to server-side route; optionally show small UI
            const btn = form.querySelector('button[type="submit"]');
            if (btn) {
                btn.textContent = 'Sending...';
                btn.disabled = true;
            }
        });
    })();

    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".counter-num");
        const speed = 200;
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute("data-target");
                const count = +counter.innerText;
                const increment = target / speed;
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });

        // Unmute button logic
        document.getElementById('unmuteVideo').addEventListener('click', function() {
            const iframe = document.getElementById('trainingVideo');
            iframe.src = iframe.src.replace('mute=1', 'mute=0');
            this.style.display = 'none';
        });
    });
</script>

@endsection