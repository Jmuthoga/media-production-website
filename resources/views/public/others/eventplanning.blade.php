@extends('layouts.app')

@section('title', 'Event Planning Support')

@section('content')
<!-- =======================================================
     UNIMAX EVENTS — EVENT PLANNING SUPPORT PAGE
     THEME: Classic Blue (Bootstrap Default) + Gold Accents
     Author: John Muthoga
========================================================== -->

<style>
/* =====================================================
   GLOBAL STYLES & THEME VARIABLES
===================================================== */
:root {
  --primary-color: #0d6efd;
  --accent-color: #f5c542;
  --text-dark: #1a1a1a;
  --bg-light: #f8f9fa;
  --transition-fast: 0.3s ease;
}

/* Page entry fade */
body {
  animation: fadeInPage 1.5s ease forwards;
  opacity: 0;
}
@keyframes fadeInPage {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* =====================================================
   HERO SECTION — LEFT-RIGHT LAYOUT
===================================================== */
.hero-section {
  position: relative;
  width: 100%;
  min-height: 90vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  background: linear-gradient(to bottom right, rgba(0,0,0,0.6), rgba(13,110,253,0.6));
  color: #fff;
}

/* Overlay for better text readability */
.hero-section::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom right, rgba(13,110,253,0.5), rgba(0,0,0,0.7));
  z-index: 1;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.6), rgba(0,0,0,0.1));
  z-index: 1;
}

.hero-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  margin: 0 auto;
  z-index: 2;
  position: relative;
  padding: 0 20px;
  gap: 40px;
}

.hero-left {
  flex: 1;
  max-width: 600px;
}

.hero-left h1 {
  font-size: 3rem;
  font-weight: 700;
  color: var(--accent-color);
  margin-bottom: 20px;
  animation: slideDown 1.2s ease-out;
}

.hero-left p {
  font-size: 1.2rem;
  color: #eee;
  margin-bottom: 30px;
  animation: fadeIn 2s ease;
}

.hero-btn {
  background-color: var(--accent-color);
  color: #000;
  border: none;
  padding: 12px 28px;
  border-radius: 50px;
  font-weight: 600;
  transition: all var(--transition-fast);
  animation: pulseBtn 2s infinite;
}
.hero-btn:hover {
  background-color: #fff;
  color: var(--primary-color);
  transform: scale(1.05);
}

