@extends('layouts.app')

@section('title', 'Social Media Videography')

@section('content')
<!-- === HERO SECTION === -->
<section class="text-center text-white d-flex align-items-center justify-content-center"
         style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.6)),
                url('https://images.unsplash.com/photo-1611262588024-d12430b98920?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
                height: 70vh;">
  <div data-aos="zoom-in" data-aos-duration="1000">
    <h1 class="fw-bold display-4 mb-3 text-warning">Social Media Videography</h1>
    <p class="lead">Create viral, cinematic videos that stand out on TikTok, YouTube & Instagram.</p>
    <a href="#packages" class="btn btn-warning btn-lg rounded-pill shadow mt-3 px-4 py-2 btn-animate">Explore Packages</a>
  </div>
</section>

<!-- === ABOUT SECTION === -->
<section id="about" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <!-- Video or Image -->
      <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
        <img src="https://images.unsplash.com/photo-1611262588024-d12430b98920?auto=format&fit=crop&w=1600&q=80"
             alt="Videography setup"
             class="img-fluid rounded-4 shadow-lg"
             style="max-width: 80%; height: 350px; object-fit: cover; transition: transform 0.5s ease;"
             onmouseover="this.style.transform='scale(1.05)';"
             onmouseout="this.style.transform='scale(1)';">
      </div>

      <!-- About Text -->
      <div class="col-md-6" data-aos="fade-left">
        <h2 class="fw-bold text-success mb-3">Bring Your Social Media to Life</h2>
        <p class="text-muted mb-4 fs-5">
          We help brands, influencers, and creators produce captivating videos — from short-form TikToks to cinematic YouTube intros. Every clip is shot, edited, and color-graded for maximum impact and engagement.
        </p>
        <ul class="list-unstyled fs-5">
          <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> 4K & 1080p professional video quality</li>
          <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Storyboarding and creative direction</li>
          <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Engaging social media optimization</li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i> Fast delivery and unlimited revisions (Premium)</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- === PACKAGES SECTION === -->
<section id="packages" class="py-5">
  <div class="container text-center">
    <h2 class="fw-bold text-success mb-4" data-aos="fade-up">Our Videography Packages</h2>
    <p class="text-muted mb-5" data-aos="fade-up" data-aos-delay="100">
      Choose a plan that matches your social media goals — whether you’re a beginner or a brand.
    </p>

    <div class="row g-4">
      <!-- Basic -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="card border-0 shadow-lg rounded-4 p-4 h-100">
          <h4 class="fw-bold mb-3 text-success">Starter</h4>
          <div class="price-tag fw-bold text-primary display-6 mb-3 position-relative" style="color:#198754;">
            Ksh 8,000
            <span class="shine"></span>
          </div>
          <ul class="list-unstyled text-start mb-4">
            <li><i class="bi bi-check2 text-success me-2"></i> 2 short videos (30s each)</li>
            <li><i class="bi bi-check2 text-success me-2"></i> Basic color correction</li>
            <li><i class="bi bi-check2 text-success me-2"></i> Vertical format (TikTok/Instagram)</li>
          </ul>
          <a href="#" class="btn btn-success rounded-pill mt-auto px-4 py-2 btn-animate shadow">Book Now</a>
        </div>
      </div>

      <!-- Popular -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="card border-0 shadow-lg rounded-4 p-4 h-100 position-relative" style="background:linear-gradient(135deg, gold, #ffda6a); color:#000;">
          <div class="position-absolute top-0 end-0 m-2 badge bg-dark text-warning px-3 py-2 rounded-pill">Most Popular</div>
          <h4 class="fw-bold mb-3">Creator Pro</h4>
          <div class="price-tag fw-bold display-6 mb-3 position-relative" style="color:#000;">
            Ksh 18,000
            <span class="shine"></span>
          </div>
          <ul class="list-unstyled text-start mb-4">
            <li><i class="bi bi-check2 text-dark me-2"></i> 5 videos (up to 1 min each)</li>
            <li><i class="bi bi-check2 text-dark me-2"></i> Cinematic transitions</li>
            <li><i class="bi bi-check2 text-dark me-2"></i> Background music & captions</li>
            <li><i class="bi bi-check2 text-dark me-2"></i> YouTube & TikTok optimization</li>
          </ul>
          <a href="#" class="btn btn-dark rounded-pill mt-auto px-4 py-2 btn-animate shadow">Book Now</a>
        </div>
      </div>

      <!-- Premium -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
        <div class="card border-0 shadow-lg rounded-4 p-4 h-100">
          <h4 class="fw-bold mb-3 text-success">Elite Studio</h4>
          <div class="price-tag fw-bold text-primary display-6 mb-3 position-relative" style="color:#198754;">
            Ksh 30,000
            <span class="shine"></span>
          </div>
          <ul class="list-unstyled text-start mb-4">
            <li><i class="bi bi-check2 text-success me-2"></i> 10 high-end cinematic videos</li>
            <li><i class="bi bi-check2 text-success me-2"></i> On-location filming (up to 2 days)</li>
            <li><i class="bi bi-check2 text-success me-2"></i> Custom lighting & drone footage</li>
            <li><i class="bi bi-check2 text-success me-2"></i> Full post-production edit</li>
          </ul>
          <a href="#" class="btn btn-success rounded-pill mt-auto px-4 py-2 btn-animate shadow">Book Now</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- === CTA SECTION === -->
<section class="py-5 text-center text-white"
         style="background: linear-gradient(90deg, #198754, #0d6efd);">
  <div class="container" data-aos="fade-up">
    <h2 class="fw-bold mb-3">Ready to Go Viral?</h2>
    <p class="lead mb-4">Let’s create content that turns viewers into fans and fans into followers.</p>
    <a href="#" class="btn btn-light rounded-pill px-4 py-2 btn-animate shadow">Get Started Today</a>
  </div>
</section>

<!-- Simple Shine Animation -->
<style>
.shine {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: linear-gradient(120deg, transparent, rgba(255,255,255,0.6), transparent);
  transform: translateX(-100%);
  animation: shineMove 2s infinite linear;
}
@keyframes shineMove {
  0% { transform: translateX(-100%); }
  100% { transform: translateX(100%); }
}
.btn-animate:hover {
  transform: scale(1.05);
  transition: all 0.3s ease;
}
</style>
@endsection
