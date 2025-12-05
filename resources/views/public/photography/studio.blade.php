@extends('layouts.app')

@section('title', 'Studio Sessions & Hire')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/studio.css') }}">
@endpush

@php
/* ============================================================
SAFE BACKEND FALLBACK SYSTEM FOR STUDIO PAGE
============================================================ */

$studio = $studio ?? null;

/* ===========================
HERO IMAGES
=========================== */
$heroBg = ($studio && !empty($studio->hero_image))
? asset('storage/' . $studio->hero_image)
: 'https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?q=80&w=1600&auto=format&fit=crop';

$heroRight = ($studio && !empty($studio->hero_right_image))
? asset('storage/' . $studio->hero_right_image)
: 'https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?q=80&w=1600&auto=format&fit=crop';

/* ===========================
STUDIO GALLERY IMAGES
=========================== */
$defaultGallery = [
[
'src' => 'https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?q=80&w=1600&auto=format&fit=crop',
'title' => 'Professional Studio Space',
'description' => 'Spacious environment with advanced lighting and backdrops.',
],
[
'src' => 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?q=80&w=1600&auto=format&fit=crop',
'title' => 'Lighting Setup',
'description' => 'Customizable lighting for portraits, products, and creative shots.',
],
[
'src' => 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?q=80&w=1600&auto=format&fit=crop',
'title' => 'Gear & Equipment Hire',
'description' => 'Top-quality cameras, tripods, lenses, and audio gear for rent.',
],
[
'src' => 'https://images.unsplash.com/photo-1622151834677-70ef93c6a16b?q=80&w=1600&auto=format&fit=crop',
'title' => 'Studio in Action',
'description' => 'Where creativity meets comfort — your vision, perfectly captured.',
],
];

$galleryImages = [];
if (!empty($gallery) && count($gallery) > 0) {
foreach ($gallery as $imgPath) {
$galleryImages[] = [
'src' => asset('storage/' . $imgPath),
'title' => '',
'description' => '',
];
}
} else {
$galleryImages = $defaultGallery;
}

/* ===========================
SERVICES
=========================== */
$defaultServices = [
[
'icon' => 'bi bi-lightbulb-fill',
'title' => 'Studio Lighting',
'description' => 'Professional-grade lighting systems for every mood and concept.',
],
[
'icon' => 'bi bi-camera-reels-fill',
'title' => 'Equipment Hire',
'description' => 'From DSLRs to lenses and tripods — everything for your perfect shot.',
],
[
'icon' => 'bi bi-building',
'title' => 'Private Studio Booking',
'description' => 'Exclusive use of our fully equipped studio for individual or team projects.',
],
];

$services = ($studio && !empty($studio->services))
? $studio->services
: $defaultServices;

/* ===========================
TESTIMONIALS
=========================== */
$defaultTestimonials = [
[
'text' => 'The studio is top-notch — we shot our entire campaign here without a single issue!',
'author' => 'Vision Media Team',
],
[
'text' => 'Clean, well-lit, and organized. The hire process was smooth and affordable.',
'author' => 'Jane, Photographer',
],
];

$testimonials = ($studio && !empty($studio->testimonials))
? $studio->testimonials
: $defaultTestimonials;

/* ===========================
STATS
=========================== */
$defaultStats = [
['value' => 0, 'title' => 'Studio Sessions'],
['value' => 0, 'title' => 'Equipment Rentals'],
['value' => 0, 'title' => 'Years of Service'],
['value' => 0, 'title' => 'Client Satisfaction'],
];

$stats = ($studio && !empty($studio->stats))
? $studio->stats
: $defaultStats;

/* ===========================
HERO TEXT
=========================== */
$heroTitle = ($studio && !empty($studio->title))
? $studio->title
: 'Studio Sessions & Equipment Hire';

$heroDescription = ($studio && !empty($studio->description))
? $studio->description
: 'Book premium studio sessions or hire our professional gear for your next shoot — lighting, lenses, and setup designed for flawless captures.';

$ctaTitle = ($studio && !empty($studio->cta_title))
? $studio->cta_title
: 'Ready to Create?';