.hero-right {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

.hero-right img {
  width: 100%;
  max-width: 500px;
  border-radius: 16px;
  object-fit: cover;
  box-shadow: 0 12px 28px rgba(0,0,0,0.25);
  animation: fadeIn 2s ease;
}

/* Keyframes */
@keyframes slideDown {
  from { opacity: 0; transform: translateY(-40px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
@keyframes pulseBtn {
  0%,100% { box-shadow: 0 0 0 0 rgba(245,197,66,0.6); }
  50% { box-shadow: 0 0 0 10px rgba(245,197,66,0); }
}

/* Responsive Hero */
@media (max-width: 992px) {
  .hero-container {
    flex-direction: column-reverse;
    text-align: center;
  }
  .hero-left h1 { font-size: 2.5rem; }
  .hero-left p { font-size: 1rem; }
  .hero-right img { max-width: 90%; margin-bottom: 30px; }
}
@media (max-width: 576px) {
  .hero-left h1 { font-size: 2rem; }
}

/* =====================================================
   EVENT SUPPORT SECTION
===================================================== */
.support-section {
  background-color: var(--bg-light);
  padding: 100px 0;
}

.support-title {
  text-align: center;
  margin-bottom: 60px;
}

.support-title h2 {
  color: var(--primary-color);
  font-weight: 700;
}

.support-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
  padding: 0 20px;
}

.support-card {
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.1);
  width: calc(25% - 30px);
  min-width: 250px;
  overflow: hidden;
  position: relative;
  transition: transform var(--transition-fast), box-shadow var(--transition-fast);
  text-align: center;
  padding: 20px;
}
.support-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 16px 24px rgba(0,0,0,0.15);
}
.support-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 12px;
  transition: transform 0.5s ease;
}
.support-card:hover img {
  transform: scale(1.05);
}
.support-card h4 {
  color: var(--primary-color);
  font-weight: 600;
  margin-top: 15px;
}
.support-card p { color: #444; font-size: 0.95rem; margin-top: 10px; }

/* Responsive Grid */
@media (max-width: 992px) { .support-card { width: calc(33.333% - 20px); } }
@media (max-width: 768px) { .support-card { width: calc(50% - 20px); } }
@media (max-width: 576px) { .support-card { width: 100%; } }

/* =====================================================
   ADDITIONAL VISUALS
===================================================== */
.text-shadow { text-shadow: 0 4px 10px rgba(0,0,0,0.5); }
::-webkit-scrollbar { width: 8px; }
::-webkit-scrollbar-thumb { background: var(--primary-color); border-radius: 4px; }
::-webkit-scrollbar-thumb:hover { background: var(--accent-color); }

/* =====================================================
   BRANDING SECTION — VISUALS
===================================================== */
.branding-section {
  position: relative;
  background: linear-gradient(135deg, #0d6efd, #6610f2, #f5c542);
  color: #fff;
  padding: 120px 20px 80px;
  overflow: hidden;
  text-align: center;
}

.branding-overlay {
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at center, rgba(255,255,255,0.05), transparent 70%);
  z-index: 1;
}

.branding-container {
  position: relative;
  z-index: 2;
  max-width: 1200px;
  margin: 0 auto;
}

.branding-title {
  font-size: 3rem;
  font-weight: 800;
  margin-bottom: 20px;
  text-transform: uppercase;
  text-shadow: 0 4px 20px rgba(0,0,0,0.5);
  animation: fadeInUp 1.5s ease forwards;
}

.branding-subtitle {
  font-size: 1.2rem;
  margin-bottom: 50px;
  opacity: 0.9;
  animation: fadeInUp 1.8s ease forwards;
}

.branding-logos {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 40px;
  margin-bottom: 50px;
}

.brand-logo {
  background: rgba(255,255,255,0.1);
  padding: 15px;
  border-radius: 20px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  transition: transform 0.5s ease, box-shadow 0.5s ease;
}
.brand-logo img {
  width: 100px;
  height: 100px;
  object-fit: cover;
  border-radius: 50%;
}
.brand-logo:hover {
  transform: scale(1.2) rotate(-3deg);
  box-shadow: 0 16px 30px rgba(0,0,0,0.3);
}

/* CTA Button */
.branding-cta .branding-btn {
  display: inline-block;
  background: #fff;
  color: var(--primary-color);
  padding: 16px 40px;
  font-size: 1rem;
  font-weight: 700;
  border-radius: 50px;
  text-decoration: none;
  text-transform: uppercase;
  transition: all 0.3s ease;
  box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}
.branding-cta .branding-btn:hover {
  background: var(--accent-color);
  color: #000;
  transform: scale(1.05) rotate(-1deg);
  box-shadow: 0 10px 30px rgba(0,0,0,0.4);
}

/* Floating shapes */
.floating-shape {
  position: absolute;
  border-radius: 50%;
  opacity: 0.3;
  z-index: 1;
  animation: floatShape 6s ease-in-out infinite;
}

.shape1 { width: 120px; height: 120px; background: #fff; top: 20%; left: 10%; animation-delay: 0s; }
.shape2 { width: 80px; height: 80px; background: #ffeb3b; top: 60%; left: 80%; animation-delay: 2s; }
.shape3 { width: 100px; height: 100px; background: #ff5722; top: 30%; left: 50%; animation-delay: 4s; }
.shape4 { width: 60px; height: 60px; background: #0dcaf0; top: 75%; left: 30%; animation-delay: 6s; }

@keyframes floatShape {
  0% { transform: translateY(0) rotate(0deg); opacity: 0.3; }
  50% { transform: translateY(-30px) rotate(180deg); opacity: 0.6; }
  100% { transform: translateY(0) rotate(360deg); opacity: 0.3; }
}

/* Reveal animations */
.reveal { opacity: 0; transform: translateY(30px); transition: all 1s ease; }
.reveal.active { opacity: 1; transform: translateY(0); }

/* Responsive */
@media (max-width: 992px) {
  .branding-title { font-size: 2.5rem; }
  .branding-subtitle { font-size: 1rem; }
  .branding-logos { gap: 25px; }
}
@media (max-width: 576px) {
  .branding-title { font-size: 2rem; }
  .branding-logos { flex-direction: column; gap: 20px; }
}

</style>

<!-- =====================================================
     HERO SECTION
===================================================== -->
<section class="hero-section">
  <div class="hero-overlay"></div>
  <div class="container hero-container">
    <div class="hero-left">
      <h1>Event Planning Support</h1>
      <p>Professional support services to make your events seamless, memorable, and stress-free across Kenya.</p>
      <a href="{{ route('contact') }}" class="hero-btn">Get Support Now</a>
    </div>
    <div class="hero-right">
      <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=800&q=80" alt="Event Planning">
    </div>
  </div>
</section>

<!-- =====================================================
     EVENT SUPPORT SERVICES
===================================================== -->
<section class="support-section">
  <div class="container">
    <div class="support-title">
      <h2>Our Event Support Services</h2>
      <p class="text-muted">Expert services tailored to weddings, corporate events, and private functions.</p>
    </div>

    <div class="support-grid">
      @php
        $services = [
          ['name'=>'Venue Coordination','img'=>'https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=800&q=80','desc'=>'We manage venue logistics and setup to ensure a smooth event flow.'],
          ['name'=>'Catering Management','img'=>'https://images.unsplash.com/photo-1544510808-8a1e4f7c1b22?auto=format&fit=crop&w=800&q=80','desc'=>'Coordinate menus, dietary needs, and timing for flawless catering.'],
          ['name'=>'Guest Management','img'=>'https://images.unsplash.com/photo-1521790797524-b2497295b8b2?auto=format&fit=crop&w=800&q=80','desc'=>'Track RSVPs, seating arrangements, and ensure guests are well cared for.'],
          ['name'=>'Event Setup & Decor','img'=>'https://images.unsplash.com/photo-1520614073994-1abf96b6b81b?auto=format&fit=crop&w=800&q=80','desc'=>'Design, setup, and styling to create a visually stunning event space.'],
          ['name'=>'Entertainment Booking','img'=>'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80','desc'=>'Arrange DJs, bands, and performers to enhance your event experience.'],
          ['name'=>'On-site Management','img'=>'https://images.unsplash.com/photo-1523475496153-3f6d3f4c634e?auto=format&fit=crop&w=800&q=80','desc'=>'Ensure everything runs on schedule with our on-site coordination team.']
        ];
      @endphp

      @foreach($services as $service)
      <div class="support-card reveal">
        <img src="{{ $service['img'] }}" alt="{{ $service['name'] }}">
        <h4>{{ $service['name'] }}</h4>
        <p>{{ $service['desc'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- =====================================================
     EVENT BRANDING / IMPACT SECTION
===================================================== -->
<section class="branding-section">
  <div class="branding-overlay"></div>
  <div class="container branding-container">
    <h2 class="branding-title">Make Your Event Unforgettable</h2>
    <p class="branding-subtitle">From concept to execution, our branding and event styling leave a lasting impression.</p>
    
    <div class="branding-logos">
      <div class="brand-logo reveal">
        <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=200&q=80" alt="Brand 1">
      </div>
      <div class="brand-logo reveal">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=200&q=80" alt="Brand 2">
      </div>
      <div class="brand-logo reveal">
        <img src="https://images.unsplash.com/photo-1542838688-37dfb2f5f25f?auto=format&fit=crop&w=200&q=80" alt="Brand 3">
      </div>
      <div class="brand-logo reveal">
        <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=200&q=80" alt="Brand 4">
      </div>
      <div class="brand-logo reveal">
        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=200&q=80" alt="Brand 5">
      </div>
    </div>

    <div class="branding-cta">
      <a href="{{ route('contact') }}" class="branding-btn">Brand Your Event Now</a>
    </div>
  </div>

  <!-- Floating shapes for animation -->
  <div class="floating-shape shape1"></div>
  <div class="floating-shape shape2"></div>
  <div class="floating-shape shape3"></div>
  <div class="floating-shape shape4"></div>
</section>


<!-- =====================================================
     INTERACTIONS (JS)
===================================================== -->
<script>
document.addEventListener('scroll', () => {
  document.querySelectorAll('.reveal').forEach(el => {
    if (el.getBoundingClientRect().top < window.innerHeight - 100)
      el.classList.add('active');
  });
});

window.addEventListener('scroll', () => {
  const bg = document.querySelector('.parallax-bg');
  if (bg) bg.style.transform = `translateY(${window.scrollY * 0.4}px)`;
});
</script>

@endsection
