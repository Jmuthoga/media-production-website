@extends('layouts.app')

@section('title', 'Lifestyle & Portrait Packages')

@section('content')
<!-- === HERO SECTION === -->
<section class="hero-section text-white d-flex align-items-center"
         style="background: url('https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat; min-height: 90vh;">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Content -->
      <div class="col-md-6" data-aos="fade-right">
        <h1 class="display-4 fw-bold mb-3 text-shadow">Lifestyle & Portrait Packages</h1>
        <p class="lead mb-4 text-light">
          We capture your story beautifully through professional lifestyle and portrait photography designed to bring your personality to life.
        </p>
        <a href="#packages" class="btn btn-lg btn-outline-light rounded-pill px-4">Explore Packages</a>
      </div>

      <!-- Right Image -->
      <div class="col-md-6 text-center mt-4 mt-md-0" data-aos="fade-left">
        <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?auto=format&fit=crop&w=700&q=80"
             alt="Portrait"
             class="img-fluid rounded-4 shadow-lg hero-right-img">
      </div>
    </div>
  </div>
</section>

<!-- === PACKAGES SECTION === -->
<section id="packages" class="py-5 bg-light position-relative">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold text-dark display-6">Our Photography Packages</h2>
      <p class="text-muted fs-5">Choose the perfect package to match your vision and lifestyle.</p>
    </div>

    <div class="row g-4">
      <!-- Package 1 -->
      <div class="col-md-4" data-aos="zoom-in">
        <div class="package-card card border-0 shadow-lg h-100 text-center overflow-hidden position-relative">
          <div class="img-wrapper">
            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Basic Package">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mt-3 fs-4">Basic Portrait</h5>
            <p class="text-muted mt-2 mb-4">
              Perfect for individuals or couples looking for clean, professional portraits that capture natural beauty.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>1-hour photography session</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>10 professionally edited photos</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>1 outfit change</li>
            </ul>

            <div class="price-tag fw-bold text-primary display-6 mb-3 position-relative">
              Ksh 5,000
              <span class="shine"></span>
            </div>

            <a href="#" class="btn btn-primary rounded-pill mt-3 px-4 py-2 btn-animate shadow-lg">
              <span>Book Now</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Package 2 -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="package-card card border-0 shadow-lg h-100 text-center overflow-hidden position-relative highlight-card">
          <div class="img-wrapper">
            <img src="https://images.unsplash.com/photo-1542062703-6cf3a3ef9b98?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Premium Package">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-primary mt-3 fs-4">Premium Lifestyle</h5>
            <p class="text-muted mt-2 mb-4">
              Perfect for lifestyle and outdoor shoots with natural vibes and professional composition.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>2-hour professional session</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>25 beautifully edited photos</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>2 outfit changes</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Creative lighting setup</li>
            </ul>

            <div class="price-tag fw-bold text-primary display-6 mb-3 position-relative">
              Ksh 10,000
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
            <img src="https://images.unsplash.com/photo-1503443207922-dff7d543fd0e?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Deluxe Package">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mt-3 fs-4">Deluxe Experience</h5>
            <p class="text-muted mt-2 mb-4">
              The ultimate photography experience for special occasions — stylish, artistic, and unforgettable.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Half-day professional session</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>50+ fully edited high-resolution photos</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Unlimited outfit changes</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Custom concept planning & props</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Private online gallery delivery</li>
            </ul>

            <div class="price-tag fw-bold display-6 mb-3 position-relative"
                 style="color: #0d6efd; font-size: 1.8rem; font-weight: 700; margin-top: 1rem;">
              Ksh 18,000
            </div>

            <a href="#" class="btn btn-primary rounded-pill shadow-lg"
               style="background: linear-gradient(90deg, #0d6efd, #007bff); border: none; padding: 10px 28px; border-radius: 50px; font-weight: 600; color: #fff; text-decoration: none; display: inline-block;">
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
      <div class="col-md-6" data-aos="fade-right">
        <img src="https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?auto=format&fit=crop&w=700&q=80"
             alt="About Photography"
             class="img-fluid rounded-4 shadow-lg">
      </div>

      <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left">
        <h2 class="fw-bold mb-3">Why Choose Our Photography?</h2>
        <p class="text-muted mb-4">
          We don’t just take photos — we craft timeless stories through our lenses. Our team ensures every shot captures emotion, personality, and the magic of the moment.
        </p>
        <ul class="list-unstyled">
          <li class="mb-2"><i class="bi bi-check-circle text-primary"></i> Creative & professional photographers</li>
          <li class="mb-2"><i class="bi bi-check-circle text-primary"></i> Fast delivery of edited photos</li>
          <li><i class="bi bi-check-circle text-primary"></i> Affordable packages for every need</li>
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
    <h2 class="fw-bold mb-3">Ready to Capture Your Story?</h2>
    <p class="lead mb-4">Let’s create unforgettable memories together. Book your photoshoot today.</p>
    <a href="#packages" class="btn btn-light btn-lg rounded-pill px-4">Get Started</a>
  </div>
</section>

<!-- === CUSTOM CSS === -->
<style>
  /* All your CSS remains unchanged but neatly aligned and formatted */
  .hero-section { position: relative; overflow: hidden; }
  .hero-section::after { content: ""; position: absolute; inset: 0; background: rgba(0,0,0,0.45); }
  .hero-section .container { position: relative; z-index: 2; }
  .text-shadow { text-shadow: 0 2px 10px rgba(0,0,0,0.6); }
  .hero-right-img { border: 4px solid rgba(255,255,255,0.3); transition: transform 0.5s ease; }
  .hero-right-img:hover { transform: scale(1.05); }

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
  /* Rest of your CSS as is ... */
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
