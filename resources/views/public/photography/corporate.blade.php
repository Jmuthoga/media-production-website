@extends('layouts.app')

@section('title', 'Corporate & Event Coverage')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/corporate.css') }}">
@endpush

@php
$corporate = $corporate ?? null;

/* ================== HERO IMAGES ================== */
$heroBg = ($corporate && !empty($corporate->hero_image))
? asset('storage/' . $corporate->hero_image)
: 'https://images.unsplash.com/photo-1556740765-90d3d3e5a1d4?q=80&w=1600&auto=format&fit=crop';

$heroRight = ($corporate && !empty($corporate->hero_right_image))
? asset('storage/' . $corporate->hero_right_image)
: 'https://images.unsplash.com/photo-1556740765-90d3d3e5a1d4?q=80&w=1600&auto=format&fit=crop';

/* ================== DEFAULT GALLERY ================== */
$defaultGallery = [
['src' => 'https://images.unsplash.com/photo-1556740765-90d3d3e5a1d4?q=80&w=1600&auto=format&fit=crop', 'title' => 'Corporate Conference', 'description' => 'Full coverage of corporate conferences.'],
['src' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=1600&auto=format&fit=crop', 'title' => 'Product Launch', 'description' => 'Capturing stunning product launches.'],
['src' => 'https://images.unsplash.com/photo-1542223616-9b7db5ffb267?q=80&w=1600&auto=format&fit=crop', 'title' => 'Corporate Gathering', 'description' => 'Events, celebrations and team building.'],
['src' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=1600&auto=format&fit=crop', 'title' => 'Gala & Networking', 'description' => 'Elegant nights and networking moments.'],
];

/* ================== DYNAMIC GALLERY ================== */
$galleryImages = ($gallery && $gallery->count() > 0)
? $gallery->map(fn($img) => [
'src' => asset('storage/' . $img),
'title' => '',
'description' => ''
])
: $defaultGallery;

/* ================== SERVICES ================== */
$defaultServices = [
['icon' => 'bi bi-briefcase-fill', 'title' => 'Corporate Events', 'description' => 'Workshops, conferences & annual meetings.'],
['icon' => 'bi bi-camera-reels-fill', 'title' => 'Product Launches', 'description' => 'High-quality visual product showcasing.'],
['icon' => 'bi bi-people-fill', 'title' => 'Networking & Social Events', 'description' => 'Gala nights and professional gatherings.'],
];

$services = ($corporate && !empty($corporate->services))
? $corporate->services
: $defaultServices;

/* ================== TESTIMONIALS ================== */
$defaultTestimonials = [
['text' => 'They captured our annual corporate event with unmatched professionalism!', 'author' => 'Corporate Client'],
['text' => 'Exceptional coverage and attention to detail — highly recommended!', 'author' => 'Event Manager'],
];

$testimonials = ($corporate && !empty($corporate->testimonials))
? $corporate->testimonials
: $defaultTestimonials;

/* ================== STATS ================== */
$defaultStats = [
['value' => 0, 'title' => 'Events Covered'],
['value' => 0, 'title' => 'Professional Shots'],
['value' => 0, 'title' => 'Years of Experience'],
['value' => 0, 'title' => 'Client Satisfaction'],
];

$stats = ($corporate && !empty($corporate->stats))
? $corporate->stats
: $defaultStats;

/* ================== TEXT CONTENT ================== */
$heroTitle = ($corporate && !empty($corporate->title))
? $corporate->title
: 'Corporate & Event Coverage';

$heroDescription = ($corporate && !empty($corporate->description))
? $corporate->description
: 'Professional photography and videography services for corporate events, conferences, product launches, and social events.';

$ctaTitle = ($corporate && !empty($corporate->cta_title))
? $corporate->cta_title
: 'Professional Event Coverage';

$ctaDescription = ($corporate && !empty($corporate->cta_description))
? $corporate->cta_description
: 'Book your event with us to ensure every key moment is captured with precision and style.';
@endphp


@section('content')

<!-- ===== HERO ===== -->
<section class="corp-hero"
    style="background: linear-gradient(120deg, rgba(26, 26, 26, 0.9), rgba(44, 62, 80, 0.85)), url('{{ $heroBg }}') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>{{ $heroTitle }}</h1>
            <p>{{ $heroDescription }}</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Session</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right" style="flex:1; max-width:600px; height:75vh; overflow:hidden; display:flex; align-items:flex-start;">
            <img src="{{ $heroRight }}" alt="Corporate" loading="lazy"
                style="width:100%; height:100%; object-fit:cover; object-position:top;">
        </div>
    </div>
</section>


<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- ============= CORPORATE GALLERY SLIDER ============= -->
    <section aria-label="Corporate Gallery" style="margin-top: 5rem;">
        <div class="slider" id="corpSlider" style="max-width:1200px; margin:0 auto;">
            <div class="slider-main" id="sliderMain" style="position:relative; height:80vh; overflow:hidden; background:#fff;">
                @foreach($galleryImages as $index => $img)
                <div class="slide" data-index="{{ $index }}" tabindex="{{ $index === 0 ? '0' : '-1' }}" aria-hidden="{{ $index === 0 ? 'false' : 'true' }}" style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:{{ $index === 0 ? '1' : '0' }}; transition:opacity 0.4s; text-align:center; background:#fff;">
                    <img class="zoomable" src="{{ $img['src'] }}" alt="{{ $img['title'] ?? '' }}" loading="lazy" style="width:auto; max-width:90%; max-height:80vh; object-fit:contain; display:inline-block; margin:0 auto; transition: transform 0.2s; cursor:grab;">
                    <div class="caption" style="margin-top:1rem; text-align:center;">
                        <h4>{{ $img['title'] ?? '' }}</h4>
                        <p>{{ $img['description'] ?? '' }}</p>
                    </div>
                </div>
                @endforeach

                <!-- Slider controls -->
                <div class="slider-controls"
                    style="position:absolute; top:50%; left:0; right:0; display:flex; justify-content:space-between; transform:translateY(-50%);">

                    <button id="prevBtn"
                        style="background:black; color:white; border:none; width:45px; height:45px; border-radius:50%; 
               font-size:20px; display:flex; align-items:center; justify-content:center; cursor:pointer;
               box-shadow:0 2px 6px rgba(0,0,0,0.3);">
                        ◀
                    </button>

                    <button id="nextBtn"
                        style="background:black; color:white; border:none; width:45px; height:45px; border-radius:50%; 
               font-size:20px; display:flex; align-items:center; justify-content:center; cursor:pointer;
               box-shadow:0 2px 6px rgba(0,0,0,0.3);">
                        ▶
                    </button>

                </div>

                <div class="zoom-controls" style="position:absolute; bottom:10px; left:50%; transform:translateX(-50%); display:flex; gap:0.5rem;">
                    <button id="zoomIn">Zoom +</button>
                    <button id="zoomOut">Zoom -</button>
                </div>
            </div>

            <aside class="slider-thumbs" style="display:flex; flex-direction:column; align-items:center; margin-top:1rem;">
                <div id="thumbsContainer" style="display:flex; gap:0.5rem; flex-wrap:wrap; justify-content:center;"></div>
                <div id="thumbPagination" style="margin-top:0.5rem; display:flex; gap:0.5rem; justify-content:center;">
                    <button id="prevThumbs">◀</button>
                    <button id="nextThumbs">▶</button>
                </div>
            </aside>
        </div>
    </section>


    <!-- ===== SERVICES ===== -->
    <section class="services-grid">
        @foreach($services as $s)
        <div class="service">
            <i class="{{ $s['icon'] }}"></i>
            <h4>{{ $s['title'] }}</h4>
            <p>{{ $s['description'] }}</p>
        </div>
        @endforeach
    </section>


    <!-- ===== TESTIMONIALS ===== -->
    <section class="testimonials">
        @foreach($testimonials as $t)
        <div class="testimonial">
            <p>"{{ $t['text'] }}"</p>
            <div class="who">— {{ $t['author'] }}</div>
        </div>
        @endforeach
    </section>


    <!-- ===== STATS ===== -->
    <section class="stats-row">
        @foreach($stats as $i => $st)
        <div class="stat">
            <h3 id="stat{{ $i }}">{{ $st['value'] }}</h3>
            <p>{{ $st['title'] }}</p>
        </div>
        @endforeach
    </section>


    <!-- ===== CTA ===== -->
    <section class="cta">
        <div class="left">
            <h3>{{ $ctaTitle }}</h3>
            <p>{{ $ctaDescription }}</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Book Now</a>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/corporate.js') }}"></script>

<script>
    const allThumbs = @json($galleryImages);
    const thumbsPerPage = 5;
    let currentThumbPage = 0;

    const thumbsContainer = document.getElementById('thumbsContainer');

    function renderThumbs() {
        thumbsContainer.innerHTML = '';
        const start = currentThumbPage * thumbsPerPage;
        const end = start + thumbsPerPage;
        const pageThumbs = allThumbs.slice(start, end);

        pageThumbs.forEach((img, index) => {
            const thumbDiv = document.createElement('div');
            thumbDiv.className = 'thumb';
            thumbDiv.dataset.index = start + index;
            thumbDiv.style.width = '150px';
            thumbDiv.style.height = '100px';
            thumbDiv.style.overflow = 'hidden';
            thumbDiv.style.cursor = 'pointer';
            thumbDiv.style.borderRadius = '5px';

            const thumbImg = document.createElement('img');
            thumbImg.src = img.src;
            thumbImg.alt = img.title;
            thumbImg.loading = 'lazy';
            thumbImg.style.width = '100%';
            thumbImg.style.height = '100%';
            thumbImg.style.objectFit = 'cover';
            thumbImg.style.objectPosition = 'top';

            thumbDiv.appendChild(thumbImg);
            thumbDiv.addEventListener('click', () => {
                if (typeof showSlide === 'function') showSlide(start + index);
            });

            thumbsContainer.appendChild(thumbDiv);
        });
    }

    document.getElementById('prevThumbs').addEventListener('click', () => {
        if (currentThumbPage > 0) {
            currentThumbPage--;
            renderThumbs();
        }
    });

    document.getElementById('nextThumbs').addEventListener('click', () => {
        if ((currentThumbPage + 1) * thumbsPerPage < allThumbs.length) {
            currentThumbPage++;
            renderThumbs();
        }
    });

    renderThumbs();
</script>
@endpush