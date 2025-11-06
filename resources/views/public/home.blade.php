@extends('layouts.app')

@section('title', 'Home - Unimax Photography')

@section('content')


<style>
    /* === Hero Section === */
    .hero {
        position: relative;
        margin-top: 0 !important;
        padding-top: 0 !important;
        height: 79vh;
        background: url('https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&w=1920&auto=format&fit=crop') center center/cover no-repeat;
        display: flex;
        align-items: center;
        color: white;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
        z-index: 1;
    }

    .hero .container {
        position: relative;
        z-index: 2;
    }

    .hero-content {
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(3px);
        border-radius: 12px;
        position: relative;
    }

    .hero-content h1 {
        font-size: 2.6rem;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 25px;
    }

    .highlighted-text {
        color: #0d6efd;
        display: inline-block;
        position: relative;
        padding: 0 10px;
    }

    /* === Animated Underline === */
    .underline {
        position: absolute;
        bottom: -10px;
        left: 0;
        animation: drawLine 3s ease-in-out infinite;
    }

    .underline line {
        animation: drawLineStroke 3s ease-in-out infinite;
    }

    @keyframes drawLineStroke {
        0% {
            stroke-dashoffset: 160;
            opacity: 0;
        }

        10% {
            opacity: 1;
        }

        50% {
            stroke-dashoffset: 0;
            opacity: 1;
        }

        80% {
            opacity: 1;
        }

        100% {
            stroke-dashoffset: 160;
            opacity: 0;
        }
    }

    /* === YouTube Pulsating Button (Fixed) === */
    .youtube-btn {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: red;
        color: #fff;
        text-decoration: none;
        position: relative;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
        overflow: visible;
        transition: transform 0.3s ease;
    }

    .youtube-btn:hover {
        transform: scale(1.1);
    }

    .play-icon {
        font-size: 26px;
        position: relative;
        z-index: 3;
        margin-left: 3px;
        pointer-events: none;
        /* ensures clicks go to the anchor */
    }

    /* Pulse ring now behind icon and clickable */
    .pulse-ring {
        position: absolute;
        inset: 0;
        border-radius: 50%;
        background: rgba(255, 0, 0, 0.45);
        z-index: 1;
        animation: pulseBeat 1.5s infinite ease-in-out;
        pointer-events: none;
    }

    @keyframes pulseBeat {
        0% {
            transform: scale(1);
            opacity: 0.9;
        }

        50% {
            transform: scale(1.4);
            opacity: 0.4;
        }

        100% {
            transform: scale(1);
            opacity: 0.9;
        }
    }

    /* === Slideshow === */
    .hero-right {
        min-height: 420px;
        border-radius: 15px;
    }

    .hero-slide {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .hero-slide.active {
        opacity: 1;
    }

    .hero-slide:nth-child(1) {
        animation: slideShow 15s infinite;
        animation-delay: 0s;
    }

    .hero-slide:nth-child(2) {
        animation: slideShow 15s infinite;
        animation-delay: 5s;
    }

    .hero-slide:nth-child(3) {
        animation: slideShow 15s infinite;
        animation-delay: 10s;
    }

    @keyframes slideShow {

        0%,
        33% {
            opacity: 1;
        }

        33.1%,
        100% {
            opacity: 0;
        }
    }

    /* === Responsive === */
    @media (max-width: 992px) {
        .hero {
            height: auto;
            padding: 60px 0;
        }

        .hero-content {
            text-align: center;
            padding: 40px 25px;
        }

        .highlighted-text::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: #0d6efd;
            margin: 4px auto 0;
            border-radius: 2px;
            animation: drawLineStroke 3s ease-in-out infinite;
        }

        .underline {
            display: none;
        }

        .hero-content h1 {
            font-size: 2rem;
        }
    }
</style>

<!-- === Split Hero Section with Animated Underline & Working YouTube Button === -->
<div class="hero d-flex align-items-center">
    <div class="hero-overlay"></div>

    <div class="container py-4">
        <div class="row align-items-stretch g-4">
            <!-- Left Content -->
            <div class="col-lg-6 col-md-12 order-1 order-md-1">
                <div class="hero-content text-white p-5 h-100 rounded shadow-lg position-relative">
                    <h1>
                        Capture Timeless Moments with
                        <span class="highlighted-text position-relative">
                            Unimax
                            <!-- Animated Underline -->
                            <svg class="underline" width="160" height="20" viewBox="0 0 160 20" xmlns="http://www.w3.org/2000/svg">
                                <line x1="0" y1="15" x2="160" y2="15" stroke="#0d6efd" stroke-width="4"
                                    stroke-linecap="round"
                                    stroke-dasharray="160"
                                    stroke-dashoffset="160" />
                            </svg>
                        </span>
                        Photography
                    </h1>

                    <p>We turn your memories into stunning visual stories — weddings, corporate shoots, fashion, aerial coverage, and more.</p>

                    <div class="mt-4 d-flex flex-wrap align-items-center gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-primary me-2 mb-2">Book Now!</a>

                        <!-- YouTube Button -->
                        <a href="https://www.youtube.com/@yourchannel"
                            target="_blank"
                            class="youtube-btn position-relative d-inline-flex align-items-center justify-content-center mb-2 ms-5">
                            <div class="pulse-ring"></div>
                            <i class="play-icon">&#9658;</i>
                        </a>

                    </div>
                </div>
            </div>

            <!-- Right Slideshow -->
            <div class="col-lg-6 col-md-12 order-2 order-md-2">
                <div class="hero-right position-relative rounded shadow-lg overflow-hidden h-100">
                    <div class="hero-slide active"
                        style="background-image: url('https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=1200&auto=format&fit=crop');"></div>
                    <div class="hero-slide"
                        style="background-image: url('https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?q=80&w=1200&auto=format&fit=crop');"></div>
                    <div class="hero-slide"
                        style="background-image: url('https://images.unsplash.com/photo-1508615070457-7baeba4003ab?q=80&w=1200&auto=format&fit=crop');"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection