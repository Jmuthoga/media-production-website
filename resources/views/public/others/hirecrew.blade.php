@extends('layouts.app')

@section('title', 'Hire Professional Crew')

@section('content')
<!-- =======================================================
     UNIMAX PHOTOGRAPHY — HIRE PROFESSIONAL CREW PAGE
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
  .hero-left h1 {
    font-size: 2.5rem;
  }
  .hero-left p {
    font-size: 1rem;
  }
  .hero-right img {
    max-width: 90%;
    margin-bottom: 30px;
  }
}

@media (max-width: 576px) {
  .hero-left h1 {
    font-size: 2rem;
  }
}

/* =====================================================
   CREW SECTION
===================================================== */
.crew-section {
  background-color: var(--bg-light);
  padding: 100px 0;
}

.crew-title {
  text-align: center;
  margin-bottom: 60px;
}

.crew-title h2 {
  color: var(--primary-color);
  font-weight: 700;
}

.crew-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
  padding: 0 20px;
}

/* Crew Card */
.crew-card {
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.1);
  width: calc(25% - 30px);
  min-width: 250px;
  overflow: hidden;
  position: relative;
  transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}
.crew-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 16px 24px rgba(0,0,0,0.15);
}
.crew-card img {
  width: 100%;
  height: 260px;
  object-fit: cover;
  transition: transform 0.5s ease;
}
.crew-card:hover img {
  transform: scale(1.05);
}

.crew-info {
  padding: 20px;
  text-align: center;
}
.crew-info h4 {
  color: var(--primary-color);
  font-weight: 600;
}
.crew-info p.role {
  font-size: 0.9rem;
  color: gray;
  margin-bottom: 10px;
}
.crew-info p.desc {
  font-size: 0.95rem;
  color: #444;
}

.hire-btn {
  display: inline-block;
  background: var(--primary-color);
  color: #fff;
  border-radius: 25px;
  padding: 8px 20px;
  font-size: 0.9rem;
  font-weight: 600;
  text-decoration: none;
  transition: all var(--transition-fast);
  margin-top: 15px;
}
.hire-btn:hover {
  background: var(--accent-color);
  color: #000;
  transform: scale(1.08);
}

/* Responsive Crew Grid */
@media (max-width: 992px) { .crew-card { width: calc(33.333% - 20px); } }
@media (max-width: 768px) { .crew-card { width: calc(50% - 20px); } }
@media (max-width: 576px) { .crew-card { width: 100%; } }

/* =====================================================
   ADDITIONAL VISUALS
===================================================== */
.text-shadow { text-shadow: 0 4px 10px rgba(0,0,0,0.5); }
::-webkit-scrollbar { width: 8px; }
::-webkit-scrollbar-thumb { background: var(--primary-color); border-radius: 4px; }
::-webkit-scrollbar-thumb:hover { background: var(--accent-color); }

/* =====================================================
   WHY CHOOSE US SECTION STYLES
===================================================== */
.choose-us-section {
  background: var(--bg-light);
  padding: 30px 20px;
  text-align: center;
  position: relative;
}

.choose-title h2 {
  font-size: 2.3rem;
  font-weight: 700;
  color: var(--text-dark);
  margin-bottom: 10px;
}

.choose-title p {
  color: #555;
  font-size: 1rem;
  margin-bottom: 60px;
}

.choose-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 40px;
  justify-content: center;
}

.choose-card {
  background: #fff;
  border-radius: 16px;
  padding: 40px 25px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.08);
  transition: var(--transition-fast);
  border-top: 5px solid var(--primary-color);
}

.choose-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 35px rgba(0,0,0,0.12);
}

.choose-card .icon-circle {
  background: var(--primary-color);
  color: white;
  width: 70px;
  height: 70px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.8rem;
  margin: 0 auto 20px;
}

.choose-card h4 {
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--text-dark);
  margin-bottom: 10px;
}

.choose-card p {
  color: #666;
  font-size: 0.95rem;
}

