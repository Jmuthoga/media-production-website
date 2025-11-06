@extends('layouts.app')

@section('title', 'Event Planning Support')

<!-- =======================================================
      EVENTS — EVENT PLANNING SUPPORT PAGE
     THEME: Classic Blue (Bootstrap Default) + Gold Accents
     Developer: John Muthoga 0791446968
========================================================== -->

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/others/eventplanning.css') }}">
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
      <h1>Event Planning Support</h1>
      <p>Professional support services to make your events seamless, memorable, and stress-free across Kenya.</p>
      <a href="{{ route('contact') }}" class="hero-btn" style="text-decoration: none;">Get Support Now</a>
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

@endsection

@push('scripts')
<script src="{{ asset('js/public/others/eventplanning.js') }}"></script>
@endpush