$ctaDescription = ($studio && !empty($studio->cta_description))
? $studio->cta_description
: 'Book your next photo or video session in our modern, fully equipped studio — or hire top-tier gear for your location shoot.';
@endphp

@section('content')

<!-- ===== HERO ===== -->
<section class="studio-hero"
    style="background: linear-gradient(120deg, rgba(18, 18, 18, 0.9), rgba(44, 40, 28, 0.85)), url('{{ $heroBg }}') center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>{{ $heroTitle }}</h1>
            <p>{{ $heroDescription }}</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book Studio</a>
                <a href="#gallery" class="btn-outline-light">View Studio</a>
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

    <!-- ============= STUDIO GALLERY SLIDER ============= -->
    <section aria-label="Studio Gallery" style="margin-top: 5rem;">
        <div class="slider" id="studioSlider" style="max-width:1200px; margin:0 auto;">

            <!-- Main Slider -->
            <div class="slider-main" id="sliderMain" style="position:relative; height:80vh; overflow:hidden; background:#fff;">
                @foreach($gallery as $index => $img)
                <div class="slide"
                    data-index="{{ $index }}"
                    tabindex="{{ $index === 0 ? '0' : '-1' }}"
                    aria-hidden="{{ $index === 0 ? 'false' : 'true' }}"
                    style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:{{ $index === 0 ? '1' : '0' }}; transition:opacity 0.4s; text-align:center; background:#fff;">

                    <img src="{{ asset('storage/'.$img) }}"
                        alt=""
                        loading="lazy"
                        class="zoomable"
                        style="width:auto; max-width:90%; max-height:80vh; object-fit:contain; display:inline-block; margin:0 auto; transition: transform 0.2s; cursor:grab;">
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

                <!-- Zoom Controls -->
                <div class="zoom-controls" style="position:absolute; bottom:10px; left:50%; transform:translateX(-50%); display:flex; gap:0.5rem;">
                    <button id="zoomIn" style="background:#fff; border:none; padding:0.3rem 0.6rem; cursor:pointer; border-radius:5px;">Zoom +</button>
                    <button id="zoomOut" style="background:#fff; border:none; padding:0.3rem 0.6rem; cursor:pointer; border-radius:5px;">Zoom -</button>
                </div>
            </div>

            <!-- Thumbnails -->
            <aside class="slider-thumbs" style="display:flex; flex-direction:column; align-items:center; margin-top:1rem;">
                <div id="thumbsContainer" style="display:flex; gap:0.5rem; flex-wrap:wrap; justify-content:center;">
                    @foreach($gallery->forPage(request('page', 1), 5) as $index => $img)
                    <div class="thumb" data-index="{{ $index }}" style="width:120px; height:80px; overflow:hidden; border-radius:8px; cursor:pointer;">
                        <img src="{{ asset('storage/'.$img) }}" alt="" style="width:100%; height:100%; object-fit:cover; transition:transform 0.3s;">
                    </div>
                    @endforeach
                </div>

                <!-- Thumbnail Pagination -->
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
        @foreach($stats as $st)
        <div class="stat">
            <h3 id="stat{{ $loop->index + 1 }}">0</h3>
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
<script src="{{ asset('js/public/photography/studio.js') }}"></script>

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
            thumbDiv.tabIndex = 0;
            thumbDiv.role = 'button';
            thumbDiv.style.width = '150px';
            thumbDiv.style.height = '100px';
            thumbDiv.style.overflow = 'hidden';
            thumbDiv.style.cursor = 'pointer';
            thumbDiv.style.border = (start + index === 0) ? '2px solid #000' : '2px solid transparent';
            thumbDiv.style.borderRadius = '5px';
            thumbDiv.style.display = 'flex';
            thumbDiv.style.alignItems = 'flex-start';

            const thumbImg = document.createElement('img');
            thumbImg.src = img.src;
            thumbImg.alt = img.title;
            thumbImg.loading = 'lazy';
            thumbImg.style.width = '100%';
            thumbImg.style.height = '100%';
            thumbImg.style.objectFit = 'cover';
            thumbImg.style.objectPosition = 'top';
            thumbImg.style.display = 'block';

            thumbDiv.appendChild(thumbImg);

            // Click to show main slide
            thumbDiv.addEventListener('click', () => showSlide(start + index));

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