.choose-cta {
  margin-top: 60px;
}

.choose-cta .cta-btn {
  background: var(--primary-color);
  color: #fff;
  padding: 14px 36px;
  border-radius: 30px;
  text-decoration: none;
  font-weight: 600;
  transition: var(--transition-fast);
}

.choose-cta .cta-btn:hover {
  background: var(--accent-color);
  color: var(--text-dark);
}

/* Responsive Layout */
@media (max-width: 992px) {
  .choose-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
  }
}

@media (max-width: 576px) {
  .choose-grid {
    grid-template-columns: 1fr;
    gap: 25px;
  }

  .choose-card {
    padding: 30px 20px;
  }

  .choose-title h2 {
    font-size: 1.8rem;
  }
}

/* =====================================================
   WORKFLOW / PROCESS STYLES
===================================================== */
.workflow-section {
  background: var(--bg-light);
  padding: 30px 20px;
}

.workflow-header h2 {
  font-size: 2.5rem;
  font-weight: 700;
  color: var(--primary-color);
  margin-bottom: 10px;
}

.workflow-header p {
  color: #555;
}

.workflow-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 40px;
  margin-top: 50px;
}

.workflow-step {
  background: #fff;
  border-radius: 16px;
  padding: 30px 20px;
  text-align: center;
  width: 250px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
  transition: transform var(--transition-fast), box-shadow var(--transition-fast);
}

.workflow-step:hover {
  transform: translateY(-10px);
  box-shadow: 0 16px 30px rgba(13,110,253,0.15);
}

.workflow-step .step-icon {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: var(--primary-color);
  color: #fff;
  font-size: 1.5rem;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 15px;
}

.workflow-step h4 {
  color: var(--text-dark);
  font-weight: 600;
  margin-bottom: 10px;
}

.workflow-step p {
  color: #666;
  font-size: 0.95rem;
}

/* Responsive Layout */
@media (max-width: 992px) {
  .workflow-grid {
    gap: 30px;
  }
}

@media (max-width: 768px) {
  .workflow-grid {
    flex-direction: column;
    align-items: center;
  }
}

</style>

<!-- =====================================================
     HERO SECTION 
===================================================== -->
<section class="hero-section">
  <div class="hero-overlay"></div>
  <div class="container hero-container">
    <div class="hero-left">
      <h1>Hire a Professional Crew</h1>
      <p>Meet Unimax Photography’s elite crew — skilled in cinematic visuals, events, and creative productions across Kenya.</p>
      <a href="{{ route('contact') }}" class="hero-btn">Hire Us Now</a>
    </div>
    <div class="hero-right">
      <img src="https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?auto=format&fit=crop&w=800&q=80" alt="Professional Crew">
    </div>
  </div>
</section>


<!-- =====================================================
     CREW SECTION
===================================================== -->
<section class="crew-section">
  <div class="container">
    <div class="crew-title">
      <h2>Our Photography Crew</h2>
      <p class="text-muted">Professional, passionate, and ready to make your project shine.</p>
    </div>

    <div class="crew-grid">
      @php
        $crew = [
          ['name'=>'Daniel Muriuki','role'=>'Lead Photographer','img'=>'https://images.unsplash.com/photo-1603415526960-f7e0328b6f1d?auto=format&fit=crop&w=800&q=80','desc'=>'With 8+ years of field experience, Daniel leads with creative precision and an eye for perfect lighting.'],
          ['name'=>'Grace Mwangi','role'=>'Cinematographer','img'=>'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=800&q=80','desc'=>'Grace transforms stories into moving art, blending natural light and motion for cinematic excellence.'],
          ['name'=>'Kelvin Otieno','role'=>'Lighting & Setup Engineer','img'=>'https://images.unsplash.com/photo-1552058544-f2b08422138a?auto=format&fit=crop&w=800&q=80','desc'=>'An expert in modern studio lighting, Kelvin ensures every frame has the perfect tone and balance.'],
          ['name'=>'Mercy Wanjiku','role'=>'Creative Director','img'=>'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=800&q=80','desc'=>'Mercy guides the artistic vision of every project, ensuring storytelling through color and composition.'],
          ['name'=>'Brian Njoroge','role'=>'Drone & Aerial Expert','img'=>'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?auto=format&fit=crop&w=800&q=80','desc'=>'Certified drone pilot capturing breathtaking aerial footage of weddings, events, and landscapes.'],
          ['name'=>'Linda Achieng','role'=>'Post-Production Editor','img'=>'https://images.unsplash.com/photo-1594824476967-48c8b9642730?auto=format&fit=crop&w=800&q=80','desc'=>'Linda brings your moments to life with precision editing, color grading, and motion design.']
        ];
      @endphp

      @foreach($crew as $member)
      <div class="crew-card reveal">
        <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}">
        <div class="crew-info">
          <h4>{{ $member['name'] }}</h4>
          <p class="role">{{ $member['role'] }}</p>
          <p class="desc">{{ $member['desc'] }}</p>
          <a href="{{ route('contact') }}" class="hire-btn">Hire Crew</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- =====================================================
     WHY CHOOSE US SECTION
