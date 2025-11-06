@extends('layouts.app')

@section('title', 'Drone Photography & Videography')

@section('content')

<!-- =====================================================
     HERO SECTION — DRONE PHOTOGRAPHY
===================================================== -->
<section class="hero-section-drone position-relative text-light overflow-hidden">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- LEFT SIDE TEXT -->
      <div class="col-lg-6 text-center text-lg-start hero-left">
        <h1 class="display-3 fw-bold mb-3 reveal">Drone Photography & Videography</h1>
        <p class="lead mb-4 reveal">Capture breathtaking aerial perspectives and cinematic footage with professional drone services tailored for events, real estate, tourism, and film.</p>
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg hero-btn reveal">Book a Drone Flight</a>
      </div>

      <!-- RIGHT SIDE IMAGE -->
      <div class="col-lg-6 hero-img-wrapper mt-4 mt-lg-0">
        <div class="hero-drone-img reveal"></div>
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
    <h2 class="text-center display-5 mb-5 reveal">Our Aerial Services</h2>

    @php
      $services = [
        ['name'=>'Event Coverage','desc'=>'Capture weddings, sports, and festivals from stunning aerial angles.','icon'=>'fas fa-video'],
        ['name'=>'Real Estate Imaging','desc'=>'Highlight properties with sweeping drone shots for listings and promotions.','icon'=>'fas fa-building'],
        ['name'=>'Landscape & Nature','desc'=>'Reveal the natural beauty of outdoor locations and wildlife.','icon'=>'fas fa-mountain'],
        ['name'=>'Cinematic Filming','desc'=>'Shoot cinematic drone footage for films, ads, and documentaries.','icon'=>'fas fa-film'],
        ['name'=>'Aerial Mapping','desc'=>'Accurate drone-based mapping and surveys for construction or agriculture.','icon'=>'fas fa-map-marked-alt'],
        ['name'=>'Live Streaming','desc'=>'Stream aerial footage live for virtual events and broadcasts.','icon'=>'fas fa-satellite-dish']
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
     VIDEO SHOWCASE
===================================================== -->
<section class="video-section py-5 text-light bg-dark">
  <div class="container text-center">
    <h2 class="display-5 text-primary mb-4 reveal">Experience the Sky Perspective</h2>
    <p class="text-muted mb-5 reveal">Watch how we transform ordinary scenes into cinematic masterpieces.</p>
    <div class="video-wrapper reveal mx-auto">
      <iframe width="100%" height="450" src="https://www.youtube.com/embed/lMJXxhRFO1k" title="Drone Footage" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
</section>

<!-- =====================================================
     PORTFOLIO GALLERY
===================================================== -->
<section class="gallery-section py-5 bg-light">
  <div class="container">
    <h2 class="text-center display-5 mb-5 reveal">Aerial Portfolio</h2>
    <div class="row g-4">
      @php
        $gallery = [
          'https://images.unsplash.com/photo-1504198453319-5ce911bafcde?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1502920917128-1aa500764b43?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1510822735153-54f6e4d7b2c4?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1487014679447-9f8336841d58?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?auto=format&fit=crop&w=800&q=80',
          'https://images.unsplash.com/photo-1523987355523-c7b5bdf2b4d8?auto=format&fit=crop&w=800&q=80'
        ];
      @endphp
      @foreach($gallery as $img)
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="gallery-card reveal">
            <img src="{{ $img }}" alt="Drone Shot" class="img-fluid rounded shadow-sm hover-zoom gallery-img">
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- =====================================================
     WORKFLOW — CIRCULAR STEPS (Responsive)
===================================================== -->
<section class="workflow-section py-5 bg-dark text-light position-relative">
  <div class="container position-relative">
    <h2 class="text-center display-5 text-primary mb-5 reveal">Our Drone Operation Workflow</h2>
    <div class="workflow-line"></div>

    <div class="row g-4 justify-content-center text-center">
      @php
        $workflow = [
          ['step'=>'1','title'=>'Pre-Flight Planning','desc'=>'We evaluate the location, weather, and legal requirements.'],
          ['step'=>'2','title'=>'Drone Setup','desc'=>'Prepare equipment, calibrate sensors, and check flight systems.'],
          ['step'=>'3','title'=>'Aerial Capture','desc'=>'Perform controlled drone flights capturing photos and videos.'],
          ['step'=>'4','title'=>'Editing & Delivery','desc'=>'Edit footage professionally and deliver ready-to-use content.']
        ];
      @endphp

      @foreach($workflow as $step)
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="workflow-card reveal mb-4">
            <div class="workflow-step mx-auto mb-3"><span>{{ $step['step'] }}</span></div>
            <h5 class="text-light">{{ $step['title'] }}</h5>
            <p class="text-muted small">{{ $step['desc'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- =====================================================
     FEATURED COLLABORATIONS / PROJECT HIGHLIGHTS
===================================================== -->
<section class="collab-section py-5 bg-dark text-light position-relative overflow-hidden">
  <div class="container">
    <h2 class="text-center display-5 text-primary mb-5 reveal">Featured Collaborations</h2>

    <div class="row g-4 justify-content-center">
      @php
        $projects = [
          ['title'=>'Real Estate Aerial Tour','client'=>'Skyline Properties','img'=>'https://images.unsplash.com/photo-1599423300746-b62533397364?auto=format&fit=crop&w=800&q=80','desc'=>'Captured dynamic aerial shots for luxury property listings.'],
          ['title'=>'Wedding Cinematic Coverage','client'=>'Moments Studio','img'=>'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80','desc'=>'Delivered cinematic footage of a grand destination wedding.'],
          ['title'=>'Tourism Promotion Film','client'=>'Explore Kenya','img'=>'https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&w=800&q=80','desc'=>'Created stunning aerial visuals showcasing Kenyan landmarks.']
        ];
      @endphp

      @foreach($projects as $p)
        <div class="col-md-4">
          <div class="collab-card position-relative overflow-hidden rounded-4 shadow reveal">
            <img src="{{ $p['img'] }}" alt="{{ $p['title'] }}" class="img-fluid rounded-4 w-100" style="height: 280px; object-fit: cover; transition: transform 0.6s ease;">
            <div class="collab-overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center p-4" style="background: rgba(0,0,0,0.6); opacity: 0; transition: opacity 0.6s ease;">
              <h5 class="text-primary mb-2">{{ $p['title'] }}</h5>
              <p class="small text-light mb-1"><strong>{{ $p['client'] }}</strong></p>
              <p class="text-light">{{ $p['desc'] }}</p>
            </div>
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
    <h2 class="display-4 text-primary mb-4">Take Your Vision to the Skies</h2>
    <p class="mb-4">Book your professional drone photography or videography session today.</p>
    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Book Now</a>
  </div>
</section>

<!-- =====================================================
     STYLES
===================================================== -->
<style>
:root {
  --primary-color: #0d6efd; /* Bootstrap Primary */
  --accent-color: #f5c542;
  --text-light: #f8f9fa;
  --transition-fast: 0.3s ease;
}

/* HERO */
.hero-section-drone {
  position: relative;
  background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1600&q=80');
  background-size: cover;
  background-position: center;
  min-height: 650px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-light);
}
.hero-drone-img {
  width: 100%;
  height: 400px;
  background: url('https://images.unsplash.com/photo-1502920917128-1aa500764b43?auto=format&fit=crop&w=800&q=80') center/cover no-repeat;
  border-radius: 1rem;
  transition: transform 0.6s ease;
}
.hero-drone-img:hover { transform: scale(1.05); }
.hero-img-overlay {
  position: absolute; top:0; left:0; width:100%; height:100%;
  background: linear-gradient(to bottom right, rgba(13,110,253,0.5), rgba(0,0,0,0.7));
}
.hero-btn:hover { transform: scale(1.1); box-shadow: 0 0 20px var(--primary-color); }

/* GALLERY */
.gallery-card {
  overflow: hidden; border-radius: 12px; height: 230px;
}
.gallery-card img {
  width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease;
}
.gallery-card:hover img { transform: scale(1.1); }

.workflow-line {
  position: absolute;
  top: 180px;
  left: 50%;
  transform: translateX(-50%);
  width: 80%;
  height: 3px;
  background: rgba(13,110,253,.3);
  transition: all 0.3s ease;
}
.workflow-card { transition: transform .3s ease; }
.workflow-card:hover { transform: translateY(-10px); }

.workflow-step {
  width: 100px;
  height: 100px;
  background: var(--primary-color, #0d6efd);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 2rem;
  font-weight: bold;
  position: relative;
  box-shadow: 0 0 20px rgba(13,110,253,.7);
  transition: all .3s ease;
}
.workflow-step:hover {
  transform: scale(1.1);
  box-shadow: 0 0 40px rgba(13,110,253,.9);
}
.workflow-step::after {
  content: '';
  position: absolute;
  width: 70px;
  height: 3px;
  background: rgba(13,110,253,.4);
  top: 50%;
  right: -80px;
  transform: translateY(-50%);
}
.workflow-card:last-child .workflow-step::after {
  display: none;
}

/* ============================= */
/* Responsive Adjustments */
/* ============================= */
@media (max-width: 992px) {
  .workflow-line {
    width: 90%;
    top: 160px;
  }
}
@media (max-width: 768px) {
  .workflow-line {
    display: none;
  }
  .workflow-step {
    width: 80px;
    height: 80px;
    font-size: 1.5rem;
  }
  .workflow-step::after {
    display: none;
  }
}
@media (max-width: 576px) {
  .workflow-step {
    width: 70px;
    height: 70px;
    font-size: 1.2rem;
  }
  .workflow-card {
    margin-bottom: 1.5rem;
  }
}

/* VIDEO */
.video-wrapper {
  max-width: 800px;
  border-radius: 1rem;
  overflow: hidden;
  box-shadow: 0 0 25px rgba(13,110,253,0.4);
}

/* Reveal Animation */
.reveal { opacity:0; transform:translateY(30px); transition:all 0.8s ease; }
.reveal.active { opacity:1; transform:translateY(0); }

.collab-card:hover img {
  transform: scale(1.1);
}
.collab-card:hover .collab-overlay {
  opacity: 1;
}
</style>

<!-- =====================================================
     JS — Reveal & Interactions
===================================================== -->
<script>
document.addEventListener('scroll', () => {
  document.querySelectorAll('.reveal').forEach(el => {
    if(el.getBoundingClientRect().top < window.innerHeight - 100){
      el.classList.add('active');
    }
  });
});
</script>

@endsection
