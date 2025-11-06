@extends('layouts.app')

@section('title', 'Our Story & Mission')

@section('content')
<style>
    /* === Official Font === */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    body {
        font-family: 'Poppins', 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
    }

    /* === Top Tech-Themed Hero Section === */
    .about-hero {
        position: relative;
        width: 100%;
        height: 50vh;
        overflow: hidden;
        background: linear-gradient(135deg, #002bff, #0055ff, #0099ff);
        background-size: 400% 400%;
        animation: gradientShift 8s ease infinite;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }

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

    /* Tech lines canvas */
    #tech-lines {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    /* Foreground content */
    .about-hero .content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 90%;
        max-width: 1300px;
    }

    .about-hero .text-box {
        max-width: 550px;
    }

    .about-hero h2 {
        font-size: 2.4rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .about-hero p {
        font-size: 1.1rem;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.9);
    }

    .about-hero img {
        width: 460px;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
    }

    @media (max-width: 992px) {
        .about-hero {
            flex-direction: column;
            height: auto;
            padding: 60px 20px;
            text-align: center;
        }

        .about-hero .content {
            flex-direction: column;
        }

        .about-hero img {
            width: 320px;
            margin-top: 25px;
        }
    }

    /* === About Company Section === */
    .about-company-section {
        background: #f8f9fc;
    }

    .about-company-section h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #002b80;
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
    }

    /* Animated Gradient Underline */
    .about-company-section h2::after {
        content: '';
        position: absolute;
        bottom: -6px;
        left: 0;
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, #0055ff, #00bfff, #0099ff);
        box-shadow: 0 0 10px rgba(0, 153, 255, 0.8);
        animation: underlineGlow 2s infinite alternate ease-in-out;
    }

    @keyframes underlineGlow {
        from {
            width: 30%;
            opacity: 0.6;
        }

        to {
            width: 100%;
            opacity: 1;
        }
    }

    /* Video Box */
    .video-box iframe {
        border-radius: 15px;
        width: 100%;
        height: 320px;
    }

    .counter {
        font-size: 2.2rem;
        display: inline-block;
        color: #0d6efd;
        font-weight: 700;
    }

    @media (max-width: 992px) {
        .about-company-section {
            text-align: center;
        }

        .video-box iframe {
            height: 250px;
        }
    }

    .underline-animation {
        display: block;
        width: 0;
        height: 3px;
        background-color: #001f5b;
        transition: width 0.4s ease;
        margin-top: 4px;
    }

    h2:hover .underline-animation {
        width: 100%;
    }


    .underline-animation::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -6px;
        height: 3px;
        width: 0;
        background-color: #222;
        transition: width 0.4s ease-in-out;
    }

    .underline-animation:hover::after {
        width: 100%;
    }

    .accordion-button {
        border-radius: 0.5rem;
    }

    .accordion-button:not(.collapsed) {
        background-color: #f5f5f5;
        box-shadow: none;
    }

    .accordion-button:focus {
        box-shadow: none;
    }
</style>

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

<style>
    .our-clients-section {
        background: #f8f9fc;
    }

    .clients-slider {
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    .clients-track {
        display: flex;
        width: calc(250px * 16);
        animation: scrollClients 25s linear infinite;
    }

    .clients-track img {
        height: 50px;
        width: auto;
        margin: 0 40px;
        filter: grayscale(100%);
        opacity: 0.8;
        transition: all 0.3s ease;
    }

    .clients-track img:hover {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.1);
    }

    @keyframes scrollClients {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }
</style>


<script>
    /* === Animated Tech Lines === */
    const canvas = document.getElementById("tech-lines");
    const ctx = canvas.getContext("2d");
    let width, height, points;

    function resizeCanvas() {
        width = canvas.width = window.innerWidth;
        height = canvas.height = document.querySelector(".about-hero").offsetHeight;
        points = Array.from({
            length: 50
        }, () => ({
            x: Math.random() * width,
            y: Math.random() * height,
            vx: (Math.random() - 0.5) * 0.7,
            vy: (Math.random() - 0.5) * 0.7
        }));
    }

    function draw() {
        ctx.clearRect(0, 0, width, height);
        ctx.fillStyle = "#fff";

        points.forEach(p => {
            p.x += p.vx;
            p.y += p.vy;
            if (p.x < 0 || p.x > width) p.vx *= -1;
            if (p.y < 0 || p.y > height) p.vy *= -1;
            ctx.beginPath();
            ctx.arc(p.x, p.y, 2, 0, Math.PI * 2);
            ctx.fill();
        });

        ctx.strokeStyle = "rgba(255,255,255,0.2)";
        ctx.lineWidth = 1;

        for (let i = 0; i < points.length; i++) {
            for (let j = i + 1; j < points.length; j++) {
                const dx = points[i].x - points[j].x;
                const dy = points[i].y - points[j].y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 120) {
                    ctx.beginPath();
                    ctx.moveTo(points[i].x, points[i].y);
                    ctx.lineTo(points[j].x, points[j].y);
                    ctx.stroke();
                }
            }
        }
        requestAnimationFrame(draw);
    }

    window.addEventListener("resize", resizeCanvas);
    resizeCanvas();
    draw();

    /* === Counter Animation === */
    const counters = document.querySelectorAll(".counter");
    const speed = 100;

    const animateCounters = () => {
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute("data-target");
                const count = +counter.innerText;
                const increment = Math.ceil(target / speed);

                if (count < target) {
                    counter.innerText = count + increment;
                    setTimeout(updateCount, 40);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    };

    let countersStarted = false;
    window.addEventListener("scroll", () => {
        const section = document.querySelector(".about-company-section");
        const rect = section.getBoundingClientRect();
        if (!countersStarted && rect.top < window.innerHeight - 100) {
            countersStarted = true;
            animateCounters();
        }
    });
</script>
@endsection