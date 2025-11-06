@extends('layouts.app')

@section('title', 'Our Story & Mission')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/aboutus/our-story.css') }}">
@endpush

@section('content')
<!-- === Hero Section with Animated Tech Lines === -->
<section class="about-hero">
    <canvas id="tech-lines"></canvas>
    <div class="content">
        <div class="text-box">
            <h2>Who Are We – Why Us?</h2>
            <p>
                At Unimax Photography, we are more than just a creative studio — we’re storytellers driven by passion,
                precision, and purpose. With a blend of art and technology, we bring your moments to life through
                captivating visuals, cinematic quality, and unmatched professionalism.
            </p>
        </div>

        <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=800&auto=format&fit=crop"
            alt="Our Team">
    </div>
</section>

<!-- === About Company + YouTube + Counters Section === -->
<section class="about-company-section py-5">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <!-- Left: About Text -->
            <div class="col-lg-6 col-md-12">
                <h2>About Us</h2>
                <p class="text-muted" style="line-height: 1.8;">
                    Founded on creativity and innovation, Unimax Photography has grown into a trusted name in visual
                    storytelling. We combine artistic vision, advanced technology, and a customer-first approach to
                    capture the essence of every moment.
                </p>
                <p class="text-muted" style="line-height: 1.8;">
                    From weddings and corporate events to brand campaigns and studio productions — our team ensures
                    excellence in every frame. With over a decade of experience, we’ve turned thousands of memories into
                    timeless visuals that inspire and connect.
                </p>

                <!-- Counters -->
                <div class="row text-center mt-4">
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-primary"><span class="counter" data-target="500">0</span>+</h3>
                        <p class="text-muted mb-0">Client Reviews</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-primary"><span class="counter" data-target="50">0</span>+</h3>
                        <p class="text-muted mb-0">Support Team & Staff</p>
                    </div>
                </div>
            </div>

            <!-- Right: YouTube Video -->
            <div class="col-lg-6 text-center">
                <div class="video-box shadow-lg rounded overflow-hidden position-relative">
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/nXo4uQ1iA3Y?autoplay=0&mute=1&rel=0&showinfo=0"
                        title="Unimax Photography Intro" frameborder="0" allowfullscreen></iframe>
                </div>

                <!-- Counters Below Video -->
                <div class="row text-center mt-4">
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-success"><span class="counter" data-target="3000">0</span>+</h3>
                        <p class="text-muted mb-0">Projects Completed</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-success"><span class="counter" data-target="15">0</span>+</h3>
                        <p class="text-muted mb-0">Years of Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- === FAQS & Side Feature Section (Professional Theme) === -->
<section class="faq-section py-5" style="background: #fafafa; font-family: 'Poppins', sans-serif;">
    <div class="container">
        <div class="row align-items-start g-5">

            <!-- FAQs (Left Side) -->
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4 position-relative d-inline-block" style="color: #001f5b;">
                    Frequently Asked Questions
                    <span class="underline-animation"></span>
                </h2>
                <div class="accordion" id="faqAccordion">

                    <!-- Q1 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded-3">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-semibold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What services does your company offer?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary">
                                We provide professional photography, videography, branding, and creative media services for both individuals and businesses.
                            </div>
                        </div>
                    </div>

                    <!-- Q2 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded-3">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-semibold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How can I book your services?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary">
                                Bookings can be made directly through our website’s contact page or by reaching us via email or phone. We also respond quickly on WhatsApp.
                            </div>
                        </div>
                    </div>

                    <!-- Q3 -->
                    <div class="accordion-item border-0 shadow-sm rounded-3">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-semibold text-dark bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Do you offer training or internships?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary">
                                Yes, through our <strong>Unimax Academy</strong> we offer hands-on training, mentorship, and internship opportunities in photography and media production.
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Side Feature (Right Side) -->
            <div class="col-lg-6">
                <div class="p-4 rounded-4 shadow-sm bg-white text-center">
                    <h3 class="fw-bold mb-3" style="color: #001f5b;">Need More Information?</h3>
                    <p class="text-secondary mb-4">
                        Can’t find what you’re looking for? Our team is ready to help — feel free to get in touch anytime.
                    </p>
                    <a href="{{ route('contact') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-envelope-fill me-2"></i> Contact Support
                    </a>
                    <div class="mt-5">
                        <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=800&auto=format&fit=crop" alt="Support Team" class="img-fluid rounded-3" style="max-height: 250px;">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- === Our Clients Section === -->
<section class="our-clients-section py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4" style="color: #001f5b;">Our Clients</h2>
        <p class="text-muted mb-5">We’re proud to have collaborated with these amazing brands and organizations.</p>

        <div class="clients-slider">
            <div class="clients-track">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Apple-logo.png" alt="Apple">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Google_Logo.svg" alt="Google">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg" alt="IBM">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon">
                <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Adobe_Systems_logo_and_wordmark.svg" alt="Adobe">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Canon_logo.svg" alt="Canon">
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Samsung_Logo.svg" alt="Samsung">
                <!-- Duplicate for seamless loop -->
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Apple-logo.png" alt="Apple">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Google_Logo.svg" alt="Google">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg" alt="IBM">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon">
                <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Adobe_Systems_logo_and_wordmark.svg" alt="Adobe">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Canon_logo.svg" alt="Canon">
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Samsung_Logo.svg" alt="Samsung">
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/public/aboutus/our-story.js') }}"></script>
@endpush