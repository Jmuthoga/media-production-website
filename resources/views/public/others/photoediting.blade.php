@extends('layouts.app')

@section('title', 'Photo Editing & Retouching')

@section('content')

<!-- =====================================================
     HERO SECTION — PHOTO EDITING
===================================================== -->
<section class="hero-section position-relative overflow-hidden">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- LEFT SIDE: Text & CTA -->
      <div class="col-lg-6 text-center text-lg-start text-light hero-left">
        <h1 class="hero-title display-3 fw-bold mb-3 reveal">Professional Photo Editing & Retouching</h1>
        <p class="hero-subtitle lead mb-4 reveal">Transform your raw images into stunning visuals with our advanced editing and retouching services.</p>
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg hero-btn reveal">Get Started</a>
      </div>

      <!-- RIGHT SIDE: Background Image with Overlay -->
      <div class="col-lg-6 hero-img-wrapper mt-4 mt-lg-0">
        <div class="hero-img reveal"></div>
        <div class="hero-img-overlay"></div>
      </div>

    </div>
  </div>
</section>

<!-- =====================================================
     SERVICES / FEATURES
===================================================== -->
<section class="services-section py-5 bg-light">
  <div class="container">
    <h2 class="text-center display-5 mb-5 reveal">Our Photo Editing Services</h2>

    @php
      $services = [
        ['name'=>'Color Correction','desc'=>'Enhance colors and vibrancy for professional-grade photos','icon'=>'fas fa-palette'],
        ['name'=>'Skin Retouching','desc'=>'Flawless skin retouching while preserving natural texture','icon'=>'fas fa-smile'],
        ['name'=>'Background Removal','desc'=>'Remove or replace backgrounds seamlessly','icon'=>'fas fa-cut'],
        ['name'=>'Image Enhancement','desc'=>'Improve sharpness, lighting, and details','icon'=>'fas fa-camera-retro'],
        ['name'=>'Object Removal','desc'=>'Remove unwanted elements from your images','icon'=>'fas fa-times-circle'],
        ['name'=>'Photo Manipulation','desc'=>'Creative photo manipulation for marketing and art','icon'=>'fas fa-magic']
      ];
    @endphp

    <div class="row g-4">
      @foreach($services as $service)
        <div class="col-md-4">
          <div class="service-card p-4 text-center shadow-sm rounded reveal">
            <div class="service-icon mb-3 text-primary">
              <i class="{{ $service['icon'] }} fa-2x"></i>
            </div>
            <h4 class="mb-2">{{ $service['name'] }}</h4>
            <p class="text-muted">{{ $service['desc'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- =====================================================
     BEFORE / AFTER INTERACTIVE SLIDER
===================================================== -->
<section class="before-after-section py-5 text-light bg-dark position-relative">
  <div class="container">
    <h2 class="text-center display-5 text-primary mb-5 reveal">Before & After Editing</h2>

    <div class="ba-slider reveal mx-auto">
      <div class="ba-before">
        <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=600&q=80" alt="Before Photo">
      </div>
      <div class="ba-after">
        <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=600&q=80" alt="After Photo">
      </div>
      <div class="ba-handle"></div>
    </div>
  </div>
</section>

<!-- =====================================================
     PHOTO GALLERY
===================================================== -->
<section class="gallery-section py-5 bg-light">
  <div class="container">
    <h2 class="text-center display-5 mb-5 reveal">Our Editing Portfolio</h2>
    <div class="row g-4">
      @php
        $gallery = [
          'https://images.unsplash.com/photo-1518976024611-36f0dc60f74c?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=800&q=80'
        ];
      @endphp

      @foreach($gallery as $img)
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="gallery-card reveal">
            <img src="{{ $img }}" alt="Edited Photo" class="img-fluid rounded shadow-sm hover-zoom gallery-img">
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- =====================================================
     WORKFLOW / PROCESS — MODERN CIRCULAR DESIGN
===================================================== -->
<section class="workflow-section py-5 bg-dark text-light position-relative">
  <div class="container position-relative">
    <h2 class="text-center display-5 text-primary mb-5 reveal">Our Editing Workflow</h2>

    <div class="workflow-line"></div>

    <div class="row g-4 justify-content-center text-center">
      @php
        $workflow = [
          ['step'=>'1','title'=>'Upload Photos','desc'=>'Send us your raw images securely via cloud or email.'],
          ['step'=>'2','title'=>'Editing & Retouching','desc'=>'We apply advanced color correction, enhancement, and retouching.'],
          ['step'=>'3','title'=>'Review & Feedback','desc'=>'Preview your edits, request revisions, and approve the final look.'],
          ['step'=>'4','title'=>'Final Delivery','desc'=>'Receive your high-resolution, ready-to-use images instantly.']
        ];
      @endphp

      @foreach($workflow as $step)
        <div class="col-md-3 col-sm-6">
          <div class="workflow-card reveal">
            <div class="workflow-step">
              <span>{{ $step['step'] }}</span>
            </div>
            <h5 class="mt-3 text-light">{{ $step['title'] }}</h5>
            <p class="text-muted small">{{ $step['desc'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- =====================================================
     TESTIMONIALS
===================================================== -->
<section class="testimonial-section py-5 bg-light">
  <div class="container">
    <h2 class="text-center display-5 mb-5 reveal">Client Testimonials</h2>
    <div class="row g-4">
      @php
        $testimonials = [
          ['name'=>'Sarah K.','role'=>'Wedding Photographer','img'=>'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=80&q=80','msg'=>'Absolutely amazing retouching! My photos looked perfect for my wedding album.'],
          ['name'=>'James M.','role'=>'Marketing Manager','img'=>'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=80&q=80','msg'=>'High-quality editing that elevated our marketing visuals instantly.'],
          ['name'=>'Linda O.','role'=>'Fashion Blogger','img'=>'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=80&q=80','msg'=>'I loved the skin retouching! Subtle yet perfect, very professional service.']
        ];
      @endphp
      @foreach($testimonials as $t)
        <div class="col-md-4">
          <div class="testimonial-card p-4 text-center rounded shadow-sm reveal">
            <img src="{{ $t['img'] }}" alt="{{ $t['name'] }}" class="rounded-circle mb-3" width="80" height="80">
            <h5>{{ $t['name'] }}</h5>
            <p class="text-muted"><em>{{ $t['role'] }}</em></p>
            <p>"{{ $t['msg'] }}"</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- =====================================================
     CTA / BOOK NOW
===================================================== -->
<section class="cta-section py-5 text-center bg-dark text-light">
  <div class="container reveal">
    <h2 class="display-4 text-primary mb-4">Transform Your Photos Today</h2>
    <p class="mb-4">Get high-quality professional photo editing and retouching for your personal or business projects.</p>
    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Book Your Session</a>
  </div>
</section>

<!-- =====================================================
     STYLES
===================================================== -->
<style>
:root {
  --primary-color: #0d6efd;
  --accent-color: #f5c542;
  --secondary-color: #00f5ff;
  --highlight-color: #ff4d6d;
  --text-dark: #1a1a1a;
  --text-light: #f8f9fa;
  --shadow-dark: 0 8px 40px rgba(0,0,0,0.3);
  --glow-primary: 0 0 15px var(--primary-color), 0 0 30px var(--primary-color);
  --transition-fast: 0.3s ease;
}

/* =====================================================
   HERO SECTION LAYOUT
===================================================== */
.hero-section {
  position: relative;
  background-image: url('https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?auto=format&fit=crop&w=1600&q=80');
  background-size: cover;        /* Cover entire section */
  background-position: center;   /* Center the image */
  background-repeat: no-repeat;
  min-height: 600px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  overflow: hidden;
}

/* LEFT SIDE */
.hero-left {
  z-index: 2;
}
.hero-title {
  text-shadow: 2px 2px 15px var(--primary-color);
  animation: slideDown 1.2s ease forwards;
  opacity: 0;
}
.hero-subtitle {
  text-shadow: 1px 1px 10px #000;
  animation: fadeIn 1.5s ease forwards;
  opacity: 0;
}
.hero-btn {
  transition: all var(--transition-fast);
  box-shadow: 0 0 0px transparent;
}
.hero-btn:hover {
  transform: scale(1.1);
  box-shadow: var(--glow-primary);
}

/* RIGHT SIDE: IMAGE */
.hero-img-wrapper {
  position: relative;
  height: 400px;
  border-radius: 1rem;
  overflow: hidden;
}
.hero-img {
  width: 100%;
  height: 100%;
  background-image: url('https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?auto=format&fit=crop&w=800&q=80');
  background-size: cover;
  background-position: center;
  transition: transform 0.6s ease, filter 0.6s ease;
}
.hero-img:hover {
  transform: scale(1.05);
  filter: brightness(1.05);
}
.hero-img-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom right, rgba(13,110,253,0.4), rgba(0,0,0,0.6));
  pointer-events: none;
  mix-blend-mode: overlay;
}

/* RESPONSIVE */
@media (max-width: 991px) {
  .hero-left { text-align: center !important; }
  .hero-img-wrapper { height: 300px; margin-top: 2rem; }
}
@media (max-width: 576px) {
  .hero-title { font-size: 2rem; }
}

.gallery-card {
  overflow: hidden;
  border-radius: 12px;
  height: 250px; /* Equal height for all cards */
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.5s ease, box-shadow 0.5s ease;
  background: #000; /* fallback */
}
.gallery-card img.gallery-img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Ensures all images fill card equally */
  transition: transform 0.5s ease, filter 0.5s ease;
}
.gallery-card:hover img.gallery-img {
  transform: scale(1.1);
  filter: brightness(1.1);
}

.before-after-section {
  position: relative;
  overflow: hidden;
}

.ba-slider {
  position: relative;
  max-width: 700px; /* Limits the width */
  height: 400px; /* Fixed height for neat layout */
  margin: 0 auto;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.ba-slider img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Ensures image fills container without distortion */
  display: block;
}

.ba-before, .ba-after {
  position: absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
}

.ba-after {
  clip-path: inset(0 50% 0 0); /* Starts with 50% visible */
  transition: clip-path 0.3s ease;
}

.ba-handle {
  position: absolute;
  top:0;
  left:50%;
  transform: translateX(-50%);
  width: 6px;
  height: 100%;
  background: #0d6efd; /* Bootstrap primary color */
  cursor: ew-resize;
  box-shadow: 0 0 10px #0d6efd, 0 0 20px #0d6efd;
  transition: left 0.2s ease;
  border-radius: 3px;
}

@media (max-width:768px){
  .ba-slider {
    height: 300px;
  }
}

@media (max-width:576px){
  .ba-slider {
    height: 250px;
  }
}

.before-after-section {
  position: relative;
  overflow: hidden;
}

.ba-slider {
  position: relative;
  max-width: 700px; /* Limits the width */
  height: 400px; /* Fixed height for neat layout */
  margin: 0 auto;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.ba-slider img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Ensures image fills container without distortion */
  display: block;
}

.ba-before, .ba-after {
  position: absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
}

.ba-after {
  clip-path: inset(0 50% 0 0); /* Starts with 50% visible */
  transition: clip-path 0.3s ease;
}

.ba-handle {
  position: absolute;
  top:0;
  left:50%;
  transform: translateX(-50%);
  width: 6px;
  height: 100%;
  background: #0d6efd; /* Bootstrap primary color */
  cursor: ew-resize;
  box-shadow: 0 0 10px #0d6efd, 0 0 20px #0d6efd;
  transition: left 0.2s ease;
  border-radius: 3px;
}

@media (max-width:768px){
  .ba-slider {
    height: 300px;
  }
}

@media (max-width:576px){
  .ba-slider {
    height: 250px;
  }
}


.workflow-section {
  position: relative;
  overflow: hidden;
  padding-top: 100px;
  padding-bottom: 100px;
}

/* Connecting line */
.workflow-line {
  position: absolute;
  top: 180px;
  left: 50%;
  transform: translateX(-50%);
  width: 80%;
  height: 3px;
  background: rgba(13, 110, 253, 0.3);
  border-radius: 10px;
  z-index: 0;
}

/* Each step card */
.workflow-card {
  position: relative;
  z-index: 1;
  background: transparent;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.workflow-card:hover {
  transform: translateY(-8px);
}

/* The circular step number */
.workflow-step {
  width: 100px;
  height: 100px;
  background: var(--bs-primary);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 auto;
  color: #fff;
  font-size: 2rem;
  font-weight: 700;
  box-shadow: 0 0 20px rgba(13, 110, 253, 0.7), inset 0 0 20px rgba(255,255,255,0.1);
  transition: all 0.3s ease;
  position: relative;
}

.workflow-step::after {
  content: "";
  position: absolute;
  top: 50%;
  right: -80px;
  transform: translateY(-50%);
  width: 70px;
  height: 3px;
  background: rgba(13, 110, 253, 0.4);
}

.workflow-card:last-child .workflow-step::after {
  display: none;
}

/* Glow animation */
.workflow-step:hover {
  box-shadow: 0 0 40px rgba(13, 110, 253, 0.9), inset 0 0 25px rgba(255,255,255,0.2);
  transform: scale(1.1);
}

/* Responsive layout */
@media (max-width: 991px) {
  .workflow-line { display: none; }
  .workflow-step::after { display: none; }
}

@media (max-width: 576px) {
  .workflow-step {
    width: 80px;
    height: 80px;
    font-size: 1.5rem;
  }
}

/* Reveal animation */
.reveal { opacity:0; transform:translateY(30px); transition: all 0.8s ease; }
.reveal.active { opacity:1; transform:translateY(0); }
/* =====================================================
   GLOBAL ANIMATIONS
===================================================== */
@keyframes slideDown { from {opacity:0; transform:translateY(-50px);} to {opacity:1; transform:translateY(0);} }
@keyframes fadeIn { from {opacity:0;} to {opacity:1;} }

.reveal { opacity:0; transform: translateY(30px); transition: all 0.8s ease; }
.reveal.active { opacity:1; transform: translateY(0); }

.service-card, .workflow-card, .testimonial-card, .gallery-card { border-radius: var(--radius-md); transition: all 0.5s ease; }
.service-card:hover, .workflow-card:hover, .testimonial-card:hover { transform: translateY(-10px); box-shadow: var(--glow-primary); }
.service-card .service-icon { transition: all 0.5s ease; }
.service-card:hover .service-icon { transform: scale(1.2); }

.ba-slider { position: relative; overflow: hidden; cursor: ew-resize; max-width:800px; margin:0 auto; border-radius: var(--radius-md); box-shadow: var(--shadow-dark); }
.ba-handle { width:6px;height:100%;background: var(--primary-color);position:absolute;top:0;left:50%;transform:translateX(-50%);box-shadow: var(--glow-primary);cursor:ew-resize;transition:left 0.2s ease; }

.reveal { opacity:0; transform:translateY(30px); transition: all 0.8s ease; }
.reveal.active { opacity:1; transform:translateY(0); }
.hover-zoom { transition: transform 0.6s ease; }
.hover-zoom:hover { transform: scale(1.05); }

@keyframes fadeInPage { from {opacity:0; transform:translateY(20px);} to {opacity:1; transform:translateY(0);} }
@keyframes slideDown { from {opacity:0; transform:translateY(-30px);} to {opacity:1; transform:translateY(0);} }
@keyframes fadeIn { from {opacity:0;} to {opacity:1;} }
</style>

<!-- =====================================================
     INTERACTIONS JS
===================================================== -->
<script>
document.addEventListener('scroll', () => {
  document.querySelectorAll('.reveal').forEach(el => {
    if(el.getBoundingClientRect().top < window.innerHeight - 100){
      el.classList.add('active');
    }
  });
});

const slider = document.querySelector('.ba-slider');
if(slider){
  const before = slider.querySelector('.ba-before');
  const after = slider.querySelector('.ba-after');
  const handle = slider.querySelector('.ba-handle');
  let isDragging = false;

  const move = (x) => {
    const rect = slider.getBoundingClientRect();
    let offsetX = x - rect.left;
    offsetX = Math.max(0, Math.min(offsetX, rect.width));
    handle.style.left = offsetX + 'px';
    after.style.clipPath = `inset(0 ${rect.width - offsetX}px 0 0)`;
  }

  handle.addEventListener('mousedown', () => isDragging=true);
  window.addEventListener('mouseup', () => isDragging=false);
  window.addEventListener('mousemove', e => { if(isDragging) move(e.clientX); });
}

document.addEventListener('scroll', () => {
  document.querySelectorAll('.reveal').forEach(el => {
    if(el.getBoundingClientRect().top < window.innerHeight - 100){
      el.classList.add('active');
    }
  });
});

</script>

@endsection

