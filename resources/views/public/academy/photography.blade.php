@extends('layouts.app')

@section('title', 'Photography Training')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/academy/photography.css') }}">
@endpush

@section('content')
<!--
  Photography Training — Full Feature Blade View
  - Theme: Tech Blue Gradient (matches "Our Story & Mission")
  - Rich UI: hero canvas, video, gallery, lightbox, courses, instructors, testimonials, counters, FAQ, CTA
  - Responsive and accessible
  - Images from Unsplash (hotlinks) for demo purposes
  -Developer; John Muthoga 0791446968
-->

<!-- ================= HERO ================= -->
<section class="training-hero" aria-label="Training hero" style="background: linear-gradient(rgba(0, 43, 255, 0.65), rgba(0, 85, 255, 0.65)),
         url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1600&q=80')
         center/cover no-repeat;">
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

@endsection

@push('scripts')
<script src="{{ asset('js/public/academy/photography.js') }}"></script>
@endpush