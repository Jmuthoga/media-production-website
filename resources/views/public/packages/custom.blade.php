@extends('layouts.app')

@section('title', 'Request a Custom Quote')

<!-- === AOS Animation === -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/packages/custom.css') }}">
@endpush

@section('content')

<!-- === HERO SECTION === -->
<section class="hero-section d-flex align-items-center justify-content-center text-center text-white position-relative"
    style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
           url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat; min-height: 90vh;">
    <div class="container position-relative z-2" data-aos="zoom-in">
        <h1 class="display-4 fw-bold mb-3 text-gradient">Request a Custom Quote</h1>
        <p class="lead mb-4 text-light mx-auto" style="max-width: 700px;">
            Share your vision with us, and we will craft a custom package tailored to your goals and budget.
        </p>
        <a href="#quoteForm" class="btn btn-lg btn-gold rounded-pill px-5 py-2 fw-semibold hero-btn">
            <i class="bi bi-arrow-down-circle me-2"></i>Get Started
        </a>
    </div>
</section>

<!-- === SERVICES OVERVIEW === -->
<section class="py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <h2 class="text-center fw-bold display-6 mb-4 text-blue">Our Services</h2>
        <p class="text-center text-muted mb-5">We provide tailored solutions for photography, videography, and social media content.</p>
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <i class="bi bi-camera-video-fill fs-1 text-gold mb-3"></i>
                <h5 class="fw-bold">Event Videography</h5>
                <p class="text-muted">Capture your events in cinematic style with professional editing and sound design.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="bi bi-image-fill fs-1 text-gold mb-3"></i>
                <h5 class="fw-bold">Photography</h5>
                <p class="text-muted">Creative photography for corporate, lifestyle, and personal projects with attention to detail.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="bi bi-phone-fill fs-1 text-gold mb-3"></i>
                <h5 class="fw-bold">Social Media Content</h5>
                <p class="text-muted">Optimized content for TikTok, YouTube, Instagram, and other platforms.</p>
            </div>
        </div>
    </div>
</section>

<!-- === MULTI-STEP QUOTE FORM SECTION === -->
<section id="quoteForm" class="py-5 position-relative" style="background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <!-- Left Image -->
            <div class="col-lg-5 d-none d-lg-block">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1600&q=80" alt="Creative Work" class="img-fluid rounded-4 shadow-lg">
            </div>

            <!-- Right Form -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-lg rounded-4 p-4" style="background: rgba(255, 255, 255, 0.85);">
                    <div class="card-body">
                        <h2 class="fw-bold text-blue mb-3 text-center">Personalized Quote Request</h2>
                        <p class="text-muted text-center mb-4">Complete the steps below, and we’ll provide a tailored quote within 24 hours.</p>

                        <form id="multiStepForm" action="" method="POST">
                            @csrf

                            <!-- Step 1 -->
                            <div class="form-step">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">Full Name</label>
                                    <input type="text" name="name" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Enter your full name" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">Email Address</label>
                                    <input type="email" name="email" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Enter your email" required>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-primary btn-next">Next</button>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="form-step d-none">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">Phone Number</label>
                                    <input type="text" name="phone" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="+2547XXXXXXXX" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">Service Type</label>
                                    <select name="service" class="form-select form-select-lg rounded-3 shadow-sm" required>
                                        <option selected disabled>Select the service you're interested in</option>
                                        <option value="corporate">Corporate & Brand Coverage</option>
                                        <option value="cinematic">Cinematic Productions</option>
                                        <option value="social">Social Media Videography</option>
                                        <option value="wedding">Wedding Photography & Videography</option>
                                        <option value="event">Event Photography & Videography</option>
                                        <option value="live">Live Coverage / Concerts / Conferences</option>
                                        <option value="portrait">Portrait & Lifestyle Photography</option>
                                        <option value="product">Product & Commercial Photography</option>
                                        <option value="fashion">Fashion & Editorial Shoots</option>
                                        <option value="drone">Drone & Aerial Videography</option>
                                        <option value="music">Music Videos / Artist Shoots</option>
                                        <option value="premium">Premium All-Inclusive Deals</option>
                                        <option value="custom">Custom Service / Other</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary btn-prev">Back</button>
                                    <button type="button" class="btn btn-primary btn-next">Next</button>
                                </div>
                            </div>

                            <!-- Step 3 -->
                            <div class="form-step d-none">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">Preferred Date</label>
                                    <input type="date" name="date" class="form-control form-control-lg rounded-3 shadow-sm">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">Project Details</label>
                                    <textarea name="details" rows="4" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Describe your project or event..." required></textarea>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary btn-prev">Back</button>
                                    <button type="button" class="btn btn-primary btn-next">Next</button>
                                </div>
                            </div>

                            <!-- Step 4 -->
                            <div class="form-step d-none">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">Additional Requests</label>
                                    <textarea name="additional" rows="3" class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Any special requirements or notes"></textarea>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary btn-prev">Back</button>
                                    <button type="submit" class="btn btn-gold fw-bold">Submit Request</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- End Right Form -->
        </div>
    </div>
</section>



<!-- === INFO PANELS === -->
<section class="py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            <div class="col-md-4 text-center">
                <i class="bi bi-clock-fill fs-1 text-blue mb-3"></i>
                <h5 class="fw-bold text-blue">Quick Response</h5>
                <p class="text-muted">Receive a personalized quote within 24 hours of submitting your request.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="bi bi-check2-circle fs-1 text-blue mb-3"></i>
                <h5 class="fw-bold text-blue">Tailored Packages</h5>
                <p class="text-muted">Every quote is customized to match your unique project requirements.</p>
            </div>
            <div class="col-md-4 text-center">
                <i class="bi bi-shield-check fs-1 text-blue mb-3"></i>
                <h5 class="fw-bold text-blue">Trusted Professionals</h5>
                <p class="text-muted">Work with a team experienced in videography, photography, and social media content.</p>
            </div>
        </div>
    </div>
</section>

<!-- === FAQ SECTION === -->
<section class="py-5">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-6 text-blue">Frequently Asked Questions</h2>
            <p class="text-muted fs-5">Answers to common inquiries about our services and process.</p>
        </div>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq1">
                    <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true">
                        How long does it take to receive a quote?
                    </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Our team responds within 24 hours with a detailed quote tailored to your needs.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq2">
                    <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false">
                        Can I customize my package?
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Yes! Every package is fully customizable according to your preferences and budget.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq3">
                    <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false">
                        Do you provide social media content?
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Absolutely! We specialize in TikTok, YouTube, Instagram, and other platforms.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- === CONTACT SECTION === -->
<section class="py-5 text-white text-center" style="background: linear-gradient(90deg, #0d6efd 0%, #ffc107 100%);">
    <div class="container" data-aos="fade-up">
        <h2 class="fw-bold mb-3">Need Immediate Help?</h2>
        <p class="mb-4">Talk to our support team directly for urgent or same-day service requests.</p>
        <p class="fs-5 mb-2"><i class="bi bi-telephone-fill me-2"></i> +254 700 123 456</p>
        <p class="fs-5"><i class="bi bi-envelope-fill me-2"></i> support@jminnovatech.co.ke</p>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/public/packages/custom.js') }}"></script>
@endpush