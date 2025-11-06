@extends('layouts.app')

@section('title', 'Event & Ceremony Coverage')

@section('content')
<!-- === HERO SECTION === -->
<section class="hero-section text-white d-flex align-items-center"
         style="background: url('https://images.unsplash.com/photo-1520853504280-249b72dc9473?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat; min-height: 90vh;">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Content -->
      <div class="col-md-6" data-aos="fade-right">
        <h1 class="display-4 fw-bold mb-3 text-shadow">Event & Ceremony Coverage</h1>
        <p class="lead mb-4 text-light">
          Capture your events and ceremonies with cinematic precision and storytelling that makes every frame memorable.
        </p>
        <a href="#packages" class="btn btn-lg btn-outline-warning rounded-pill px-4">Explore Packages</a>
      </div>

      <!-- Right Image -->
      <div class="col-md-6 text-center mt-4 mt-md-0" data-aos="fade-left">
        <img src="https://images.unsplash.com/photo-1606760227091-3e94c3dbe3c3?auto=format&fit=crop&w=700&q=80"
             alt="Event Videography"
             class="img-fluid rounded-4 shadow-lg hero-right-img">
      </div>
    </div>
  </div>
</section>

<!-- === PACKAGES SECTION === -->
<section id="packages" class="py-5 bg-light position-relative">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold text-dark display-6">Our Videography Packages</h2>
      <p class="text-muted fs-5">Choose a coverage plan that matches your event style and vision.</p>
    </div>

    <div class="row g-4">
      <!-- Package 1 -->
      <div class="col-md-4" data-aos="zoom-in">
        <div class="package-card card border-0 shadow-lg h-100 text-center overflow-hidden position-relative">
          <div class="img-wrapper">
            <img src="https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Essential Coverage">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mt-3 fs-4">Essential Coverage</h5>
            <p class="text-muted mt-2 mb-4">
              Ideal for short events and ceremonies where you need professional video highlights and quick turnaround.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>2 hours coverage</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Full HD video</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Highlight reel (2–3 mins)</li>
            </ul>

            <div class="price-tag fw-bold text-warning display-6 mb-3 position-relative">
              Ksh 10,000
            </div>

            <a href="#" class="btn btn-warning rounded-pill mt-3 px-4 py-2 btn-animate shadow-lg text-dark fw-semibold">
              Book Now
            </a>
          </div>
        </div>
      </div>

      <!-- Package 2 (Most Popular) -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="package-card card border-0 shadow-lg h-100 text-center overflow-hidden position-relative highlight-card">
          <div class="img-wrapper">
            <img src="https://images.unsplash.com/photo-1573496529574-be85d6a60704?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Premium Coverage">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-warning mt-3 fs-4">Premium Cinematic</h5>
            <p class="text-muted mt-2 mb-4">
              Perfect for weddings, corporate events, and parties — professionally edited with cinematic flair.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Full-day coverage</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Drone footage included</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Professional color grading</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>5–7 minute highlight film</li>
            </ul>

            <div class="price-tag fw-bold text-warning display-6 mb-3 position-relative">
              Ksh 25,000
            </div>

            <a href="#" class="btn btn-warning rounded-pill mt-3 px-4 py-2 btn-animate shadow-lg text-dark fw-semibold">
              Book Now
            </a>
          </div>
        </div>
      </div>

      <!-- Package 3 -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="package-card card border-0 shadow-lg h-100 text-center overflow-hidden position-relative">
          <div class="img-wrapper">
            <img src="https://images.unsplash.com/photo-1581092580340-eede8e67dd75?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Deluxe Experience">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mt-3 fs-4">Deluxe Cinematic Experience</h5>
            <p class="text-muted mt-2 mb-4">
              A full cinematic production with storytelling, music, and editing perfection — ideal for high-end ceremonies.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Two professional videographers</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Drone + 4K cinematic shots</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Full documentary edit</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Personalized highlight film</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Delivered on USB & online</li>
            </ul>

            <div class="price-tag fw-bold text-warning display-6 mb-3 position-relative">
              Ksh 40,000
            </div>

            <a href="#" class="btn btn-warning rounded-pill shadow-lg text-dark fw-semibold px-4 py-2">
              Book Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- === ABOUT SECTION === -->
<section id="about" class="py-5">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- Left Image -->
      <div class="col-md-6 text-center" data-aos="fade-right">
        <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?auto=format&fit=crop&w=700&q=80"
             alt="About Videography"
             class="img-fluid rounded-4 shadow-lg"
             style="max-width: 80%; max-height: 380px; object-fit: cover; border: 5px solid rgba(0,0,0,0.05);">
      </div>

      <!-- Right Text -->
      <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left">
        <h2 class="fw-bold mb-3 text-warning">Why Choose Our Videography?</h2>
        <p class="text-muted mb-4 fs-5">
          We tell stories through motion — capturing emotions, laughter, and memories that move you every time you press play.
        </p>
        <ul class="list-unstyled fs-5">
          <li class="mb-2"><i class="bi bi-check-circle text-warning me-2"></i> Experienced cinematographers</li>
          <li class="mb-2"><i class="bi bi-check-circle text-warning me-2"></i> Premium editing & sound design</li>
          <li><i class="bi bi-check-circle text-warning me-2"></i> Drone and 4K cinematic visuals</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- === CALL TO ACTION SECTION === -->
<section class="cta-section text-white text-center py-5"
         style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
         url('https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;">
  <div class="container" data-aos="zoom-in">
    <h2 class="fw-bold mb-3">Let’s Capture Your Event in Motion</h2>
    <p class="lead mb-4">Turn your moments into timeless cinematic stories. Book your videography session today.</p>
    <a href="#packages" class="btn btn-warning btn-lg rounded-pill px-4 text-dark fw-semibold">Get Started</a>
  </div>
</section>

<!-- === CUSTOM CSS === -->
<style>
  .hero-section { position: relative; overflow: hidden; }
  .hero-section::after { content: ""; position: absolute; inset: 0; background: rgba(0,0,0,0.45); }
  .hero-section .container { position: relative; z-index: 2; }
  .text-shadow { text-shadow: 0 2px 10px rgba(0,0,0,0.6); }
  .hero-right-img { border: 4px solid rgba(255,255,255,0.3); transition: transform 0.5s ease; }
  .hero-right-img:hover { transform: scale(1.05); }

  .package-card { border-radius: 1rem; background: #fff; transition: all 0.4s ease-in-out; overflow: hidden; }
  .package-card:hover { transform: translateY(-10px) scale(1.02); box-shadow: 0 20px 40px rgba(0,0,0,0.15); }

  .package-card .img-wrapper { position: relative; overflow: hidden; height: 240px; }
  .package-card img { transition: transform 0.8s ease; width: 100%; height: 100%; object-fit: cover; }
  .package-card:hover img { transform: scale(1.1); }

  .highlight-card::after {
    content: "Most Popular";
    position: absolute;
    top: 15px; right: -45px;
    background: gold;
    color: #000;
    font-size: 0.8rem;
    font-weight: 700;
    transform: rotate(45deg);
    width: 160px;
    text-align: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
  }
</style>

<!-- === JS (AOS Animations) === -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    AOS.init({ duration: 1200, once: true });
  });
</script>
@endsection