===================================================== -->
<section class="choose-us-section">
  <div class="container">
    <div class="choose-title">
      <h2>Why Choose Our Studio</h2>
      <p class="text-muted">We combine creativity, technology, and passion to deliver timeless visual stories.</p>
    </div>

    <div class="choose-grid">
      <div class="choose-card reveal">
        <div class="icon-circle">
          <i class="fas fa-camera-retro"></i>
        </div>
        <h4>Cutting-edge Equipment</h4>
        <p>We use the latest 4K cameras, lighting rigs, and drones to capture crisp, cinematic visuals.</p>
      </div>

      <div class="choose-card reveal">
        <div class="icon-circle">
          <i class="fas fa-users"></i>
        </div>
        <h4>Experienced Crew</h4>
        <p>Our 6-member team has over 30 years of combined experience across weddings, fashion, and commercial shoots.</p>
      </div>

      <div class="choose-card reveal">
        <div class="icon-circle">
          <i class="fas fa-lightbulb"></i>
        </div>
        <h4>Creative Direction</h4>
        <p>We don’t just take photos — we craft stories, moods, and emotions that connect with your audience.</p>
      </div>

      <div class="choose-card reveal">
        <div class="icon-circle">
          <i class="fas fa-rocket"></i>
        </div>
        <h4>Fast Delivery</h4>
        <p>Get fully edited, high-resolution content within days — not weeks — through our streamlined workflow.</p>
      </div>
    </div>

    <div class="choose-cta">
      <a href="{{ route('contact') }}" class="cta-btn">Book Your Session</a>
    </div>
  </div>
</section>

<!-- =====================================================
     WORKFLOW / OUR PROCESS SECTION
===================================================== -->
<section class="workflow-section">
  <div class="container">
    <div class="workflow-header text-center mb-5">
      <h2>Our Workflow</h2>
      <p class="text-muted">From concept to delivery — see how we bring your vision to life.</p>
    </div>

    <div class="workflow-grid">
      <div class="workflow-step reveal">
        <div class="step-icon">1</div>
        <h4>Consultation</h4>
        <p>We understand your needs, objectives, and creative vision to plan your project efficiently.</p>
      </div>

      <div class="workflow-step reveal">
        <div class="step-icon">2</div>
        <h4>Planning & Storyboarding</h4>
        <p>Our team creates storyboards, shot lists, and logistics to ensure flawless execution.</p>
      </div>

      <div class="workflow-step reveal">
        <div class="step-icon">3</div>
        <h4>Shooting / Production</h4>
        <p>With professional equipment and expertise, we capture cinematic visuals and photography.</p>
      </div>

      <div class="workflow-step reveal">
        <div class="step-icon">4</div>
        <h4>Post-Production</h4>
        <p>Editing, color grading, sound design, and final touches to bring your project to perfection.</p>
      </div>
    </div>
  </div>
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
