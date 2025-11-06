@extends('layouts.app')

@section('title', 'Radio Hosts & Advertising')

<!-- External Libraries -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@0.2.38/dist/lenis.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/others/radio.css') }}">
@endpush

@section('content')
<!-- HERO -->
<section class="hero-section"
    style="background: linear-gradient(180deg,rgba(0, 19, 50, 0.92),rgba(0, 19, 50, 0.78)),url('https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?auto=format&fit=crop&w=1600&q=80')center/cover no-repeat;">
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
@endsection

@push('scripts')
<script src="{{ asset('js/public/others/radio.js') }}"></script>
@endpush