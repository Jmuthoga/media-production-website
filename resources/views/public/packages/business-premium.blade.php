@extends('layouts.app')

@section('title', 'Premium All-Inclusive Deals')

@section('content')
<!-- === HERO SECTION === -->
<section class="hero-section text-white d-flex align-items-center"
         style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)),
         url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=700&q=80') center/cover no-repeat; min-height: 90vh;">
  <div class="container text-center" data-aos="fade-up">
    <h1 class="display-4 fw-bold mb-3 text-warning">Premium All-Inclusive Deals</h1>
    <p class="lead mb-4 text-light">
      Experience the ultimate in quality, convenience, and creativity — everything you need in one luxurious package.
    </p>
    <a href="#packages" class="btn btn-lg btn-warning rounded-pill px-4 py-2 shadow">Explore Deals</a>
  </div>
</section>

<!-- === PACKAGES SECTION === -->
<section id="packages" class="py-5 bg-light position-relative">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold text-dark display-6">Our All-Inclusive Packages</h2>
      <p class="text-muted fs-5">Each package is designed to offer complete peace of mind — we handle everything from start to finish.</p>
    </div>

    <div class="row g-4">
      <!-- Silver Deal -->
      <div class="col-md-4" data-aos="zoom-in">
        <div class="card border-0 shadow-lg h-100 text-center overflow-hidden position-relative" style="border-radius: 1rem;">
          <img src="https://images.unsplash.com/photo-1503424886306-3d9d94c8c1f3?auto=format&fit=crop&w=700&q=80"
               class="card-img-top" alt="Silver Package" style="height:240px; object-fit:cover;">
          <div class="card-body p-4">
            <h5 class="fw-bold text-dark mt-3 fs-4">Silver Deal</h5>
            <p class="text-muted mt-2 mb-4">Perfect for individuals or small teams looking for a full-service package at an affordable rate.</p>
            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Full-day photo & video coverage</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Professional editing & color grading</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>One revision session</li>
            </ul>
            <div class="fw-bold display-6 mb-3 position-relative" style="color:#0d6efd;">Ksh 25,000</div>
            <a href="#" class="btn btn-primary rounded-pill mt-3 px-4 py-2 shadow-lg">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Gold Deal (Most Popular) -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="card border-0 shadow-lg h-100 text-center overflow-hidden position-relative highlight-card"
             style="border-radius: 1rem;">
          <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=700&q=80"
               class="card-img-top" alt="Gold Package" style="height:240px; object-fit:cover;">
          <div class="card-body p-4">
            <h5 class="fw-bold text-warning mt-3 fs-4">Gold Deal</h5>
            <p class="text-muted mt-2 mb-4">Our most popular option, offering extended coverage and enhanced creative direction.</p>
            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Two-day full media coverage</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Drone videography & cinematics</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Advanced editing & motion graphics</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Premium sound design</li>
            </ul>
            <div class="fw-bold display-6 mb-3 position-relative" style="color:#0d6efd;">Ksh 45,000</div>
            <a href="#" class="btn btn-warning rounded-pill mt-3 px-4 py-2 shadow-lg text-dark fw-bold">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Platinum Deal -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="card border-0 shadow-lg h-100 text-center overflow-hidden position-relative" style="border-radius: 1rem;">
          <img src="https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?auto=format&fit=crop&w=700&q=80"
               class="card-img-top" alt="Platinum Package" style="height:240px; object-fit:cover;">
          <div class="card-body p-4">
            <h5 class="fw-bold text-dark mt-3 fs-4">Platinum Elite</h5>
            <p class="text-muted mt-2 mb-4">For clients who want nothing short of perfection — luxury service from concept to final cut.</p>
            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Multi-day shoot & direction</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Drone & cinematic gear setup</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Personalized creative team</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Full brand strategy integration</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Priority delivery & lifetime access</li>
            </ul>
            <div class="fw-bold display-6 mb-3 position-relative" style="color:#0d6efd;">Ksh 70,000</div>
            <a href="#" class="btn btn-primary rounded-pill mt-3 px-4 py-2 shadow-lg">Book Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- === ABOUT SECTION === -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6" data-aos="fade-right">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=700&q=80"
             alt="About Premium Deals" class="img-fluid rounded-4 shadow-lg">
      </div>
      <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left">
        <h2 class="fw-bold mb-3 text-warning">Why Choose Our All-Inclusive Packages?</h2>
        <p class="text-muted mb-4">
          We merge luxury, technology, and storytelling to deliver seamless experiences. Every package is crafted to give you total satisfaction — no hidden costs, just pure excellence.
        </p>
        <ul class="list-unstyled">
          <li class="mb-2"><i class="bi bi-check-circle text-warning me-2"></i> End-to-end professional service</li>
          <li class="mb-2"><i class="bi bi-check-circle text-warning me-2"></i> Highly skilled creative experts</li>
          <li><i class="bi bi-check-circle text-warning me-2"></i> Transparent pricing & timely delivery</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- === CALL TO ACTION === -->
<section class="text-white text-center py-5"
         style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
         url('https://images.unsplash.com/photo-1526178613552-2d4b5e34c99b?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;">
  <div class="container" data-aos="zoom-in">
    <h2 class="fw-bold mb-3">Ready to Enjoy a Premium Experience?</h2>
    <p class="lead mb-4">Let’s craft your perfect all-inclusive deal today and make your vision a reality.</p>
    <a href="#packages" class="btn btn-warning btn-lg rounded-pill px-4 text-dark fw-bold">Get Started</a>
  </div>
</section>

<!-- === STYLES & JS === -->
<style>
  .highlight-card::after {
    content: "Most Popular";
    position: absolute; top: 15px; right: -45px;
    background: gold; color: #000; font-size: 0.8rem;
    font-weight: 700; transform: rotate(45deg);
    width: 160px; text-align: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
  }
  .card:hover { transform: translateY(-10px) scale(1.02); transition: 0.4s; }
</style>

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    AOS.init({ duration: 1200, once: true });
  });
</script>
@endsection
