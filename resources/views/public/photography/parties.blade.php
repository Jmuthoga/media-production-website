@extends('layouts.app')

@section('title', 'Parties & Concerts')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/parties.css') }}">
@endpush

@php
$party = $party ?? null;

$heroBg = ($party && !empty($party->hero_image))
? asset('storage/' . $party->hero_image)
: 'https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?q=80&w=1200&auto=format&fit=crop';

$heroRight = ($party && !empty($party->hero_right_image))
? asset('storage/' . $party->hero_right_image)
: 'https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?q=80&w=1200&auto=format&fit=crop';

$defaultGallery = [
['src' => 'https://images.unsplash.com/photo-1518972559570-7cc1309f3229?q=80&w=1600&auto=format&fit=crop', 'title' => 'Live DJ Event', 'description' => 'Energy-filled moments captured under colorful lights.'],
['src' => 'https://images.unsplash.com/photo-1541534401786-2077eed87a76?q=80&w=1600&auto=format&fit=crop', 'title' => 'Concert Lights', 'description' => 'Vibrant stage lighting and crowd moments.'],
['src' => 'https://images.unsplash.com/photo-1487180144351-b8472da7d491?q=80&w=1600&auto=format&fit=crop', 'title' => 'Party Night', 'description' => 'Unforgettable dance floor vibes and happy faces.'],
['src' => 'https://images.unsplash.com/photo-1556767576-cfba5c8df6fc?q=80&w=1600&auto=format&fit=crop', 'title' => 'Festival Moments', 'description' => 'Open-air concerts and festival joy perfectly captured.'],
];

$galleryImages = ($gallery && $gallery->count() > 0)
? $gallery->map(fn($img) => [
'src' => asset('storage/' . $img),
'title' => '',
'description' => ''
])
: $defaultGallery;


$defaultServices = [
['icon' => 'bi bi-lightning-fill', 'title' => 'Dynamic Event Coverage', 'description' => 'We cover every moment — from setup to peak energy and crowd reactions.'],
['icon' => 'bi bi-camera-video-fill', 'title' => 'Concert Photography', 'description' => 'Professional lighting and action shots for performers, fans, and venues.'],
['icon' => 'bi bi-music-note-beamed', 'title' => 'Aftermovie Creation', 'description' => 'Combine photos and clips into energetic highlight reels of your event.'],
];

$services = ($party && !empty($party->services)) ? $party->services : $defaultServices;

$defaultTestimonials = [
['text' => 'The concert photos were absolutely stunning — you could feel the energy in every shot!', 'author' => 'DJ Matrix'],
['text' => 'Our event coverage was flawless. The team captured everything perfectly.', 'author' => 'Event Planner, VibeX'],
];

$testimonials = ($party && !empty($party->testimonials)) ? $party->testimonials : $defaultTestimonials;

$defaultStats = [
['value' => 0, 'title' => 'Happy Clients'],
['value' => 0, 'title' => 'Events Covered'],
['value' => 0, 'title' => 'Photos Delivered'],
['value' => 0, 'title' => 'Years of Experience'],
];

$stats = ($party && !empty($party->stats)) ? $party->stats : $defaultStats;

$heroTitle = ($party && !empty($party->title)) ? $party->title : 'Parties & Concerts — Capture the Energy';
$heroDescription = ($party && !empty($party->description)) ? $party->description : 'We bring your events to life through vibrant photography — capturing lights, laughter, and music in every frame. From intimate parties to grand concerts, we make sure every emotion shines through.';
$ctaTitle = ($party && !empty($party->cta_title)) ? $party->cta_title : 'Ready to make your event unforgettable?';
$ctaDescription = ($party && !empty($party->cta_description)) ? $party->cta_description : 'Book our team for your next party, concert, or festival and relive the thrill through world-class photos and videos.';
@endphp

@section('content')

<!-- ===== HERO ===== -->
<section class="party-hero"
    style="background: linear-gradient(120deg, rgba(229, 152, 155, 0.75), rgba(181, 126, 220, 0.75)), url('{{ $heroBg }}') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>{{ $heroTitle }}</h1>
            <p>{{ $heroDescription }}</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Photographer</a>
                <a href="#gallery" class="btn-outline-light">View Gallery</a>
            </div>
        </div>
        <div class="hero-right" style="flex:1; max-width:600px; height:75vh; overflow:hidden; display:flex; align-items:flex-start;">
            <img src="{{ $heroRight }}" alt="Studio setup" loading="lazy"
                style="width:100%; height:100%; object-fit:cover; object-position:top;">
        </div>
    </div>
</section>

<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="gallery">

    <!-- ============= PARTIES GALLERY SLIDER ============= -->
    <section aria-label="Parties Gallery" style="margin-top: 5rem;">
        <div class="slider" id="partySlider" style="max-width:1200px; margin:0 auto;">
            <div class="slider-main" id="sliderMain" style="position:relative; height:80vh; overflow:hidden; background:#fff;">
                @foreach($galleryImages as $index => $img)
                <div class="slide" data-index="{{ $index }}" tabindex="{{ $index === 0 ? '0' : '-1' }}" aria-hidden="{{ $index === 0 ? 'false' : 'true' }}" style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:{{ $index === 0 ? '1' : '0' }}; transition:opacity 0.4s; text-align:center; background:#fff;">
                    <img class="zoomable" src="{{ $img['src'] }}" alt="{{ $img['title'] ?? '' }}" loading="lazy"
                        style="width:auto; max-width:90%; max-height:80vh; object-fit:contain; display:inline-block; margin:0 auto; transition: transform 0.2s; cursor:grab;">
                    <div class="caption" style="margin-top:1rem; text-align:center;">
                        <h4>{{ $img['title'] ?? '' }}</h4>
                        <p>{{ $img['description'] ?? '' }}</p>
                    </div>
                </div>
                @endforeach

                <!-- Slider controls -->
                <div class="slider-controls" style="position:absolute; top:50%; left:0; right:0; display:flex; justify-content:space-between; transform:translateY(-50%);">
                    <button id="prevBtn">◀</button>
                    <button id="nextBtn">▶</button>
                </div>

                <!-- Zoom controls -->
                <div class="zoom-controls" style="position:absolute; bottom:10px; left:50%; transform:translateX(-50%); display:flex; gap:0.5rem;">
                    <button id="zoomIn">Zoom +</button>
                    <button id="zoomOut">Zoom -</button>
                </div>
            </div>

            <!-- Thumbnails -->
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
<script src="{{ asset('js/public/photography/parties.js') }}"></script>

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