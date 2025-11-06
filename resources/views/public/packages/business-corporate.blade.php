@extends('layouts.app')

@section('title', 'Corporate & Brand Packages')

@section('content')
<!-- === HERO SECTION === -->
<section class="hero-section text-white d-flex align-items-center"
         style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)),
         url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat; min-height: 90vh;">
  <div class="container text-center" data-aos="fade-up">
    <h1 class="display-4 fw-bold mb-3 text-warning">Corporate & Brand Packages</h1>
    <p class="lead mb-4 text-light">
      Elevate your brand presence with stunning visuals and professional corporate storytelling.
    </p>
    <a href="#packages" class="btn btn-lg btn-warning rounded-pill px-4 py-2 shadow">Explore Packages</a>
  </div>
</section>

<!-- === PACKAGES SECTION === -->
<section id="packages" class="py-5 bg-light position-relative">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold text-dark display-6">Our Corporate Videography Packages</h2>
      <p class="text-muted fs-5">Choose a package that fits your company’s goals and vision.</p>
    </div>

    <div class="row g-4">
      <!-- Starter Package -->
      <div class="col-md-4" data-aos="zoom-in">
        <div class="card border-0 shadow-lg h-100 text-center overflow-hidden position-relative" style="border-radius: 1rem;">
          <img src="https://images.unsplash.com/photo-1581090700227-1e37b190418e?auto=format&fit=crop&w=700&q=80" 
               class="card-img-top" alt="Starter Package" style="height:240px; object-fit:cover;">
          <div class="card-body p-4">
            <h5 class="fw-bold text-dark mt-3 fs-4">Starter Corporate</h5>
            <p class="text-muted mt-2 mb-4">Ideal for startups or small businesses seeking professional visibility.</p>
            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>1-minute promo video</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Basic editing & transitions</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>1 shooting location</li>
            </ul>
            <div class="fw-bold display-6 mb-3 position-relative"
                 style="color:#0d6efd; font-size:1.8rem;">Ksh 12,000</div>
            <a href="#" class="btn btn-primary rounded-pill mt-3 px-4 py-2 shadow-lg">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Professional Package -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="card border-0 shadow-lg h-100 text-center overflow-hidden position-relative highlight-card"
             style="border-radius: 1rem;">
          <img src="https://images.unsplash.com/photo-1598257006460-640c0d7e5cde?auto=format&fit=crop&w=700&q=80"
               class="card-img-top" alt="Professional Package" style="height:240px; object-fit:cover;">
          <div class="card-body p-4">
            <h5 class="fw-bold text-primary mt-3 fs-4">Professional Brand Story</h5>
            <p class="text-muted mt-2 mb-4">Designed for established brands aiming to tell their story with elegance.</p>
            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>2–3 minute brand film</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Creative direction & scripting</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Professional lighting setup</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>High-quality post-production</li>
            </ul>
            <div class="fw-bold display-6 mb-3 position-relative"
                 style="color:#0d6efd; font-size:1.8rem;">Ksh 25,000</div>
            <a href="#" class="btn btn-primary rounded-pill mt-3 px-4 py-2 shadow-lg">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Executive Package -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="card border-0 shadow-lg h-100 text-center overflow-hidden position-relative" style="border-radius: 1rem;">
          <img src="https://images.unsplash.com/photo-1560264280-88b68371db39?auto=format&fit=crop&w=700&q=80"
               class="card-img-top" alt="Executive Package" style="height:240px; object-fit:cover;">
          <div class="card-body p-4">
            <h5 class="fw-bold text-dark mt-3 fs-4">Executive Excellence</h5>
            <p class="text-muted mt-2 mb-4">Premium coverage crafted for high-end brands and corporate campaigns.</p>
            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Full-day shoot with crew</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Drone aerial footage</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Professional voice-over</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Brand-focused storytelling</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Multiple revisions & final polish</li>
            </ul>
            <div class="fw-bold display-6 mb-3 position-relative"
                 style="color:#0d6efd; font-size:1.8rem;">Ksh 40,000</div>
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
        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=700&q=80"
             alt="Corporate Filming" class="img-fluid rounded-4 shadow-lg">
      </div>
      <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left">
        <h2 class="fw-bold mb-3">Why Choose Our Corporate Videography?</h2>
        <p class="text-muted mb-4">
          We specialize in capturing your brand’s story with precision, style, and impact. Our team ensures that every frame reflects your identity and professionalism.
        </p>
        <ul class="list-unstyled">
          <li class="mb-2"><i class="bi bi-check-circle text-primary"></i> Corporate-grade production quality</li>
          <li class="mb-2"><i class="bi bi-check-circle text-primary"></i> Expert branding consultation</li>
          <li><i class="bi bi-check-circle text-primary"></i> Fast turnaround & revisions</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- === CALL TO ACTION SECTION === -->
<section class="text-white text-center py-5"
         style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
         url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;">
  <div class="container" data-aos="zoom-in">
    <h2 class="fw-bold mb-3">Ready to Tell Your Brand Story?</h2>
    <p class="lead mb-4">Let’s create a cinematic experience that elevates your company identity.</p>
    <a href="#packages" class="btn btn-warning btn-lg rounded-pill px-4">Get Started</a>
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
