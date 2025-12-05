@extends('layouts.app')

@section('title', 'Family Photography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/family.css') }}">
@endpush

@php
/* ============================================================
SAFE BACKEND FALLBACK SYSTEM FOR FAMILY PHOTOGRAPHY PAGE
============================================================ */

$family = $family ?? null;

/* ===========================
HERO IMAGES
=========================== */
$heroBg = ($family && !empty($family->hero_image))
? asset('storage/' . $family->hero_image)
: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=1600&auto=format&fit=crop';

$heroRight = ($family && !empty($family->hero_right_image))
? asset('storage/' . $family->hero_right_image)
: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1200&auto=format&fit=crop';


/* ===========================
FAMILY GALLERY IMAGES
=========================== */

$defaultFamilyGallery = [
[
'src' => 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=1600&auto=format&fit=crop',
'title' => 'Outdoor Family Moments',
'description' => 'Natural light and smiles that feel real.',
],
[
'src' => 'https://images.unsplash.com/photo-1598970434795-0c54fe7c0642?q=80&w=1600&auto=format&fit=crop',
'title' => 'Indoor Comfort Sessions',
'description' => 'Cozy, candid moments at home with loved ones.',
],
[
'src' => 'https://images.unsplash.com/photo-1607746882042-944635dfe10e?q=80&w=1600&auto=format&fit=crop',
'title' => 'Sibling Love',
'description' => 'Capturing the pure bond between brothers and sisters.',
],
[
'src' => 'https://images.unsplash.com/photo-1581578017423-6c0b3c6c9c86?q=80&w=1600&auto=format&fit=crop',
'title' => 'Generations Together',
'description' => 'Three generations in one frame — a memory to cherish.',
],
];

/* Build galleryImages variable the same way as portrait */
$galleryImages = [];

if (!empty($gallery) && count($gallery) > 0) {
foreach ($gallery as $imgPath) {
$galleryImages[] = [
'src' => asset('storage/'.$imgPath),
'title' => '',
'description' => '',
];
}
} else {
$galleryImages = $defaultFamilyGallery;
}


/* ===========================
SERVICES
=========================== */
$defaultServices = [
[
'icon' => 'bi bi-people-fill',
'title' => 'Family Sessions',
'description' => 'Heartwarming family portraits that reflect your personality, laughter, and bonds.',
],
[
'icon' => 'bi bi-camera-fill',
'title' => 'Outdoor & Studio Shoots',
'description' => 'Choose between open-air beauty or our professional lighting setup.',
],
[
'icon' => 'bi bi-heart-fill',
'title' => 'Memories That Last',
'description' => 'High-resolution photos ready for framing, printing, and keepsakes.',
],
];

$services = ($family && !empty($family->services))
? $family->services
: $defaultServices;


/* ===========================
TESTIMONIALS
=========================== */
$defaultTestimonials = [
[
'text' => 'The photos captured our family’s love perfectly. We’ll treasure these for a lifetime!',
'author' => 'The Mwangi Family',
],
[
'text' => 'Our children felt so comfortable — the laughter in the photos was genuine.',
'author' => 'Lucy & Brian',
],
];

$testimonials = ($family && !empty($family->testimonials))
? $family->testimonials
: $defaultTestimonials;


/* ===========================
STATS
=========================== */
$defaultStats = [
['value' => 0, 'title' => 'Happy Families'],
['value' => 0, 'title' => 'Outdoor Locations'],
['value' => 0, 'title' => 'Memories Captured'],
['value' => 0, 'title' => 'Years Experience'],
];

$stats = ($family && !empty($family->stats))
? $family->stats
: $defaultStats;


/* ===========================
HERO TEXT
=========================== */
$heroTitle = ($family && !empty($family->title))
? $family->title
: 'Family Photography — Capture Love & Legacy';

$heroDescription = ($family && !empty($family->description))
? $family->description
: 'From newborns to grandparents, we create timeless family portraits that celebrate connection, laughter, and life’s unforgettable moments — beautifully framed forever.';

$ctaTitle = ($family && !empty($family->cta_title))
? $family->cta_title
: 'Preserve Your Family’s Story';

$ctaDescription = ($family && !empty($family->cta_description))
? $family->cta_description
: 'Let’s create beautiful, lasting portraits that remind you what matters most — love, togetherness, and joy.';
@endphp


@section('content')

<!-- ===== HERO ===== -->
<section class="family-hero"
    style="background: linear-gradient(120deg,rgba(27, 38, 59, 0.9),rgba(65, 90, 119, 0.8)), url('{{ $heroBg }}')center/cover;">
    <div class="inner">
        <div class="hero-left">
            <h1>{{ $heroTitle }}</h1>
            <p>{{ $heroDescription }}</p>
            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">Book a Session</a>
                <a href="#portfolio" class="btn-outline-light">View Gallery</a>
            </div>
        </div>

        <div class="hero-right" style="flex:1; max-width:600px; height:75vh; overflow:hidden; display:flex; align-items:flex-start;">
            <img src="{{ $heroRight }}"
                alt="Happy family portrait"
                loading="lazy"
                style="width:100%; height:100%; object-fit:cover; object-position:top;">
        </div>

    </div>
