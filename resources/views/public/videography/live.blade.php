@extends('layouts.app')

@section('title', 'Live Event — On Air')

<link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

<script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/videography/live.css') }}">
@endpush

@section('content')


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
            </div>
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

@endsection

@push('scripts')
<script src="{{ asset('js/public/videography/live.js') }}"></script>
@endpush