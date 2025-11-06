@extends('layouts.app')

@section('title', 'Family & Group Packages')

@section('content')
<!-- === HERO SECTION === -->
<section class="hero-section text-white d-flex align-items-center"
         style="background: url('https://images.unsplash.com/photo-1606787366850-de6330128bfc?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat; min-height: 90vh;">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Content -->
      <div class="col-md-6" data-aos="fade-right">
        <h1 class="display-4 fw-bold mb-3 text-shadow">Family & Group Packages</h1>
        <p class="lead mb-4 text-light">
          Celebrate your loved ones with warm, joyful, and authentic family photography sessions — capturing every shared smile and bond.
        </p>
        <a href="#packages" class="btn btn-lg btn-outline-light rounded-pill px-4">Explore Packages</a>
      </div>

      <!-- Right Image -->
      <div class="col-md-6 text-center mt-4 mt-md-0" data-aos="fade-left">
        <img src="https://images.unsplash.com/photo-1606787366850-de6330128bfc?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat; min-height: 90vh;"
             alt="Family Group"
             class="img-fluid rounded-4 shadow-lg hero-right-img">
      </div>
    </div>
  </div>
</section>

<!-- === PACKAGES SECTION === -->
<section id="packages" class="py-5 bg-light position-relative">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold text-dark display-6">Our Family & Group Packages</h2>
      <p class="text-muted fs-5">Capture precious family moments that last a lifetime.</p>
    </div>

    <div class="row g-4">
      <!-- Package 1 -->
      <div class="col-md-4" data-aos="zoom-in">
        <div class="package-card card border-0 shadow-lg h-100 text-center overflow-hidden position-relative">
          <div class="img-wrapper">
            <img src="https://images.unsplash.com/photo-1504151932400-72d4384f04b3?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Basic Family Package">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mt-3 fs-4">Classic Family</h5>
            <p class="text-muted mt-2 mb-4">
              Ideal for small families looking to capture warm, relaxed portraits in a natural setting.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>1-hour outdoor session</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>10 professionally edited photos</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>1 outfit change</li>
            </ul>

            <div class="price-tag fw-bold text-info display-6 mb-3 position-relative">
              Ksh 6,000
              <span class="shine"></span>
            </div>

            <a href="#" class="btn btn-info rounded-pill mt-3 px-4 py-2 btn-animate shadow-lg">
              <span>Book Now</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Package 2 -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="package-card card border-0 shadow-lg h-100 text-center overflow-hidden position-relative highlight-card">
          <div class="img-wrapper">
            <img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Premium Family Package">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-info mt-3 fs-4">Premium Group</h5>
            <p class="text-muted mt-2 mb-4">
              Designed for larger families or friend groups who want vibrant, candid photos full of laughter and love.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>2-hour professional session</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>25 professionally edited photos</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>2 outfit changes</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Outdoor or studio options</li>
            </ul>

            <div class="price-tag fw-bold text-info display-6 mb-3 position-relative">
              Ksh 12,000
              <span class="shine"></span>
            </div>

            <a href="#" class="btn btn-info rounded-pill mt-3 px-4 py-2 btn-animate shadow-lg">
              <span>Book Now</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Package 3 -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="package-card card border-0 shadow-lg h-100 text-center overflow-hidden position-relative">
          <div class="img-wrapper">
            <img src="https://images.unsplash.com/photo-1606788075761-838b62ebd06e?auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="Deluxe Group Package">
          </div>

          <div class="card-body p-4">
            <h5 class="card-title fw-bold text-dark mt-3 fs-4">Deluxe Family Experience</h5>
            <p class="text-muted mt-2 mb-4">
              A complete family storytelling session — perfect for milestone celebrations or holiday memories.
            </p>

            <ul class="list-unstyled text-start text-muted px-3 mb-4">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Half-day session</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>50+ edited high-res photos</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Unlimited outfit changes</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Props & creative direction</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i>Private gallery delivery</li>
            </ul>

            <div class="price-tag fw-bold text-info display-6 mb-3 position-relative">
              Ksh 18,000
            </div>

            <a href="#" class="btn btn-info rounded-pill shadow-lg px-4 py-2">
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

      <!-- Left Image -->
      <div class="col-md-6 text-center" data-aos="fade-right">
        <img 
          src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?auto=format&fit=crop&w=700&q=80"
          alt="About Family Photography"
          class="img-fluid rounded-4 shadow-lg"
          style="
            max-width: 80%;
            max-height: 380px;
            object-fit: cover;
            border: 5px solid rgba(0,0,0,0.05);
            transition: transform 0.5s ease;
            cursor: pointer;"
          onmouseover="this.style.transform='scale(1.05)';"
          onmouseout="this.style.transform='scale(1)';">
      </div>

      <!-- Right Text -->
      <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left">
        <h2 class="fw-bold mb-3 text-info">Why Choose Our Family Photography?</h2>
        <p class="text-muted mb-4 fs-5">
          Our mission is to turn everyday family moments into timeless memories — filled with smiles, laughter, and togetherness.
        </p>
        <ul class="list-unstyled fs-5">
          <li class="mb-2"><i class="bi bi-check-circle text-info me-2"></i> Friendly and patient photographers</li>
          <li class="mb-2"><i class="bi bi-check-circle text-info me-2"></i> Comfortable, relaxed environment</li>
          <li><i class="bi bi-check-circle text-info me-2"></i> High-quality prints and digital albums</li>
        </ul>
      </div>

    </div>
  </div>
</section>



<!-- === CTA SECTION === -->
<section class="cta-section text-white text-center py-5"
         style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
         url('https://images.unsplash.com/photo-1504151932400-72d4384f04b3?auto=format&fit=crop&w=700&q=80') center/cover no-repeat;">
  <div class="container" data-aos="zoom-in">
    <h2 class="fw-bold mb-3">Make Every Family Moment Count</h2>
    <p class="lead mb-4">Book a family or group session today and preserve your special memories beautifully.</p>
    <a href="#packages" class="btn btn-light btn-lg rounded-pill px-4">Book Your Session</a>
  </div>
</section>

<!-- === SAME STYLING & JS === -->
<style>
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
</style>

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    AOS.init({ duration: 1200, once: true });
  });
</script>
@endsection
