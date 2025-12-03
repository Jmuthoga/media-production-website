@extends('layouts.app')

@section('title', $heroTitle ?? 'Portrait Photography')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public/photography/portrait.css') }}">
@endpush

@php
/* ============================================================
SAFE BACKEND FALLBACK SYSTEM FOR PORTRAIT PAGE
============================================================ */

// Make sure $portrait exists to avoid errors
$portrait = $portrait ?? null;

/* ===========================
HERO IMAGES
=========================== */
$heroBg = ($portrait && !empty($portrait->hero_image))
? asset('storage/' . $portrait->hero_image)
: 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1200&auto=format&fit=crop';

$heroRight = ($portrait && !empty($portrait->hero_right_image))
? asset('storage/' . $portrait->hero_right_image)
: $heroBg;


/* ===========================
DEFAULT GALLERY
=========================== */
$defaultGallery = [
[
'src' => 'https://images.unsplash.com/photo-1524503033411-c9566986fc8f?q=80&w=1600&auto=format&fit=crop',
'title' => 'Studio Portrait',
'description' => 'Classic lighting, refined look for headshots and editorial portraits.',
],
[
'src' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1600&auto=format&fit=crop',
'title' => 'Outdoor Portrait',
'description' => 'Natural light and environmental storytelling.',
],
[
'src' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1600&auto=format&fit=crop',
'title' => 'Creative Portrait',
'description' => 'Stylized and conceptual portraits for artists and creatives.',
],
[
'src' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=1600&auto=format&fit=crop',
'title' => 'Environmental Portrait',
'description' => 'Photos that show personality in context — workplace, studio or outdoors.',
],
];

// Use gallery from backend if exists, else use default
$galleryImages = [];

