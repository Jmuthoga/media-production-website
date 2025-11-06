@extends('layouts.app')

@section('title', 'Hire Professional Crew')


<!-- =======================================================
     PHOTOGRAPHY Website — HIRE PROFESSIONAL CREW PAGE
     THEME: Classic Blue (Bootstrap Default) + Gold Accents
     Developer: John Muthoga
========================================================== -->

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/others/hirecrew.css') }}">
@endpush

@section('content')

<!-- =====================================================
     HERO SECTION 
===================================================== -->
<section class="hero-section"
  style="background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1600&q=80');">
  <div class="hero-overlay"></div>
  <div class="container hero-container">
    <div class="hero-left">
      <h1>Hire a Professional Crew</h1>
      <p>Meet Unimax Photography’s elite crew — skilled in cinematic visuals, events, and creative productions across Kenya.</p>
      <a href="{{ route('contact') }}" class="hero-btn" style="text-decoration: none;">Hire Us Now</a>
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

@endsection

@push('scripts')
<script src="{{ asset('js/public/others/hirecrew.js') }}"></script>
@endpush