@extends('layouts.app')

@section('title', 'Wedding & Engagement Packages')

@section('content')
<!-- === HERO SECTION === -->
<section class="hero-section text-white d-flex align-items-center position-relative"
         style="background: url('https://images.unsplash.com/photo-1519744346363-d0b813a5075c?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat; min-height: 90vh;">
  <div class="overlay"></div>
  <div class="container position-relative z-2">
    <div class="row align-items-center">
      <!-- Left Content -->
      <div class="col-lg-6 col-md-7" data-aos="fade-right">
        <h1 class="display-4 fw-bold mb-3 text-shadow">Wedding & Engagement Packages</h1>
        <p class="lead mb-4 text-light">
          Celebrate your love story with timeless wedding and engagement photography — beautifully crafted to capture every magical moment.
        </p>
        <a href="#packages" class="btn btn-lg btn-outline-light rounded-pill px-4">Explore Packages</a>
      </div>

      <!-- Right Image -->
      <div class="col-lg-5 col-md-5 text-center mt-5 mt-md-0" data-aos="zoom-in">
        <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=700&q=80"
             alt="Wedding Couple"
             class="img-fluid hero-right-img rounded-4 shadow-lg">
      </div>
    </div>
  </div>
</section>

<!-- === PACKAGES SECTION === -->
<section id="packages" class="py-5 bg-light position-relative">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold text-dark display-6">Our Wedding & Engagement Packages</h2>
      <p class="text-muted fs-5">Choose the perfect package to match your dream celebration.</p>
    </div>

    <div class="row g-4">
      <!-- Package 1 -->
      <div class="col-md-4" data-aos="zoom-in">
        <div class="package-card card border-0 shadow-lg h-100 text-center overflow-hidden position-relative">
          <div class="img-wrapper">
            <img src="https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Engagement Bliss">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mt-3 fs-4">Engagement Bliss</h5>
            <p class="text-muted mt-2 mb-4">
              Capture your engagement story with elegance and emotion — the perfect pre-wedding keepsake.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>1-hour engagement session</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>25 professionally edited photos</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>1 outfit change</li>
            </ul>

            <div class="price-tag fw-bold text-primary display-6 mb-3 position-relative">
              Ksh 8,000
              <span class="shine"></span>
            </div>

            <a href="#" class="btn btn-primary rounded-pill mt-3 px-4 py-2 btn-animate shadow-lg">
              <span>Book Now</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Package 2 (Most Popular) -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="package-card card border-0 shadow-lg h-100 text-center overflow-hidden position-relative highlight-card">
          <div class="img-wrapper">
            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Classic Wedding">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-primary mt-3 fs-4">Classic Wedding</h5>
            <p class="text-muted mt-2 mb-4">
              Our most popular wedding package designed to beautifully document every moment of your big day.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Full-day coverage</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>100+ edited photos</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Pre-wedding consultation</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Online gallery + photo album</li>
            </ul>

            <div class="price-tag fw-bold text-primary display-6 mb-3 position-relative">
              Ksh 25,000
              <span class="shine"></span>
            </div>

            <a href="#" class="btn btn-primary rounded-pill mt-3 px-4 py-2 btn-animate shadow-lg">
              <span>Book Now</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Package 3 -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="package-card card border-0 shadow-lg h-100 text-center overflow-hidden position-relative">
          <div class="img-wrapper">
            <img src="https://images.unsplash.com/photo-1522040806050-1f7956ec1115?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Luxury Wedding Experience">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mt-3 fs-4">Luxury Wedding Experience</h5>
            <p class="text-muted mt-2 mb-4">
              A premium experience with full creative direction and breathtaking visual storytelling.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Two professional photographers</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Full-day + pre-wedding session</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>High-end photo album</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Drone footage & cinematic edit</li>
            </ul>

            <div class="price-tag fw-bold text-primary display-6 mb-3 position-relative">
              Ksh 40,000
              <span class="shine"></span>
            </div>

            <a href="#" class="btn btn-primary rounded-pill mt-3 px-4 py-2 btn-animate shadow-lg">
              <span>Book Now</span>
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
      <div class="col-md-6" data-aos="fade-right">
        <img src="https://images.unsplash.com/photo-1522673607200-164d1b6ce486?auto=format&fit=crop&w=700&q=80"
             alt="About Photography"
             class="img-fluid rounded-4 shadow-lg">
      </div>

      <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left">
        <h2 class="fw-bold mb-3 text-primary">Why Choose Our Wedding Photography?</h2>
        <p class="text-muted mb-4">
          We capture genuine emotion, connection, and beauty — ensuring every frame of your wedding day feels magical and timeless.
        </p>
        <ul class="list-unstyled">
          <li class="mb-2"><i class="bi bi-check-circle text-primary"></i> Romantic, cinematic photo style</li>
          <li class="mb-2"><i class="bi bi-check-circle text-primary"></i> Experienced wedding storytellers</li>
          <li><i class="bi bi-check-circle text-primary"></i> Packages tailored to your love story</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- === CALL TO ACTION SECTION === -->
<section class="cta-section text-white text-center py-5"
         style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
         url('https://images.unsplash.com/photo-1503264116251-35a269479413?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;">
  <div class="container" data-aos="zoom-in">
    <h2 class="fw-bold mb-3">Make Your Day Unforgettable</h2>
    <p class="lead mb-4">Reserve your wedding or engagement session and let’s capture your forever moments together.</p>
    <a href="#packages" class="btn btn-light btn-lg rounded-pill px-4">Get Started</a>
  </div>
</section>

<!-- === CUSTOM CSS === -->
<style>
  .hero-section {
    position: relative;
    overflow: hidden;
  }

  .hero-section::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.45);
  }

  .overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(0,0,0,0.6) 20%, rgba(0,0,0,0.3) 80%);
    z-index: 1;
  }

  .hero-section .container {
    position: relative;
    z-index: 2;
  }

  .text-shadow {
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);
  }

  /* Adjust image size + hover */
  .hero-right-img {
    max-width: 70%;
    border: 4px solid rgba(255,255,255,0.3);
    transition: transform 0.6s ease, box-shadow 0.6s ease;
    box-shadow: 0 10px 30px rgba(255,255,255,0.1);
  }

  .hero-right-img:hover {
    transform: scale(1.08);
    box-shadow: 0 20px 50px rgba(255,255,255,0.3);
  }

  @media (max-width: 768px) {
    .hero-right-img {
      max-width: 85%;
      margin-top: 2rem;
    }
  }

  .package-card { border-radius: 1rem; background: #fff; transition: all 0.4s ease-in-out; overflow: hidden; position: relative; }
  .package-card:hover { transform: translateY(-12px) scale(1.02); box-shadow: 0 20px 40px rgba(0,0,0,0.15); }

  .package-card .img-wrapper { position: relative; overflow: hidden; height: 240px; }
  .package-card img { transition: transform 0.8s ease; width: 100%; height: 100%; object-fit: cover; }
  .package-card:hover img { transform: scale(1.1); }

  .highlight-card::after {
    content: "Most Popular";
    position: absolute; top: 15px; right: -45px;
    background: gold; color: #000; font-size: 0.8rem;
    font-weight: 700; transform: rotate(45deg);
    width: 160px; text-align: center;
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

