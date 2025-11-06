@extends('layouts.app')

@section('title', 'Printing & Branding')

<!-- External libs -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@0.2.38/dist/lenis.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/others/printing.css') }}">
@endpush

@section('content')

<!-- HERO -->
<section class="hero" aria-label="Hero — JM Innovatech Branding Studio"
    style="background: linear-gradient(180deg,rgba(0, 19, 50, 0.92),rgba(0, 19, 50, 0.78)),url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1600&q=80')center/cover no-repeat;">
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

@endsection

@push('scripts')
<script src="{{ asset('js/public/others/printing.js') }}"></script>
@endpush