@extends('layouts.app')

@section('title', 'Photo Editing & Retouching')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/others/photoediting.css') }}">
@endpush


@section('content')

<!-- =====================================================
     HERO SECTION — PHOTO EDITING
===================================================== -->
<section class="hero-section position-relative overflow-hidden"
  style="background-image: url('https://images.unsplash.com/photo-1504208434309-cb69f4fe52b0?auto=format&fit=crop&w=1600&q=80');">
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

@endsection

@push('scripts')
<script src="{{ asset('js/public/others/photoediting.js') }}"></script>
@endpush