if (!empty($gallery) && count($gallery) > 0) {
foreach ($gallery as $imgPath) {
$galleryImages[] = [
'src' => asset('storage/'.$imgPath),
'title' => '', // you can optionally add title
'description' => '', // optionally add description
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
'icon' => 'bi bi-camera-fill',
'title' => 'Professional Studio Setup',
'description' => 'Full studio environment with lights, backdrops, and makeup coordination.',
],
[
'icon' => 'bi bi-people-fill',
'title' => 'Personalized Sessions',
'description' => 'Pre-shoot consultation with wardrobe and mood planning.',
],
[
'icon' => 'bi bi-brush-fill',
'title' => 'Advanced Retouching',
'description' => 'Professional skin retouching and color grading.',
],
];

$services = ($portrait && !empty($portrait->services))
? $portrait->services
: $defaultServices;


/* ===========================
TESTIMONIALS
=========================== */
$defaultTestimonials = [
[
'text' => 'Working with Unimax changed my portfolio — the craft was outstanding.',
'author' => 'Naomi A., Creative Director',
],
[
'text' => 'Excellent studio environment. The images exceeded my expectations.',
'author' => 'Michael R., Actor',
],
];

$testimonials = ($portrait && !empty($portrait->testimonials))
? $portrait->testimonials
: $defaultTestimonials;


/* ===========================
STATS
=========================== */
$defaultStats = [
['value' => '0', 'title' => 'Client Reviews'],
['value' => '0', 'title' => 'Support Team'],
['value' => '0', 'title' => 'Projects Completed'],
['value' => '0', 'title' => 'Years Experience'],
];

$stats = ($portrait && !empty($portrait->stats))
? $portrait->stats
: $defaultStats;


/* ===========================
HERO TEXT
=========================== */
$heroTitle = ($portrait && $portrait->title)
? $portrait->title
: 'Portrait Photography — Capture Personality & Presence';

$heroDescription = ($portrait && $portrait->description)
? $portrait->description
: 'Professional portrait sessions for individuals, families, and talent.';

$ctaTitle = ($portrait && $portrait->cta_title)
? $portrait->cta_title
: 'Ready for your portrait session?';

$ctaDescription = ($portrait && $portrait->cta_description)
? $portrait->cta_description
: 'Book an in-studio or on-location session tailored to you.';
@endphp


@section('content')
<!-- ============= HERO ============= -->
<section class="portrait-hero" aria-labelledby="portrait-hero-heading"
    style="background: linear-gradient(120deg, var(--deep-rose), var(--rose)),
            url('{{ $heroBg }}') center/cover;">
    <div class="inner">
        <div class="hero-left" role="region" aria-label="Introduction">
            <h1 id="portrait-hero-heading">{{ $heroTitle }}</h1>
            <p>{{ $heroDescription }}</p>

            <div class="hero-cta">
                <a href="{{ route('contact') }}" class="btn-primary-hero">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" style="margin-right:6px">
                        <path d="M22 12L2 3v18L22 12z" fill="white" />
                    </svg>
                    Book a Session
                </a>
                <a href="#portfolio" class="btn-outline-light">View Portfolio</a>
            </div>
        </div>

        <div class="hero-right" style="flex:1; max-width:600px; height:75vh; overflow:hidden; display:flex; align-items:flex-start;">
            <img src="{{ $heroRight }}"
                alt="Portrait hero preview"
                loading="lazy"
                style="width:100%; height:100%; object-fit:cover; object-position:top;">
        </div>

    </div>
</section>



<div class="page-container" id="portfolio">

    <!-- ============= GALLERY SLIDER ============= -->
    <section aria-label="Portrait Gallery" style="margin-top: 5rem;">
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
                        alt="{{ $img['title'] }}"
                        loading="lazy"
                        class="zoomable"
                        style="width:auto; max-width:90%; max-height:80vh; object-fit:contain; display:inline-block; margin:0 auto; transition: transform 0.2s; cursor:grab;">
                    <div class="caption" style="margin-top:1rem; text-align:center;">
                        <h4 style="margin:0 0 0.5rem 0;">{{ $img['title'] }}</h4>
                        <p style="margin:0; color:#555;">{{ $img['description'] }}</p>
                    </div>
                </div>
                @endforeach

                <!-- Slider controls -->
                <div class="slider-controls" style="position:absolute; top:50%; left:0; right:0; display:flex; justify-content:space-between; transform:translateY(-50%);">
                    <button id="prevBtn" style="background:#fff; border:none; padding:0.5rem 1rem; cursor:pointer; border-radius:5px;">◀</button>
                    <button id="nextBtn" style="background:#fff; border:none; padding:0.5rem 1rem; cursor:pointer; border-radius:5px;">▶</button>
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

                <div id="thumbPagination" style="margin-top:0.5rem;">
                    <button id="prevThumbs" style="padding:0.3rem 0.6rem; margin-right:0.3rem;">◀</button>
                    <button id="nextThumbs" style="padding:0.3rem 0.6rem;">▶</button>
                </div>
            </aside>

        </div>
    </section>

    <!-- ============= SERVICES ============= -->
    <section class="services-grid">
        @foreach($services as $srv)
        <div class="service">
            <i class="{{ $srv['icon'] }}"></i>
            <h4>{{ $srv['title'] }}</h4>
            <p>{{ $srv['description'] }}</p>
        </div>
        @endforeach
    </section>

    <!-- ============= TESTIMONIALS ============= -->
    <section class="testimonials">
        @foreach($testimonials as $tm)
        <div class="testimonial">
            <p>"{{ $tm['text'] }}"</p>
            <div class="who">— {{ $tm['author'] }}</div>
        </div>
        @endforeach
    </section>

    <!-- ============= STATS & CTA ============= -->
    <section class="stats-row" aria-label="Statistics and booking">
        <div class="stat" role="region" aria-label="Client reviews">
            <h3 id="statClients">0</h3>
            <p>Client Reviews</p>
        </div>
        <div class="stat" role="region" aria-label="Support team">
            <h3 id="statTeam">0</h3>
            <p>Support Team</p>
        </div>
        <div class="stat" role="region" aria-label="Projects completed">
            <h3 id="statProjects">0</h3>
            <p>Projects Completed</p>
        </div>
        <div class="stat" role="region" aria-label="Years of experience">
            <h3 id="statYears">0</h3>
            <p>Years Experience</p>
        </div>
    </section>

    <!-- ============= CTA ============= -->
    <section class="cta">
        <div class="left">
            <h3>{{ $ctaTitle }}</h3>
            <p>{{ $ctaDescription }}</p>
        </div>
        <div class="right">
            <a href="{{ route('contact') }}" class="cta-btn">Contact & Book</a>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/public/photography/portrait.js') }}"></script>

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