</section>


<!-- ===== PAGE CONTENT ===== -->
<div class="page-container" id="portfolio">

    <!-- ============= GALLERY SLIDER ============= -->
    <section aria-label="Family Gallery" style="margin-top: 5rem;">
        <div class="slider" id="portraitSlider" style="max-width:1200px; margin:0 auto;">
            <div class="slider-main" id="sliderMain" style="position:relative; height:80vh; overflow:hidden; background:#fff;">

                <!-- Slides -->
                @foreach($galleryImages as $index => $img)
                <div class="slide"
                    data-index="{{ $index }}"
                    tabindex="{{ $index === 0 ? '0' : '-1' }}"
                    aria-hidden="{{ $index === 0 ? 'false' : 'true' }}"
                    style="position:absolute; top:0; left:0; width:100%; height:100%; opacity:{{ $index === 0 ? '1' : '0' }}; transition:opacity 0.4s; text-align:center; background:#fff;">
                    <img src="{{ $img['src'] }}"
                        alt="{{ $img['title'] ?? '' }}"
                        loading="lazy"
                        class="zoomable"
                        style="width:auto; max-width:90%; max-height:80vh; object-fit:contain; display:inline-block; margin:0 auto; transition: transform 0.2s; cursor:grab;">
                    <div class="caption" style="margin-top:1rem; text-align:center;">
                        <h4 style="margin:0 0 0.5rem 0;">{{ $img['title'] ?? '' }}</h4>
                        <p style="margin:0; color:#555;">{{ $img['description'] ?? '' }}</p>
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


                <!-- Zoom controls -->
                <div class="zoom-controls" style="position:absolute; bottom:10px; left:50%; transform:translateX(-50%); display:flex; gap:0.5rem;">
                    <button id="zoomIn" style="background:#fff; border:none; padding:0.3rem 0.6rem; cursor:pointer; border-radius:5px;">Zoom +</button>
                    <button id="zoomOut" style="background:#fff; border:none; padding:0.3rem 0.6rem; cursor:pointer; border-radius:5px;">Zoom -</button>
                </div>

                <div class="autoplay-indicator" style="position:absolute; bottom:10px; right:10px; background:rgba(255,255,255,0.8); padding:0.2rem 0.5rem; border-radius:5px; font-size:0.9rem;">Auto • On</div>
            </div>

            <!-- Thumbnails with pagination -->
            <aside class="slider-thumbs" style="display:flex; flex-direction:column; align-items:center; margin-top:1rem;">
                <div id="thumbsContainer" style="display:flex; gap:0.5rem; flex-wrap:wrap; justify-content:center;"></div>
                <div id="thumbPagination" style="margin-top:0.5rem; display:flex; gap:0.5rem; justify-content:center;">
                    <button id="prevThumbs"
                        style="
                                padding:0.4rem 0.9rem;
                                background:#1a1a1a;
                                color:#fff;
                                border:none;
                                border-radius:6px;
                                font-size:1rem;
                                cursor:pointer;
                                box-shadow:0 2px 6px rgba(0,0,0,0.2);
                                transition:0.2s;
                            "
                        onmouseover="this.style.background='#000'"
                        onmouseout="this.style.background='#1a1a1a'">
                        ◀
                    </button>

                    <button id="nextThumbs"
                        style="
                                padding:0.4rem 0.9rem;
                                background:#1a1a1a;
                                color:#fff;
                                border:none;
                                border-radius:6px;
                                font-size:1rem;
                                cursor:pointer;
                                box-shadow:0 2px 6px rgba(0,0,0,0.2);
                                transition:0.2s;
                            "
                        onmouseover="this.style.background='#000'"
                        onmouseout="this.style.background='#1a1a1a'">
                        ▶
                    </button>
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
            <a href="{{ route('contact') }}" class="cta-btn">Book Your Session</a>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/family.js') }}"></script>

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
            thumbDiv.style.alignItems = 'flex-start'; // ensures image is mostly at the top

            const thumbImg = document.createElement('img');
            thumbImg.src = img.src;
            thumbImg.alt = img.title;
            thumbImg.loading = 'lazy';
            thumbImg.style.width = '100%';
            thumbImg.style.height = '100%';
            thumbImg.style.objectFit = 'cover';
            thumbImg.style.objectPosition = 'top'; // top alignment
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

    renderThumbs(); // initial render
</script>
@endpush