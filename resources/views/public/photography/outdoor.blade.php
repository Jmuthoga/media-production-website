@extends('layouts.app')

@section('title', 'Outdoor & Nature Shoots')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/outdoor.css') }}">
@endpush

@php
$outdoor = $outdoor ?? null;

/* ===================== HERO IMAGES ===================== */
$heroBg = ($outdoor && !empty($outdoor->hero_image))
? asset('storage/' . $outdoor->hero_image)
: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop';

$heroRight = ($outdoor && !empty($outdoor->hero_right_image))
? asset('storage/' . $outdoor->hero_right_image)
: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop';

/* ===================== DEFAULT GALLERY ===================== */
$defaultGallery = [
[
'src' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1600&auto=format&fit=crop',
'title' => 'Forest Landscapes',
'description' => 'Vibrant, serene forests captured with natural lighting.',
],
[
'src' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1600&auto=format&fit=crop',
'title' => 'Wildlife Photography',
'description' => 'Dynamic shots of wildlife in their natural habitat.',
],
[
'src' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1600&auto=format&fit=crop',
'title' => 'Mountain Views',
'description' => 'Epic vistas and panoramic outdoor captures.',
],
];

$galleryImages = ($gallery && $gallery->count() > 0)
? $gallery->map(fn($img) => [
'src' => asset('storage/' . $img),
'title' => '',
'description' => '',
])
: $defaultGallery;

/* ===================== SERVICES ===================== */
$defaultServices = [
['icon' => 'bi bi-tree-fill', 'title' => 'Landscape Shoots', 'description' => 'Capturing scenic beauty from forests, mountains, and rivers.'],
['icon' => 'bi bi-binoculars-fill', 'title' => 'Wildlife Sessions', 'description' => 'Professional wildlife photography in natural habitats.'],
['icon' => 'bi bi-sun-fill', 'title' => 'Golden Hour Shots', 'description' => 'Beautiful sunrise and sunset captures.'],
];

$services = ($outdoor && !empty($outdoor->services)) ? $outdoor->services : $defaultServices;

/* ===================== TESTIMONIALS ===================== */
$defaultTestimonials = [
['text' => 'Absolutely breathtaking outdoor shots! Every frame tells a story.', 'author' => 'Nature Photography Enthusiast'],
['text' => 'The team captured our adventure trip perfectly with natural light and colors.', 'author' => 'Adventure Travel Company'],
];

$testimonials = ($outdoor && !empty($outdoor->testimonials)) ? $outdoor->testimonials : $defaultTestimonials;

/* ===================== STATS ===================== */
$defaultStats = [
['value' => 0, 'title' => 'Outdoor Sessions'],
['value' => 0, 'title' => 'Wildlife Shoots'],
['value' => 0, 'title' => 'Years Experience'],
['value' => 0, 'title' => 'Client Satisfaction'],
];

$stats = ($outdoor && !empty($outdoor->stats)) ? $outdoor->stats : $defaultStats;

/* ===================== HERO TITLES ===================== */
$heroTitle = ($outdoor && !empty($outdoor->title))
? $outdoor->title
: 'Outdoor & Nature Photography';

$heroDescription = ($outdoor && !empty($outdoor->description))
? $outdoor->description
: 'Capturing landscapes, wildlife, and outdoor adventures with natural light and artistic frames.';

$ctaTitle = ($outdoor && !empty($outdoor->cta_title))
? $outdoor->cta_title
: 'Ready to Explore?';

$ctaDescription = ($outdoor && !empty($outdoor->cta_description))
? $outdoor->cta_description
: 'Book your outdoor photography session and bring the beauty of nature to life.';
@endphp

@section('content')

<!-- ===== HERO ===== -->
<section class="outdoor-hero"
    style="background: linear-gradient(120deg, rgba(46, 125, 50, 0.85), rgba(241, 196, 15, 0.2)), 
            url('{{ $heroBg }}') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>{{ $heroTitle }}</h1>
            <p>{{ $heroDescription }}</p>

            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Shoot</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>

        <div class="hero-right" style="flex:1; max-width:600px; height:75vh; overflow:hidden; display:flex; align-items:flex-start;">
            <img src="{{ $heroRight }}" alt="Outdoor photography" loading="lazy"
                style="width:100%; height:100%; object-fit:cover; object-position:top;">
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- ============= OUTDOOR GALLERY SLIDER ============= -->
    <section aria-label="Outdoor Gallery" style="margin-top: 5rem;">
        <div class="slider" id="outdoorSlider" style="max-width:1200px; margin:0 auto;">
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

    <!-- ===== STATS & CTA ===== -->
    <section class="stats-row">
        @foreach($stats as $i => $st)
        <div class="stat">
            <h3 id="stat{{ $i }}">{{ $st['value'] ?? 0 }}</h3>
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
<script src="{{ asset('js/public/photography/outdoor.js') }}"></script>

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