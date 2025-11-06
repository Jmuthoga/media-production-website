@extends('layouts.app')

@section('title', 'Internship & Attachment')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    body {
        font-family: 'Poppins', 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
    }

    /* Hero */
    .internship-hero {
        position: relative;
        width: 100%;
        height: 50vh;
        overflow: hidden;
        background:
            linear-gradient(rgba(0, 43, 255, 0.65), rgba(0, 85, 255, 0.65)),
            url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        animation: gradientShift 8s ease infinite;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
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

    #intern-lines {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .internship-hero .content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 90%;
        max-width: 1300px;
    }

    .internship-hero .text-box {
        max-width: 550px;
    }

    .internship-hero h2 {
        font-size: 2.4rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .internship-hero p {
        font-size: 1.1rem;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.9);
    }

    .internship-hero img {
        width: 460px;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
    }

    @media (max-width: 992px) {
        .internship-hero {
            flex-direction: column;
            height: auto;
            padding: 60px 20px;
            text-align: center;
        }

        .internship-hero .content {
            flex-direction: column;
        }

        .internship-hero img {
            width: 320px;
            margin-top: 25px;
        }
    }

    /* Internship Section */
    .internship-section {
        background: #f8f9fc;
    }

    .internship-section h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #002b80;
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
    }

    .internship-section h2::after {
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
        .video-box iframe {
            height: 250px;
        }
    }

    .offer-section,
    .requirements-section,
    .roles-section {
        background: #fff;
        padding: 60px 0;
    }

    .offer-section h3,
    .requirements-section h3,
    .roles-section h3 {
        color: #001f5b;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .offer-section ul,
    .requirements-section ul,
    .roles-section ul {
        list-style: disc;
        padding-left: 20px;
    }

    .offer-section li,
    .requirements-section li,
    .roles-section li {
        margin-bottom: 10px;
        color: #555;
    }

    .role-status {
        font-weight: 600;
        padding: 2px 8px;
        border-radius: 12px;
        color: #fff;
        font-size: 0.85rem;
        margin-left: 10px;
    }

    .open {
        background-color: #28a745;
    }

    .closed {
        background-color: #dc3545;
    }
</style>


<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #0f111a;
        color: #fff;
        margin: 0;
    }

    /* Section Titles */
    .section-title {
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 50px;
        text-align: center;
        color: #fff;
        position: relative;
    }

    .section-title::after {
        content: '';
        width: 80px;
        height: 4px;
        background: #1a73e8;
        display: block;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    /* Roles */
    .roles-section .role-card {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        height: 400px;
        cursor: pointer;
        transition: all 0.4s ease;
    }

    .roles-section .role-card:hover {
        transform: scale(1.05);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.7);
    }

    .role-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        transition: all 0.4s ease;
    }

    .role-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
        transition: background 0.3s ease;
    }

    .role-card:hover .role-overlay {
        background: rgba(0, 0, 0, 0.35);
    }

    .role-content {
        position: relative;
        z-index: 2;
        padding: 25px;
        display: flex;
        flex-direction: column;
        justify-content: end;
        height: 100%;
    }

    .role-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .role-title i {
        margin-right: 10px;
        color: #1a73e8;
        transition: transform 0.3s ease;
    }

    .role-card:hover .role-title i {
        transform: rotate(15deg) scale(1.2);
    }

    .role-desc {
        color: #f0f0f0;
        font-size: 0.95rem;
        margin-bottom: 15px;
        line-height: 1.5;
    }

    .role-status {
        padding: 0.3rem 0.7rem;
        border-radius: 50px;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .role-status.open {
        background: #28a745;
    }

    .role-status.closed {
        background: #dc3545;
    }

    .btn-apply,
    .btn-closed {
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        transition: all 0.3s ease;
    }

    .btn-apply {
        background: linear-gradient(135deg, #1a73e8, #4285f4);
        color: #fff;
    }

    .btn-apply:hover {
        background: linear-gradient(135deg, #4285f4, #1a73e8);
        transform: translateY(-3px);
    }

    .btn-closed {
        background: #6c757d;
        color: #fff;
        opacity: 0.6;
        cursor: not-allowed;
    }

    /* Offer Cards */
    .offer-section {
        background: linear-gradient(135deg, #0d0e1a, #111224);
        padding-bottom: 80px;
    }

    .offer-card {
        background: #1b1c2a;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        transition: all 0.4s ease;
        cursor: pointer;
    }

    .offer-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
    }

    .offer-card i {
        font-size: 2rem;
        color: #1a73e8;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }

    .offer-card h4 {
        margin-bottom: 10px;
        font-weight: 600;
    }

    .offer-card p {
        font-size: 0.95rem;
        color: #ccc;
    }

    /* Requirements */
    .requirements-section {
        background: linear-gradient(135deg, #111224, #0d0e1a);
        padding-bottom: 80px;
    }

    .requirements-list {
        list-style: none;
        padding: 0;
    }

    .requirements-list li {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        font-size: 1rem;
    }

    .requirements-list i {
        color: #1a73e8;
        margin-right: 10px;
        transition: all 0.3s ease;
    }

    .requirements-list li:hover i {
        transform: scale(1.2) rotate(10deg);
    }

    /* Responsive */
    @media(max-width:768px) {
        .role-card {
            height: 350px;
        }
    }
</style>

<!-- Hero -->
<section class="internship-hero">
    <canvas id="intern-lines"></canvas>
    <div class="content">
        <div class="text-box">
            <h2>Join Our Internship & Attachment Programs</h2>
            <p>Hands-on training, mentorship, and real project experience to help you build a career in photography & media production.</p>
        </div>
        <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1600&q=80" alt="Internship Team">
    </div>
</section>

<!-- Internship Section -->
<section class="internship-section py-5">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2>About Our Programs</h2>
                <p class="text-muted" style="line-height:1.8;">Our Internship program is 3 months full-time, while the Attachment program is 1 month. Participants gain real project experience, mentorship, and professional skill development.</p>
                <p class="text-muted" style="line-height:1.8;">Access professional equipment, build a portfolio, and network with industry experts to kickstart your creative career.</p>

                <div class="row text-center mt-4">
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-primary"><span class="counter" data-target="200">0</span>+</h3>
                        <p class="text-muted mb-0">Successful Interns</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-primary"><span class="counter" data-target="50">0</span>+</h3>
                        <p class="text-muted mb-0">Mentors & Staff</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 text-center">
                <div class="video-box shadow-lg rounded overflow-hidden position-relative">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/nXo4uQ1iA3Y?autoplay=0&mute=1&rel=0&showinfo=0" title="Internship Overview" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="row text-center mt-4">
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-success"><span class="counter" data-target="150">0</span>+</h3>
                        <p class="text-muted mb-0">Projects Completed</p>
                    </div>
                    <div class="col-6 mb-3">
                        <h3 class="fw-bold text-success"><span class="counter" data-target="5">0</span>+</h3>
                        <p class="text-muted mb-0">Years Running</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Roles Section -->
<section class="roles-section py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5"
            style="background: linear-gradient(90deg, #0d6efd, #00c6ff, #0072ff);
           -webkit-background-clip: text;
           -webkit-text-fill-color: transparent;
           font-weight: 700;
           letter-spacing: 1px;">
            Join Our Creative Team
        </h2>
        <div class="row g-4">
            <!-- Photographer -->
            <div class="col-md-4">
                <div class="role-card">
                    <div class="role-bg" style="background-image: url('https://images.unsplash.com/photo-1524635962361-f25b8c3fcf83?auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="role-overlay"></div>
                    <div class="role-content">
                        <h3 class="role-title"><i class="bi bi-camera-fill"></i> Photographer Intern</h3>
                        <span class="role-status open">Open</span>
                        <p class="role-desc">Work on real photoshoots, learn studio & outdoor photography, and build a professional portfolio.</p>
                        <a href="#" class="btn btn-apply">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- Videographer -->
            <div class="col-md-4">
                <div class="role-card">
                    <div class="role-bg" style="background-image: url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="role-overlay"></div>
                    <div class="role-content">
                        <h3 class="role-title"><i class="bi bi-camera-reels"></i> Videographer Intern</h3>
                        <span class="role-status open">Open</span>
                        <p class="role-desc">Capture, edit, and produce cinematic videos while learning modern storytelling techniques.</p>
                        <a href="#" class="btn btn-apply">Apply Now</a>
                    </div>
                </div>
            </div>

            <!-- Photo Editor -->
            <div class="col-md-4">
                <div class="role-card">
                    <div class="role-bg" style="background-image: url('https://images.unsplash.com/photo-1504198453319-5ce911bafcde?auto=format&fit=crop&w=800&q=80');"></div>
                    <div class="role-overlay"></div>
                    <div class="role-content">
                        <h3 class="role-title"><i class="bi bi-image"></i> Photo Editor Intern</h3>
                        <span class="role-status closed">Closed</span>
                        <p class="role-desc">Edit and retouch client photos for professional projects, building practical skills.</p>
                        <a href="#" class="btn btn-closed">Closed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Offer Section -->
<section class="offer-section py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">What We Offer</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="offer-card">
                    <i class="bi bi-camera-fill"></i>
                    <h4>Professional Experience</h4>
                    <p>Hands-on experience with cameras, lighting, and video equipment on real projects.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="offer-card">
                    <i class="bi bi-person-badge-fill"></i>
                    <h4>Mentorship & Guidance</h4>
                    <p>Learn from industry professionals and improve your skills on live projects.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="offer-card">
                    <i class="bi bi-folder2-open"></i>
                    <h4>Portfolio Building</h4>
                    <p>Get portfolio-ready work through real assignments and creative projects.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="offer-card">
                    <i class="bi bi-people-fill"></i>
                    <h4>Networking</h4>
                    <p>Connect with creative professionals and receive career guidance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Requirements Section -->
<section class="requirements-section py-5 bg-gradient-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Requirements</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <ul class="requirements-list">
                    <li><i class="bi bi-lightning-fill"></i>Passionate about photography, videography, or media production</li>
                    <li><i class="bi bi-tools"></i>Basic knowledge of cameras & editing software</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="requirements-list">
                    <li><i class="bi bi-clock-fill"></i>Full-time internship (3 months) or part-time attachment (1 month)</li>
                    <li><i class="bi bi-chat-dots-fill"></i>Good communication skills & eagerness to learn</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script>
    /* Animated tech lines */
    const canvas = document.getElementById("intern-lines");
    const ctx = canvas.getContext("2d");
    let width, height, points;

    function resizeCanvas() {
        width = canvas.width = window.innerWidth;
        height = canvas.height = document.querySelector(".internship-hero").offsetHeight;
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
                const dx = points[i].x - points[j].x,
                    dy = points[i].y - points[j].y,
                    dist = Math.sqrt(dx * dx + dy * dy);
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

    // Counter animation
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
        const section = document.querySelector(".internship-section");
        const rect = section.getBoundingClientRect();
        if (!countersStarted && rect.top < window.innerHeight - 100) {
            countersStarted = true;
            animateCounters();
        }
    });
</script>
@endsection